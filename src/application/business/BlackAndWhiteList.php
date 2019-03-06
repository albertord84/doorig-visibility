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
                    $BlackAndWhiteItem = new BlackAndWhiteItem($item->id);

                    $this->BlackAndWhiteList[$item->id] = $BlackAndWhiteItem;
                    //$this->BlackAndWhiteList[$ReferenceProfile->id] = $ReferenceProfile;
                }
            } else {
                //throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

        /**
         *  
         */
        public function remove_item(int $id) {
            $this->BlackAndWhiteList[$id]->remove($id);
            unset($this->BlackAndWhiteList[$id]);
        }

    }

}
?>