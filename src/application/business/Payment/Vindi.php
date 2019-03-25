<?php

namespace business\Payment {

    require_once config_item('business-client-class');
    require_once config_item('business-response-class');
    require_once config_item('business-response_recurrency_payment-class');

    use business\Client;
    use business\Response\Response;
    use business\Response\ResponseRecurrencyPayment;

    class Vindi extends \business\Business {

        public $client_id, $gateway_client_id, $plane_id, $payment_key, $gateway_id;
        public $Client;

        //private $api_arguments;
        const store_key_access = "XWXkz0NyEjY1F1XiU-cA9e-iLMPsPnr0abkbS_s763k";
        //  const store_api_uri = "https://sandbox-app.vindi.com.br/api/v1/"; // Sandbox
        const store_api_uri = "https://app.vindi.com.br/api/v1/"; // Production
        const store_address = "app.vindi.com.br/DOUBLEWEISER";
        const store_name = "DOUBLEWEISER SOLUCOES TECNOLOGICAS LTDA ";
        const store_flag_names = "Visa, MasterCard, American Express, Aura, Diners, Discover, Elo, JCB, Visa Electron, Mastercard";
        const prod_1real_id = "411113";

        function __construct(Client &$Client = NULL) {
            $ci = &get_instance();
            $ci->load->model('Client_payment_model');

            $this->Client = $Client;

            if ($Client)
                $this->client_id = $Client->Id;

            $this->api_arguments = array(
                'VINDI_API_KEY' => $this::store_key_access,
                'VINDI_API_URI' => $this::store_api_uri
            );
        }

        public function load_data(int $client_id = NULL) {
            $this->client_id = $client_id ? $client_id : $this->client_id;

            $ci = &get_instance();
            $data = $ci->Client_payment_model->get_by_id($this->client_id);

            if ($data)
                $this->fill_data($data);
        }

        /**
         * Get client data
         * @param int $client_id
         * @return DataSet  
         */
        public function load_data_by_gateway_client_id(int $gateway_client_id = NULL) {
            parent::load_data();

            $gateway_client_id = $gateway_client_id ? $gateway_client_id : $this->gateway_client_id;

            $ci = &get_instance();
            $ci->load->model('Client_payment_model');
            $data = $ci->Client_payment_model->load_data_by_gateway_client_id($gateway_client_id);

            if ($data)
                $this->fill_data($data);
            return $data;
        }

        public function fill_data(\stdClass $data) {
            $this->client_id = $data->client_id;
            $this->gateway_client_id = $data->gateway_client_id;
            $this->plane_id = $data->plane_id;
            $this->payment_key = $data->payment_key;
            $this->gateway_id = $data->gateway_id;
        }

        public function save(int $client_id = NULL, int $gateway_client_id = NULL, int $plane_id = NULL, string $payment_key = NULL, int $gateway_id = NULL) {
            $client_id = $client_id ? $client_id : $this->client_id;
            $ci = &get_instance();
            $ci->Client_payment_model->save($client_id, $gateway_client_id, $plane_id, $payment_key, $gateway_id);
        }

        public function update(int $client_id = NULL, int $gateway_client_id = NULL, int $plane_id = NULL, string $payment_key = NULL, int $gateway_id = NULL) {
            $client_id = $client_id ? $client_id : $this->client_id;
            $ci = &get_instance();
            $ci->Client_payment_model->update($client_id, $gateway_client_id, $plane_id, $payment_key, $gateway_id);
        }

        //---------------VINDI FUNCTIONS-----------------------------    

        function load_web_hooks() {
            // Instancia o objeto que irá lidar com os Webhooks.
            $webhookHandler = new \Vindi\WebhookHandler();

            // Pega o evento interpretado pelo objeto.
            return $event = $webhookHandler->handle();

            // Decide a ação com base no evento
            switch ($event->type) {
                case 'subscription_canceled':
                    // Lidar com o evento de Assinatura cancelada.
                    break;
                case 'subscription_created':
                    // Lidar com o evento de Assinatura efetuada
                    break;
                case 'charge_rejected':
                    // Lidar com o evento de Cobrança rejeitada
                    break;
                case 'bill_created':
                    // Lidar com o evento de Fatura emitida
                    break;
                case 'bill_paid':
                    // Lidar com o evento de Fatura paga
                    break;
                case 'period_created':
                    // Lidar com o evento de Período criado
                    break;
                case 'test':
                    // Lidar com o evento de Teste da URL
                    break;
                default:
                    // Lidar com falhas e eventos novos ou desconhecidos
                    break;
            }
        }

        static function vindi_process_notification_post() {
            try {
                //0. Get Web Hooks (Callbacks)
                $event = $this->load_web_hooks();

                //1. Get and Save Raw Content Input String
                $post_str = file_get_contents('php://input');
                $path = __dir__ . '/../../../logs/vindi/';
                $file = $path . "vindi_notif_post-" . date("d-m-Y") . ".log";
                $result = file_put_contents($file, "\n\n", FILE_APPEND);
                $result = file_put_contents($file, json_encode($event), FILE_APPEND);

                //2. Converto Raw Object to string
                $post = urldecode($post_str);
                $post = json_decode($post);

                //3. Process input object
                if (isset($post->event) && isset($post->event->type)) {
                    //4.1 Recurrence created succefully
                    $gateway_client_id = $post->event->data->charge->customer->id;
                    //4.1 Save Client 
                    $this->load_data_by_gateway_client_id($gateway_client_id);
                    $Client = new Client($this->client_id);
                    $Client->MarkInfo->load_data();
                    //[]
                    $Client->MarkInfo = new MarkInfo($Client);
                    if ($post->event->type == "charge_created") {
                        //$gateway_client_id = $post->event->data->bill->customer->id;
                        //$gateway_payment_key = $post->event->data->bill->subscription->id;
                        //$this->save($this->client_id, $gateway_client_id);
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

        public function get_all($status) {
            $customerService = new Vindi\Customer($this->api_arguments);
            // Busca todos os clientes, ordenando pelo campo 'created_at' descendente.
            $customers = $customerService->all([
                'sort_by' => 'created_at',
                'sort_order' => 'desc'
            ]);

            // Para cada cliente da array de clientes
            foreach ($customers as $customer) {
                echo "O cliente '{$customer->name}' foi obtido!<br />";
            }
        }

        /**
         * Add new client to Vindi
         * @param type $name
         * @param type $email
         * @return Vindi client id or Exception whether fail
         */
        public function addClient(string $name, string $email = null) {
            // Cria um novo cliente:
            try {
                // Instancia o serviço de Customers (Clientes) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $customerService = new \Vindi\Customer($this->api_arguments);
                $customer = $customerService->create([
                    'name' => $name,
                    'email' => $email,
                ]);
            } catch (\Exception $e) {
                return Response::ResponseFAIL($e->getMessage(), $e->getCode());
            }

            return $customer->id;
        }

        /**
         * Add payment data to Client
         * @param type $client_id Follows client id
         * @param type $payment_data 
         * @return payment data or \Exception whether error
         */
        public function addClientPayment(int $client_id, array $payment_data) {
            $client_id = $client_id ? $client_id : $this->client_id;
            //if ($this->Client)
            try {
                $payment_profilesService = new \Vindi\PaymentProfile($this->api_arguments);
                $payment = $payment_profilesService->create([
                    "holder_name" => $payment_data['holder_name'],
                    "card_expiration" => $payment_data['card_expiration'],
                    "card_number" => $payment_data['card_number'],
                    "card_cvv" => $payment_data['card_cvv'],
                    "payment_method_code" => "credit_card",
                    "customer_id" => $payment_data['customer_id']
                ]);
            } catch (\Exception $e) {
                var_dump($e);
                return Response::ResponseFAIL($e->getMessage(), $e->getCode());
            }
            if ($payment && $payment->status == 'active')
                return Response::ResponseOK();
            return Response::ResponseFAIL(T("Pagamento não ativo. Conferir!"));
        }

        /**
         * Add new Assigment for client 
         * @param type $client_id Follows client id
         * @param time $date
         * @param plane_id In update plane situation
         * @return \Exception recurrency payment or exception
         */
        public function create_recurrency_payment($date = NULL) {
            // Cria nova assignatura:
            if (!$date)
                $date = time();
            $date = date("d/m/Y", $date);

            try {
                // Instancia o serviço de Subscription (Assinaturas) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $subscriptionService = new \Vindi\Subscription($this->api_arguments);
                $subscription = $subscriptionService->create([
                    "start_at" => $date,
                    "plan_id" => $this->Client->MarkInfo->Plane->gateway_plane_id,
                    "customer_id" => $this->gateway_client_id,
                    "payment_method_code" => "credit_card"
                ]);
                $PaymentKey = isset($subscription) && isset($subscription->id) ? $subscription->id : NULL;
                $Response = new ResponseRecurrencyPayment($PaymentKey, $subscription);
                return $Response;
            } catch (\Exception $e) {
                return Response::ResponseFAIL($e->getMessage(), $e->getCode());
            }
        }

        /**
         * Reschedule Assigment for client 
         * @param type $client_id Follows client id
         * @param timestamp $date
         * @return \Exception reschedule recurrency payment or exception
         */
        public function reschedule_recurrency_payment($client_id, $date) {
            // Cria nova assignatura:
            $return = new \stdClass();
            $return->success = false;
            try {
                // Load cient data from DB
                $DB = new \follows\cls\DB();
                $client_data = $DB->get_client_payment_data($client_id);
                if (!$client_data)
                    throw new Exception("Client payment data not found");

                // Instancia o serviço de Subscription (Assinaturas) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $subscriptionService = new \Vindi\Subscription($this->api_arguments);
                $subscription = $subscriptionService->update($client_data->payment_key, [
                    "billing_trigger_day" => $date
                ]);
            } catch (\Exception $e) {
                $return->message = $e->getMessage();
                return $return;
            }
            $return->success = $subscription->status == 'active' || $subscription->status == 'future';
            $return->payment_key = isset($subscription) && isset($subscription->id) ? $subscription->id : NULL;
            $return->subscription = $subscription;
            return $return;
        }

        /**
         * Delete recurrency payment status (Cancel subscription)
         * @param type $payment_id
         * @return Subscription or \Exception
         */
        public function cancel_recurrency_payment($payment_id) {
            $return = new \stdClass();
            $return->success = false;
            try {
                // Instancia o serviço de Subscription (Assinaturas) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $subsService = new \Vindi\Subscription($this->api_arguments);
                $subs = $subsService->delete($payment_id);
            } catch (\Exception $e) {
                $return->message = $e->getMessage();
                return $return;
            }
            $return->success = $subs->status == 'canceled' || $subs->status == 'expired';
            return $return;
        }

        /**
         * Check recurrency payment status
         * @param type $payment_id
         * @return Payment or \Exception
         */
        public function query_recurrency_payment($payment_id) {
            try {
                // Instancia o serviço de Subscription (Assinaturas) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $subsService = new \Vindi\Subscription($this->api_arguments);
                $subs = $subsService->get($payment_id);
            } catch (\Exception $e) {
                return $e;
            }

            return $subs;
        }

        /**
         * Create a instantan payment 
         * @param type $client_id Follows client id
         * @param type $prod_id Products id
         * @param type $amount Amount of Products to by payed
         * @return \Exception recurrency payment or exception
         */
        public function create_payment($client_id, $prod_id = this::prod_1real_id, $amount = 0) {
            // Cria pagamento abulso:
            $return = new \stdClass();
            $return->success = false;
            try {
                // Load cient data from DB
                $DB = new \follows\cls\DB();
                $client_data = $DB->get_client_payment_data($client_id);
                //var_dump($client_data);
                // Instancia o serviço de Bill (Fatura) com o array contendo VINDI_API_KEY e VINDI_API_URI
                // $billService = new \Vindi\Bill($this->api_arguments);
                $billService = new \Vindi\Bill($this->api_arguments);
                $bill = $billService->create([
                    "plan_id" => $client_data->gateway_plane_id,
                    "customer_id" => $client_data->gateway_client_id,
                    "payment_method_code" => "credit_card",
                    "bill_items" => [
                        [
                            "product_id" => $prod_id,
                            "amount" => $amount
                        ]
                    ]
                ]);
            } catch (\Exception $e) {
                $return->message = $e->getMessage();
                return $return;
            }
            $return->success = true;
            $return->status = $bill->status;
            return $return;
        }

        /**
         * Check payment status
         * @param type $payment_id
         * @return Payment or \Exception
         */
        public function query_payment($payment_id) {
            try {
                // Instancia o serviço de Bill (Fatura) com o array contendo VINDI_API_KEY e VINDI_API_URI
                $billService = new \Vindi\Bill($this->api_arguments);
                $bill = $billService->get($payment_id);
            } catch (\Exception $e) {
                return $e;
            }

            return $bill;
        }

        public static function detectCardType($num) {
            $re = array(
                "visa" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
                "mastercard" => "/^5[1-5][0-9]{14}$/",
                "amex" => "/^3[47][0-9]{13}$/",
                "discover" => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
                "diners" => "/^3[068]\d{12}$/",
                "elo" => "/^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})$/",
                "hipercard" => "/^(606282\d{10}(\d{3})?)|(3841\d{15})$/"
            );

            if (preg_match($re['visa'], $num)) {
                return 'Visa';
            } else if (preg_match($re['mastercard'], $num)) {
                return 'Mastercard';
            } else if (preg_match($re['amex'], $num)) {
                return 'Amex';
            } else if (preg_match($re['discover'], $num)) {
                return 'Discover';
            } else if (preg_match($re['diners'], $num)) {
                return 'Diners';
            } else if (preg_match($re['elo'], $num)) {
                return 'Elo';
            } else if (preg_match($re['hipercard'], $num)) {
                return 'Hipercard';
            } else {
                return false;
            }
        }

    }

}    