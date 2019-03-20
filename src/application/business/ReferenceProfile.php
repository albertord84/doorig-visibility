<?php

namespace business {

    require_once config_item('business-loader-class');
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-followers-response-class');
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
        
        public $Client; // Client Reference

        public function __construct(int $id = NULL, Client &$Client = NULL) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');

            $this->Client = $Client;
            
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
                $id = $ci->reference_profile_model->save($insta_id, $instaname, $client_id, 1 /* ACTIVE */, $type);
            }
            return $id;
        }

        /**
         *  
         */
        public function increase_follows(int $follows_count = 1) {
            $ci = &get_instance();
            $ci->load->model('reference_profile_model');
            $this->Follows += $follows_count;
            $ci->reference_profile_model->update($this->Id, $insta_id = NULL, $insta_name = NULL, $status_id = NULL, $insta_follower_cursor = NULL, $deleted = NULL, $end_date = NULL, $this->Follows);
        }

        public function get_followers(Cookies $cookies = NULL, int $N = 15, Proxy $proxy = NULL) {
            $response = new \InstaApiWeb\Response\FollowersResponse(array());
            $response = $this->Ref_profile_lib->get_insta_followers($cookies, $N, $this->Cursor, $proxy);

            if ($response->code == 0) {
                $this->Cursor = $response->Cursor;

                $ci = &get_instance();
                $ci->load->model('reference_profile_model');
                $ci->reference_profile_model->update($this->Id, $insta_id = NULL, $insta_name = NULL, $status_id = NULL, $this->Cursor, $deleted = NULL, $end_date = NULL, $follows = NULL, $last_access = time());
            } 
            
            return $response;
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


        public function process_get_followers_error($daily_work, $client, $quantity, $proxy) {
            $result = $this->RecognizeClientStatus($client);
            if (isset($result->json_response->authenticated) && $result->json_response->authenticated) {
                //retry of graph request
                $json_response = $this->get_insta_followers($result, $daily_work->rp_insta_id, $quantity, $daily_work->insta_follower_cursor, $proxy);
                if ($json_response === NULL) {
                    $this->DB->update_reference_cursor($daily_work->reference_id, NULL);
                    $this->DB->delete_daily_work($daily_work->reference_id);
                    $this->DB->insert_event_to_washdog($client_id, washdog_type::ERROR_IN_PR, 1, $this->id, "unexistence reference profile or may be the reference profile is block ing the client");
                } else if (isset($json_response->status) && $json_response->status == 'ok') {
                    return $json_response;
                }
                return NULL;
            } else if ($result->json_response->message == 'checkpoint_required' || $result->json_response->message == 'incorrect_password') {
                //unautorized, bloc by password or an api unrecognized error
                $msg = $result->json_response->message;
                var_dump("daily work deleted for client ($daily_work->client_id) because $msg\n");
                $this->DB->delete_daily_work_client($daily_work->client_id);
            }
        }

        function isWorkable() {
            return $this->Status_id == StatusProfiles::ACTIVE && $this->End_date == NULL;
        }

    }

}    
