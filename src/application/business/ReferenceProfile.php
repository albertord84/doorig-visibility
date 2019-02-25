<?php

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('thirdparty-cookies-resource');

    use InstaApiWeb\Cookies;

    /**
     * Description of HashtagProfile
     *
     * @author dumbu
     */
    class ReferenceProfile extends Loader {

        /**
         *
         * @var type 
         */
        public $Id;

        /**
         *
         * @var type 
         */
        public $Insta_name;

        /**
         *
         * @var type 
         */
        public $Insta_id;

        /**
         *
         * @var type 
         */
        public $Status_id;

        /**
         *
         * @var type 
         */
        public $Client_id;

        /**
         *
         * @var type 
         */
        public $Insta_Followers_cursor;

        /**
         *
         * @var type 
         */
        public $Deleted;

        /**
         *
         * @var type 
         */
        public $End_date;

        /**
         *
         * @var type 
         */
        public $Follows;

        /**
         *
         * @var type 
         */
        public $Type;

        /**
         *
         * @var type 
         */
        public $Last_access;
        public $Cursor;
        public $Ref_profile_lib;

        public function __construct(int $id) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');
            $this->Id = $id;
            $this->load_data();

            switch ($this->Type) {
                case 0:
                    $ci->load->library("InstaApiWeb/InstaPersonProfile_lib", array("insta_id" => $this->Insta_id), 'instaprofile_lib');
                    break;
                case 1:
                    $obj = $ci->load->library("InstaApiWeb/InstaGeoProfile_lib", array("insta_id" => $this->Insta_id), 'instaprofile_lib');
                    break;
                case 2:
                    $ci->load->library("InstaApiWeb/InstaHashProfile_lib", array("insta_name" => $this->Insta_name), 'instaprofile_lib');
                    break;
                default:
                    //throw exception type does not exist
                    break;
            }

            $this->Ref_profile_lib = $ci->instaprofile_lib;
            unset($ci->instaprofile_lib);
        }

        public function load_data() {
            $ci = &get_instance();
            $data = $ci->reference_profile_model->get_by_id($this->Id);

            $this->fill_data($data);
        }

        protected function fill_data(\stdClass $data) {
            $this->Id = $data->id;
            $this->Insta_name = $data->insta_name;
            $this->Insta_id = $data->insta_id;
            $this->Status_id = $data->status_id;
            $this->Client_id = $data->client_id;
            $this->Insta_Followers_cursor = $data->insta_Followers_cursor;
            $this->Deleted = $data->deleted;
            $this->End_date = $data->end_date;
            $this->Follows = $data->follows;
            $this->Type = $data->type;
            $this->Last_access = $data->last_access;
            $this->Cursor = $data->cursor;
        }

        /**
         *  
         */
        public function remove() {
            $ci = &get_instance();
            $ci->reference_profile_model->remove($this->Id);
        }

        /**
         *  
         */
        static function save(string $insta_id, string $instaname, int $type) {
            $ci = &get_instance();
            return $ci->reference_profile_model->save($insta_id, $instaname, $type);
        }

        public function get_followers(Cookies $cookies = NULL, int $N = 15, Proxy $proxy = NULL) {
            return $this->Ref_profile_lib->get_insta_followers($cookies, $N, $this->Cursor, $proxy);
        }

    }

}    
