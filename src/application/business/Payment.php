<?php

namespace business {

    require_once config_item('business-loader-class');

    /*     * x
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Proxy business class.
     * 
     */

    class Payment extends Loader {

        public $client_id, $gateway_client_id, $plane_id, $payment_key, $gateway_id;
        private $APIArguments;

        function __construct(int $client_id = NULL) {
            $ci = &get_instance();
            $ci->load->model('Client_payment_model');

            $this->client_id = $client_id;

            // Coloca a chave da Vindi (VINDI_API_KEY) na variável de ambiente do PHP.
            putenv('VINDI_API_KEY=SUA_CHAVE_DA_API');

            // Coloca a chave da Vindi (VINDI_API_URI) na variável de ambiente do PHP.
            putenv('VINDI_API_URI=https://sandbox-app.vindi.com.br/api/v1/');

            $this->APIArguments = array(
                'VINDI_API_KEY' => 'Bh9yqh34Ar_KjcjTXOUOoJRpExWwL_aoKi_doknv4SI',
                'VINDI_API_URI' => 'https://app.vindi.com.br/api/v1/'
            );

            // Instancia o serviço de Customers (Clientes)
            $this->customerService = new \Vindi\Customer($this->APIArguments);
        }

        public function load_data() {
            //$this->Id = $id ? $id : $this->Id;

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
                    $Client->MarkInfo = new \business\MarkInfo($Client);
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
            $customerService = new Vindi\Customer($this->APIArguments);
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

        public function vindi_add_client($credit_card_name, $user_email) {
            $customerService = new Vindi\Customer($this->APIArguments);
            // Cria um novo cliente:
            $customer = $customerService->create([
                'name' => 'Alberto Reyes',
                'email' => 'albertord84@gmail.com',
            ]);

            $this->update($this->client_id, $customer->id);

            return $customer;
        }

    }

}    