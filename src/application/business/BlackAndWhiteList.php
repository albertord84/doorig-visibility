<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-black_and_white_item-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class BlackAndWhiteList extends Business {

        public $BlackAndWhiteList;
        private $Client; // Client Reference

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct(Client &$client) {
            parent::__construct();

            $this->Client = $client;
            $this->BlackAndWhiteList = array();
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data() {
            $CI = &get_instance();
            $CI->load->model("Black_and_white_list_model");
            $data = $CI->Black_and_white_list_model->get_all($this->Client->Id);

            $this->BlackAndWhiteList = array();

            $this->fill_data($data);
        }

        private function fill_data(array $items = NULL) {
            if (count($items)) {
                foreach ($items as $key => $item) {
                    $BlackAndWhiteItem = new BlackAndWhiteItem();
                    $BlackAndWhiteItem->fill_data($item);

                    $this->BlackAndWhiteList[$item->id] = $BlackAndWhiteItem;
                }
            } else {
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

        /**
         *  
         */
        public function remove_item(int $id) {
            $this->BlackAndWhiteList[$id]->remove($id);
            unset($this->BlackAndWhiteList[$id]);
        }

        public function add_item(int $client_id, string $insta_id, string $profile, string $init_date = NULL, $black_or_white = NULL) {
            try {
                $black_and_white_item = new BlackAndWhiteItem();
                $id = $black_and_white_item->save($client_id, $insta_id, $profile, NULL, $black_or_white);
                $this->BlackAndWhiteList[$id] = $black_and_white_item;
                return $id;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

    }

}
?>