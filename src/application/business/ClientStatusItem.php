<?php

namespace business {

    require_once config_item('business-loader-class');

    use InstaApiWeb\Cookies;

    /**
     * Description of HashtagProfile
     *
     * @author dumbu
     */
    class ClientStatusItem extends Loader {

        public $id;
        public $client_id;
        public $client_status_id;
        public $active = NULL;
        public $start_date = NULL;
        public $end_date = NULL;

        public function __construct(int $id = NULL) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('Client_status_list_model');

            $this->id = $id;
            if ($id) {
                $this->load_data();
            }
        }

        public function load_data() {
            $ci = &get_instance();
            $data = $ci->Client_status_list_model->get_by_id($this->id);

            if ($data)
                $this->fill_data($data);
        }

        public function load_data_by_id(int $id = NULL) {
            $this->id = $id ? $id : $this->id;
            $ci = &get_instance();
            $data = $ci->Client_status_list_model->get_by_id($this->id);

            $this->fill_data($data);
        }

        public function load_data_by_insta_id(int $client_id, int $client_status_id) {
            $ci = &get_instance();
            $data = $ci->Client_status_list_model->get_by_client_status_id($client_id, $client_status_id);

            if ($data)
                $this->fill_data($data);
        }

        protected function fill_data(\stdClass $data) {
            $this->client_id = $data->client_id;
            $this->client_status_id = $data->client_status_id;
            $this->start_date = $data->start_date;
            $this->end_date = $data->end_date;
            $this->active = $data->active;
        }

        /**
         *  
         */
        public function remove() {
            $ci = &get_instance();
            $ci->load->model('Client_status_list_model');
            if ($this->Id)
                $ci->Client_status_list_model->update($this->id, $client_id = NULL, $client_status_id = NULL, $active = 0, $start_date = NULL, $end_date = (string)time());
            else
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
        }

        /**
         *  
         */
        static function update(int $id, int $client_id = NULL, int $client_status_id = NULL, bool $active = TRUE, string $start_date = NULL, string $end_date = NULL) {
            $ci = &get_instance();
            $ci->load->model('Client_status_list_model');
            
            $id = $ci->Client_status_list_model->update($id, $client_id, $client_status_id, $active, $start_date, $end_date);

            return $id;
        }

    }

}    
