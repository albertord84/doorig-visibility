<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-user_status-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class ClientList extends Business {

        public $Clients;

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct() {
            parent::__construct();

            $this->Clients = array();
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data(int $status = UserStatus::ACTIVE) {
            $CI = &get_instance();
            $CI->load->model("Client_mark_model");
            $data = $CI->Client_mark_model->get_all_by_status($status);

            $this->Clients = array();

            $this->fill_data($data);
        }

        private function fill_data(array $clients = NULL) {
            if (count($clients)) {
                foreach ($clients as $client) {
                    $Client = new Client($client->client_id);
                    $Client->MarkInfo->fill_data($client);
                    $this->Clients[$Client->Id] = $Client;
                }
            } else {
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

        /**
         *  
         */
        public function remove_item(int $client_id) {
            $this->Clients[$client_id]->remove($client_id);
            unset($this->Clients[$client_id]);
        }

        public function add_item(int $client_id, $plane_id = 1, $pay_id = NULL, $proxy_id = NULL, $login = NULL, $pass = NULL, $insta_id = NULL, $init_date = NULL, $end_date = NULL, $cookies = NULL, $observation = NULL, $purchase_counter = NULL, $last_access = NULL, $insta_followers_ini = NULL, $insta_following = NULL) {
            try {
                $client = new Client();
                $id = $client->save($client_id, $plane_id, $pay_id, $proxy_id, $login, $pass, $insta_id, $init_date, $end_date, $cookies, $observation, $purchase_counter, $last_access, $insta_followers_ini,$insta_following);     
                array_push($this->Clients, $client);
                return $id;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        public function add_client(Client $client)
        {
             array_push($this->Clients, $client);
        }
    }

}
?>