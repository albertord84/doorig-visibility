<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\Response\Response;

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-payment_vindi-class');
    }

    public function index() {
        echo 'OK';
    }

    public function vindi_notification_post() {
        try {
            //1. Get and Save Raw Content Input String
            $post_str = file_get_contents('php://input');
            $path = __dir__ . '/../../../logs/vindi/';
            $file = $path . "vindi_notif_post-" . date("d-m-Y") . ".log";
            $result = file_put_contents($file, "\n\n", FILE_APPEND);
            $result = file_put_contents($file, serialize($post_str), FILE_APPEND);

            //2. Converto Raw Object to string
            $post = urldecode($post_str);
            $post = json_decode($post);

            //3. Process input object
            if (isset($post->event) && isset($post->event->type)) {
                //4.1 Recurrence created succefully
                if ($post->event->type == "charge_created") {
                    $gateway_client_id = $post->event->data->charge->customer->id;
                    $Client->MarkInfo->load_data();
                    //4.1 Save Client 
                    $Client = new Client();
                    $Client->load_data_by_gateway_client_id();
                    //[]
                    $Client->MarkInfo = new \business\MarkInfo($Client);
                    //$gateway_client_id = $post->event->data->bill->customer->id;
                    //$gateway_payment_key = $post->event->data->bill->subscription->id;
                    $Client->MarkInfo->saveGatewayInfo();
                }
                //4.2 Bill paid succefully
                if ($post->event->type == "bill_paid") {
                    if (isset($post->event->data) && isset($post->event->data->bill) && $post->event->data->bill->status = "paid") {
                        $result = file_put_contents($file, "\n bill_paid DETECTED!!:\n", FILE_APPEND);
                        // Activate User
                        //$gateway_client_id = $post->event->data->bill->customer->id;
                        $gateway_payment_key = $post->event->data->bill->subscription->id;
                        //1. activar cliente
                        $this->load->model('class/user_model');
                        $this->load->model('class/user_status');
                        $this->load->model('class/client_model');
                        //$client_id = $this->client_model->get_client_id_by_gateway_client_id($gateway_client_id);
                        $client_id = $this->client_model->get_client_id_by_gateway_payment_key($gateway_payment_key);
                        if ($client_id) {
                            $this->user_model->update_user($client_id, array(
                                'status_id' => user_status::ACTIVE));
                            $result = file_put_contents($file, "$client_id: ACTIVED" . "\n\n", FILE_APPEND);
                            //2. pay_day un mes para el frente
                            $this->client_model->update_client(
                                    $client_id, array('pay_day' => strtotime("+1 month", time())));
                            $result = file_put_contents($file, "$client_id: +1 month from now" . "\n\n\n", FILE_APPEND);
                        } else {
                            $result = file_put_contents($file, "Subscription($gateway_payment_key): NOT FOUND HERE!!!" . "\n\n\n", FILE_APPEND);
                        }
                        //die("Activate client -> Payment done!! -> Dia da cobrança um mês para frente");
                    }
                }
            } else {
                $result = file_put_contents($file, "\nERROR:\n", FILE_APPEND);
                $result = file_put_contents($file, $post, FILE_APPEND);
                $result = file_put_contents($file, "\nERROR END\n", FILE_APPEND);
                echo "FAIL";
                return;
            }
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
            $result = file_put_contents($file, "$client_id: " . $exc->getTraceAsString() . "\n\r\n\r", FILE_APPEND);
            return;
        }

        if ($result === FALSE) {
            echo "FAIL";
            return;
        }
        echo "OK";
    }

    // USADOS INTERNAMENTE PELOS ROBOTS DE PAGAMENTO
    public function check_payment_vindi() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/Gmail.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new follows\cls\system_config();
        echo "Check Payment Inited...!<br>\n";
        echo date("Y-m-d h:i:sa");
        $this->load->model('class/user_model');
        $this->load->model('class/client_model');
        $this->load->model('class/user_role');
        $this->load->model('class/user_status');
        // Get all users
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('users', 'clients.user_id = users.id');
        $this->db->join('client_payment', 'clients.user_id = client_payment.dumbu_client_id');
        //$this->db->where('id', "1");
        $this->db->where('role_id', user_role::CLIENT);
        $this->db->where('status_id <>', user_status::DELETED);
        $this->db->where('status_id <>', user_status::BEGINNER);
        $this->db->where('status_id <>', user_status::DONT_DISTURB);
        //$this->db->where('gateway_id', 1); // 1 -> Id da mundipagg
        //        $this->db->where('status_id <>', user_status::BLOCKED_BY_PAYMENT);
        // TODO: COMMENT MAYBE
        //        $this->db->or_where('status_id', user_status::BLOCKED_BY_PAYMENT);  // This status change when the client update his pay data
        //        $this->db->or_where('status_id', user_status::ACTIVE);
        //        $this->db->or_where('status_id', user_status::BLOCKED_BY_INSTA);
        //        $this->db->or_where('status_id', user_status::VERIFY_ACCOUNT);
        //        $this->db->or_where('status_id', user_status::UNFOLLOW);
        //        $this->db->or_where('status_id', user_status::BLOCKED_BY_TIME);
        //        $this->db->or_where('status_id', user_status::INACTIVE);
        //        $this->db->or_where('status_id', user_status::PENDING);
        $clients = $this->db->get()->result_array();
        // Check payment for each user
        foreach ($clients as $client) {
            if ($this->is_client_vindi($client['user_id'])) { // Si é cliente da VINDI
                $clientname = $client['name'];
                $clientid = $client['user_id'];
                var_dump($clientid . ": " . $clientname);
                $now = new DateTime("now");
                //$payday = strtotime($client['pay_day']);
                $payday = new DateTime();
                $payday->setTimestamp($client['pay_day']);
                $diff_info = $payday->diff($now);
                $diff_days = $diff_info->days;
                $today = strtotime("today");
                if ($now > $payday && $client['status_id'] != user_status::BLOCKED_BY_PAYMENT) { // wheter not have order key
                    print "\n<br>Client pay data data expired!!!: $clientname (id: $clientid)<br>\n";
                    $days_left = $GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days;
                    if ($GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days > 0) {
                        if ($GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days == 4) {
                            $client['email'] = "josergm86@gmail.com";
                            $this->send_payment_email($client, 4);
                        } else if ($GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days == 3) {
                            $client['email'] = "josergm86@gmail.com";
                            $this->send_payment_email($client, 3);
                        } else {
                            $this->send_payment_email($client, $GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days);
                            $this->user_model->insert_washdog($clientid, "EMAIL SENT ($days_left day(s) left) IN check_payment_vindi()");
                            print "Days left: " . ($GLOBALS['sistem_config']->DAYS_TO_BLOCK_CLIENT - $diff_days) . "<br>\n";
                        }
                    } else {
                        $this->load->model('class/user_status');
                        $this->user_model->update_user($clientid, array('status_id' => user_status::BLOCKED_BY_PAYMENT, 'status_date' => time()));
                        $this->user_model->insert_washdog($clientid, "SET TO BLOCKED_BY_PAYMENT IN check_payment_vindi()");
                        $this->send_payment_email($client);
                    }
                }
            }
        }
        try {
            $Gmail = new follows\cls\Gmail();
            //$Gmail->send_mail("albertord84@gmail.com", "Alberto Reyes", 'DUMBU VINVI payment checked!!! ', 'DUMBU VINVI payment checked!!! ');
            $Gmail->send_mail("josergm86@gmail.com", "Jose Ramon ", 'DUMBU VINVI payment checked!!! ', 'DUMBU VINVI payment checked!!! ');
            $Gmail->send_mail("jangel.riveaux@gmail.com", "Jose Angel Riveaux ", 'DUMBU VINVI payment checked!!! ', 'DUMBU VINVI payment checked!!! ');
        } catch (Exception $ex) {
            echo 'Emails was not send';
        }
        echo "\n\n<br>Job Done!" . date("Y-m-d h:i:sa") . "\n\n";
    }

    public function is_client_vindi($client_id = 1) {
        try {
            $Client = new Client($client_id);
            $Client->load_mark_info_data();

            $this->session->set_userdata('client', serialize($Client));

            var_dump($Client);
        } catch (\Exception $exc) {
            print_r($exc->getMessage());
        }
    }

    public function vindi_addClient() {
        try {
            $Client = new Client();
            $Client = unserialize($this->session->userdata('client'));
            
            $Client->MarkInfo = new \business\MarkInfo($Client);
            $Client->MarkInfo->load_data();

            $credit_card_name = urldecode($_POST['credit_card_name']);
            $user_email = urldecode($_POST['user_email']);
            //$credit_card_name = "God";
            //$user_email = "god@heaven.sky";
            $customer_id = $Client->MarkInfo->Payment->addClient($credit_card_name, $user_email);

            $Client->MarkInfo->Payment->save($Client->Id, $customer_id);
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }

        return Response::ResponseOK()->toJson();
    }

    public function vindi_addClientPayment() {
        try {
            $Client = new Client(0);
            $Client = unserialize($this->session->userdata('client'));

            $Client->MarkInfo = new \business\MarkInfo($Client);
            $Client->MarkInfo->load_data();

            $datas = (array) json_decode(urldecode($_POST['datas']));

            $payment_data['credit_card_name'] = 'alberto reyes diaz';
            $payment_data['credit_card_number'] = '5234214982638268';
            $payment_data['credit_card_exp_month'] = '08';
            $payment_data['credit_card_exp_year'] = '2021';
            $payment_data['credit_card_cvc'] = '057';

            $datas = array(
                "holder_name" => $payment_data['credit_card_name'],
                "card_expiration" => $payment_data['credit_card_exp_month'] . "/" . $payment_data['credit_card_exp_year'],
                "card_number" => $payment_data['credit_card_number'],
                "card_cvv" => $payment_data['credit_card_cvc'],
                "payment_method_code" => "credit_card",
                "customer_id" => $Client->MarkInfo->Payment->gateway_client_id
            );

            $Reponse = $Client->MarkInfo->Payment->addClientPayment($Client->Id, $datas);
            return $Reponse->toJson();
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

    public function vindi_create_recurrency_payment() {
        try {
            $Client = new Client(0);
            $Client = unserialize($this->session->userdata('client'));

            $Client->MarkInfo = new \business\MarkInfo($Client);
            $Client->MarkInfo->load_data();

            $pay_day = json_decode(urldecode($_POST['pay_day']));
            
            $pay_day = time() + 24*60*60;
            
            $ResponseRecurrencyPayment = new \business\Response\ResponseRecurrencyPayment($PaymentKey = "");
            $ResponseRecurrencyPayment = $Client->MarkInfo->Payment->create_recurrency_payment($pay_day);
            
            $Client->MarkInfo->Payment->update($Client->Id, NULL, NULL, $ResponseRecurrencyPayment->PaymentKey);
            
            return $ResponseRecurrencyPayment->toJson();
        } catch (\Exception $exc) {
            return Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
        }
    }

    public function vindi_cancel_recurrency_payment() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new follows\cls\system_config();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/PaymentVindi.php';
        $Vindi = new \follows\cls\Payment\Vindi();
        $client_payment_key = urldecode($_POST['client_payment_key']);
        $result = $Vindi->cancel_recurrency_payment($client_payment_key);
        echo json_encode($result);
    }

    public function vindi_create_payment() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/system_config.php';
        $GLOBALS['sistem_config'] = new follows\cls\system_config();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/follows-worker/worker/class/PaymentVindi.php';
        $Vindi = new \follows\cls\Payment\Vindi();
        $user_id = urldecode($_POST['user_id']);
        $prod_1real_id = urldecode($_POST['prod_1real_id']);
        $amount = urldecode($_POST['amount']);
        $result = $Vindi->create_payment($user_id, $prod_1real_id, $amount);
        echo json_encode($result);
    }

}

//s:2776:"{"event":{"type":"bill_paid","created_at":"2019-03-21T10:05:26.946-03:00","data":{"bill":{"id":40492589,"code":null,"amount":"79.9","installments":1,"status":"paid","seen_at":null,"billing_at":null,"due_at":null,"url":"https://app.vindi.com.br/customer/bills/40492589?token=3f34de5b-2542-47b0-8361-024982c56fa1","created_at":"2019-03-21T10:05:21.000-03:00","updated_at":"2019-03-21T10:05:26.718-03:00","bill_items":[{"id":48434460,"amount":"79.9","quantity":1,"pricing_range_id":null,"description":null,"pricing_schema":{"id":6214713,"short_format":"R$ 79,90","price":"79.9","minimum_price":null,"schema_type":"flat","pricing_ranges":[],"created_at":"2018-10-29T20:58:44.000-03:00"},"product":{"id":230843,"name":"Follows Br 4","code":null},"product_item":{"id":8598273,"product":{"id":230843,"name":"Follows Br 4","code":null}},"discount":null}],"charges":[{"id":39399679,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T10:05:26.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T10:05:23.000-03:00","updated_at":"2019-03-21T10:05:26.000-03:00","last_transaction":{"id":66013106,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"83adbbfd-3579-4b81-853e-81cb4a3ae499","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121075291"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T10:05:25.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10804945,"holder_name":"CONRADO R F LEITE","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-02-28T23:59:59.000-03:00","card_number_first_six":"553636","card_number_last_four":"1766","token":"851ff6c7-cd8e-4866-8ea3-d9c1003d2b3f","created_at":"2019-02-21T13:24:42.000-03:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"}}],"customer":{"id":9440457,"name":"CONRADO R F LEITE","email":"conrado.leite@cervejariadilema.com.br","code":null},"period":{"id":22892414,"billing_at":"2019-03-21T00:00:00.000-03:00","cycle":2,"start_at":"2019-03-21T00:00:00.000-03:00","end_at":"2019-04-20T23:59:59.000-03:00","duration":2678399},"subscription":{"id":6342783,"code":null,"plan":{"id":64388,"name":"Follows Br 4","code":null},"customer":{"id":9440457,"name":"CONRADO R F LEITE","email":"conrado.leite@cervejariadilema.com.br","code":null}},"metadata":{},"payment_profile":null,"payment_condition":null}}}}";bill_paid DETECTED!!:


//s:1633:"{"event":{"type":"charge_rejected","created_at":"2019-03-21T10:56:12.087-03:00","data":{"charge":{"id":38938540,"amount":"90.0","status":"pending","due_at":"2019-03-15T23:59:59.000-03:00","paid_at":null,"installments":1,"attempt_count":3,"next_attempt":"2019-03-24T00:00:00.000-03:00","print_url":null,"created_at":"2019-03-15T09:37:18.000-03:00","updated_at":"2019-03-21T10:56:11.000-03:00","last_transaction":{"id":66029887,"transaction_type":"authorization","status":"rejected","amount":"90.0","installments":1,"gateway_message":"Cartão inválido","gateway_response_code":"1011","gateway_authorization":"","gateway_transaction_id":"2dc27513-1d78-4c82-8342-6ebb8b70005a","gateway_response_fields":{"stone_id_tx_id_tx_ref":"66029887","stone_id_tx_rcpt_tx_id":"18093121370103"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T10:56:10.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":8886587,"holder_name":"MAIJA ARMANEVA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2020-11-30T23:59:59.000-02:00","card_number_first_six":"535549","card_number_last_four":"3594","token":"b69be14f-de96-48cf-8d07-3636ce9a0abd","created_at":"2018-10-08T19:00:28.000-03:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"},"bill":{"id":40026511,"code":null},"customer":{"id":8122405,"name":"MAIJA ARMANEVA","email":"armaneva.maija@gmail.com","code":null}}}}}";


//s:2748:"{"event":{"type":"bill_created","created_at":"2019-03-21T11:28:33.022-03:00","data":{"bill":{"id":40505269,"code":null,"amount":"79.9","installments":1,"status":"paid","seen_at":null,"billing_at":null,"due_at":null,"url":"https://app.vindi.com.br/customer/bills/40505269?token=962d4d84-b9d7-42e2-bf1b-0d1be0245f11","created_at":"2019-03-21T11:28:26.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","bill_items":[{"id":48450002,"amount":"79.9","quantity":1,"pricing_range_id":null,"description":null,"pricing_schema":{"id":6214713,"short_format":"R$ 79,90","price":"79.9","minimum_price":null,"schema_type":"flat","pricing_ranges":[],"created_at":"2018-10-29T20:58:44.000-03:00"},"product":{"id":230843,"name":"Follows Br 4","code":null},"product_item":{"id":8258052,"product":{"id":230843,"name":"Follows Br 4","code":null}},"discount":null}],"charges":[{"id":39412002,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T11:28:31.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T11:28:28.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","last_transaction":{"id":66040773,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"54437a7d-47d6-493a-84b8-0ed6442e1eaa","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121581064"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T11:28:30.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10352760,"holder_name":"LEANDRO D GARCIA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-10-31T23:59:59.000-03:00","card_number_first_six":"514945","card_number_last_four":"2204","token":"a23bc727-22b2-4c7a-9eb7-364635d317bd","created_at":"2019-01-21T16:16:49.000-02:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"}}],"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null},"period":{"id":22892403,"billing_at":"2019-03-21T00:00:00.000-03:00","cycle":3,"start_at":"2019-03-21T00:00:00.000-03:00","end_at":"2019-04-20T23:59:59.000-03:00","duration":2678399},"subscription":{"id":6066951,"code":null,"plan":{"id":64388,"name":"Follows Br 4","code":null},"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null}},"metadata":{},"payment_profile":null,"payment_condition":null}}}}";


//s:1577:"{"event":{"type":"charge_created","created_at":"2019-03-21T11:28:32.652-03:00","data":{"charge":{"id":39412002,"amount":"79.9","status":"paid","due_at":"2019-03-21T23:59:59.000-03:00","paid_at":"2019-03-21T11:28:31.000-03:00","installments":1,"attempt_count":1,"next_attempt":null,"print_url":null,"created_at":"2019-03-21T11:28:28.000-03:00","updated_at":"2019-03-21T11:28:31.000-03:00","last_transaction":{"id":66040773,"transaction_type":"capture","status":"success","amount":"79.9","installments":1,"gateway_message":"Aprovado","gateway_response_code":null,"gateway_authorization":"","gateway_transaction_id":"54437a7d-47d6-493a-84b8-0ed6442e1eaa","gateway_response_fields":{"stone_id_rcpt_tx_id":"18093121581064"},"fraud_detector_score":null,"fraud_detector_status":null,"fraud_detector_id":null,"created_at":"2019-03-21T11:28:30.000-03:00","gateway":{"id":23582,"connector":"stone"},"payment_profile":{"id":10352760,"holder_name":"LEANDRO D GARCIA","registry_code":null,"bank_branch":null,"bank_account":null,"card_expiration":"2026-10-31T23:59:59.000-03:00","card_number_first_six":"514945","card_number_last_four":"2204","token":"a23bc727-22b2-4c7a-9eb7-364635d317bd","created_at":"2019-01-21T16:16:49.000-02:00","payment_company":{"id":1,"name":"MasterCard","code":"mastercard"}}},"payment_method":{"id":25589,"public_name":"Cartão de crédito","name":"Cartão de crédito","code":"credit_card","type":"PaymentMethod::CreditCard"},"bill":{"id":40505269,"code":null},"customer":{"id":6996507,"name":"LEANDRO D GARCIA","email":"lemack.garcia@gmail.com","code":null}}}}}";