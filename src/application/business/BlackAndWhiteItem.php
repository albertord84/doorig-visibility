<?php

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('business-black_and_white_item-class');

    use InstaApiWeb\Cookies;

    /**
     * Description of HashtagProfile
     *
     * @author dumbu
     */
    class BlackAndWhiteItem extends Loader {

        public $id;
        public $client_id;
        public $insta_id;
        public $profile;
        public $init_date;
        public $end_date;
        public $deleted;
        public $black_or_white;

        public function __construct(int $id = NULL) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('black_and_white_list_model');

            $this->Id = $id;
            if ($id) {
                $this->load_data();
            }
        }

        public function load_data() {
            $ci = &get_instance();
            $data = $ci->black_and_white_list_model->get_by_id($this->Id);

            if ($data)
                $this->fill_data($data);
        }

        public function load_data_by_id(int $id) {
            $ci = &get_instance();
            $data = $ci->black_and_white_list_model->get_by_id($id);

            $this->fill_data($data);
        }

        public function load_data_by_insta_id(string $insta_id, int $client_id) {
            $ci = &get_instance();
            $data = $ci->black_and_white_list_model->get_by_insta_id($insta_id, $client_id);

            if ($data)
                $this->fill_data($data);
        }

        protected function fill_data(\stdClass $data) {
            $this->client_id = $data->client_id;
            $this->insta_id = $data->insta_id;
            $this->profile = $data->profile;
            $this->init_date = $data->init_date;
            $this->end_date = $data->end_date;
            $this->deleted = $data->deleted;
            $this->black_or_white = $data->black_or_white;
        }

        /**
         *  
         */
        public function remove() {
            $ci = &get_instance();
            $ci->load->model('black_and_white_list_model');
            if ($this->Id)
                $ci->black_and_white_list_model->remove($this->Id);
            else
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
        }

        /**
         *  
         */
        static function save(string $insta_id, string $instaname = NULL, int $client_id = NULL, int $type = NULL) {
            $ci = &get_instance();
            $ci->load->model('black_and_white_list_model');
            if (ReferenceProfile::exist($insta_id, $client_id, 1 /* ACTIVE */)) {
                throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
            } else {
                $ci = &get_instance();
                $client_id = $ci->black_and_white_list_model->save($insta_id, $instaname, $client_id, 1 /* ACTIVE */, $type);
            }
            return $client_id;
        }

        static function exist(string $insta_id, int $client_id, int $status = 0) {
            try {
                $RP = new ReferenceProfile();
                $RP->load_data_by_insta_id($insta_id, $client_id);

                $exist = $RP->Id > 0;
                if ($exist && $status)
                    $exist = $RP->Status_id == $status;
                return $exist;
            } catch (\Exception $exc) {
                //echo $exc->getTraceAsString();
            }
        }

    }

}    
