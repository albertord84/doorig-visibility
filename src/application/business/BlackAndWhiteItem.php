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

            $this->id = $id;
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
            $this->id = $data->id;
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
            if ($this->id)
                $ci->black_and_white_list_model->remove($this->id);
            else
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
        }

        /**
         * 
         * @param int $client_id
         * @param string $insta_id
         * @param string $profile
         * @param string $init_date
         * @param type $black_or_white
         * @return int New inserted Id
         * @throws ErrorCodes DATA_ALREADY_EXIST exception
         */
        static function save(int $client_id, string $insta_id, string $profile, string $init_date = NULL, $black_or_white = NULL) {
            $init_date = $init_date ? $init_date : time();
            $ci = &get_instance();
            $ci->load->model('black_and_white_list_model');
            if (BlackAndWhiteItem::exist($insta_id, $client_id)) {
                throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
            } else {
                $ci = &get_instance();
                $id = $ci->black_and_white_list_model->save($client_id, $insta_id, $profile, $init_date, null, null, $black_or_white);
            }

            return $id;
        }

        static function exist(string $insta_id, int $client_id) {
            try {
                $RP = new BlackAndWhiteItem();
                $RP->load_data_by_insta_id($insta_id, $client_id);

                $exist = $RP->id > 0;
                if ($exist)
                    $exist = $RP->deleted == false;
                return $exist;
            } catch (\Exception $exc) {
                //echo $exc->getTraceAsString();
            }
        }

    }

}    
