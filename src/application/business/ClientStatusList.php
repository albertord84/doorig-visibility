<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-client_status_item-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class ClientStatusList extends Business {

        public $ClientStatusList;
        private $Client; // Client Reference

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct(Client &$client) {
            parent::__construct();

            $this->Client = $client;
            $this->ClientStatusList = array();
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data() {
            $CI = &get_instance();
            $CI->load->model("Client_status_list_model");
            $data = $CI->Client_status_list_model->get_all($this->Client->Id);

            $this->ClientStatusList = array();

            $this->fill_data($data);
        }

        private function fill_data(array $items = NULL) {
            if (count($items)) {
                foreach ($items as $key => $item) {
                    $ClientStatusItem = new ClientStatusItem($item->id);

                    $this->ClientStatusList[$item->id] = $ClientStatusItem;
                }
            } else {
                //throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

        /**
         *  
         */
        public function remove_item(int $id) {
            try {
                $this->ClientStatusList[$id]->remove($id);
                unset($this->ClientStatusList[$id]);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function add_item(int $client_status_id, bool $active = TRUE, string $init_date = NULL, string $end_date = NULL) {
            try {
                if ($this->hasStatus($client_status_id))
                    return;
                $client_status_item = new ClientStatusItem();
                $id = $client_status_item->save($this->Client->Id, $client_status_id, $active, $init_date, $end_date);
                $client_status_item->load_data_by_id($id);
                $this->ClientStatusList[$id] = $client_status_item;
                return $id;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function hasStatus(int $status_id, int $active = 1) {
            $client_status_item = new ClientStatusItem();
            foreach ($this->ClientStatusList as $key => $client_status_item) {
                if ($client_status_item->client_status_id == $status_id)
                    return TRUE;
            }
            return FALSE;
        }

    }

}
?>