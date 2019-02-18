<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-reference-profile-class');
    require_once config_item('business-error-codes-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class ReferenceProfiles extends Business {

        public $Modules;
        private $Client; // Client Reference

        /**
         * 
         * @todo Class constructor.
         * 
         */
        function __construct(Client &$client) {
            parent::__construct();

            $CI = &get_instance();
            $CI->load->model("Clients_modules_model");

            $this->Client = $client;
            $this->Modules = array();
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data(int $active) {
            $CI = &get_instance();
            $data = $CI->Clients_modules_model->get_all($this->Client->Id);

            $this->fill_data($data);
        }

        private function fill_data(array $modules = NULL) {
            if (count($modules)) {
                foreach ($modules as $key => $client_module) {
                    $Module = new Module();
                    $Module->load_data($client_module->id);
                    $this->Modules[$Module->Name] = new ClientModule($this->Client, $Module);
                    $this->Modules[$Module->Name]->fill_data($client_module);
                    //$this->Modules[$key] = new ClientModule($this->Client, $Module);
                    //$this->Modules[$key]->fill_data($module);
                }
            } else {
                //throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
        }

    }

}
?>