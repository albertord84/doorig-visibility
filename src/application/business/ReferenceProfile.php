<?php

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('business-status_profiles-class');

    use InstaApiWeb\Cookies;
    use \InstaApiWeb\Response\FollowersResponse;

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

        public function __construct(int $id = NULL) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');

            $this->Id = $id;
            if ($id) {
                $this->load_data();
            }
        }

        public function load_data() {
            $ci = &get_instance();
            $data = $ci->reference_profile_model->get_by_id($this->Id);

            $this->fill_data($data);
        }

        public function load_data_by_id(int $id) {
            $ci = &get_instance();
            $data = $ci->reference_profile_model->get_by_id($id);

            $this->fill_data($data);
        }

        public function load_data_by_insta_id(string $insta_id, int $client_id) {
            $ci = &get_instance();
            $data = $ci->reference_profile_model->get_by_insta_id($insta_id, $client_id);

            if ($data)
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

            $ci = &get_instance();
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

        /**
         *  
         */
        public function remove() {
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');
            if ($this->Id)
                $ci->reference_profile_model->remove($this->Id);
            else
                throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
        }

        /**
         *  
         */
        static function save(string $insta_id, string $instaname = NULL, int $client_id = NULL, int $type = NULL) {
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');
            if (ReferenceProfile::exist($insta_id, $client_id, 1 /* ACTIVE */)) {
                throw ErrorCodes::getException(ErrorCodes::DATA_ALREADY_EXIST);
            } else {
                $ci = &get_instance();
                $id = $ci->reference_profile_model->save($insta_id, $instaname, $client_id, 1 /* ACTIVE */, $type);
            }
            return $id;
        }

        public function get_followers(Cookies $cookies = NULL, int $N = 15, Proxy $proxy = NULL) {
            $response = new FollowersResponse();
            $response = $this->Ref_profile_lib->get_insta_followers($cookies, $N, $this->Cursor, $proxy);

            if($this->get_insta_followers_reponse($response))
            {
                return $response;
            }
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

        function get_insta_followers_reponse(FollowersResponse $response) {
            if ($response->code == 0) {
                $this->Cursor = $response->Cursor;
                return true;
            } else if ($response->code != 0) {                
                 var_dump($response);
            }
            return false;
        }
        
        function isWorkable() {
            return $this->Status_id == StatusProfiles::ACTIVE && $this->End_date == NULL;
        }

    }

}    
