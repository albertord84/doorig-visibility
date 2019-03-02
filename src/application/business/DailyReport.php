<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('business-client-class');

    use InstaApiWeb\Cookies;

    /**
     * Description of SimpleClient
     *
     * @author jose
     */
    class DailyReport {

        //put your code here
        public $data;
        public $Client;

        function __construct(Client &$client) {
            $this->Client = $client;
        }

        /**
         * Get client data
         * @param int $client_id
         * @return DataSet  
         */
        public function load_data($offset = 0, $rows = 0) {
            $ci = &get_instance();
            $ci->load->model('daily_report_model');
            $data = $ci->daily_report_model->get_all($this->Client->Id, $offset, $rows);

            if (!$data)
                return false;
            $this->fill_data($data);
            return true;
        }

        protected function fill_data(array $data) {
            $this->data = $data;
        }

    }

}