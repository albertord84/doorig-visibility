<?php

namespace business {

    require_once config_item('business-class');
    require_once config_item('business-client-class');
    require_once config_item('business-ref_profile-class');
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

        public $ReferenceProfiles;
        private $Client; // Client Reference
        
        public $amount_reference_profile_used = NULL;
        public $amount_profile_followed = NULL;  //cantidad de seguidos por perfiles de referencia
        public $amount_geolocations_used = NULL;
        public $amount_profile_geolocations_followed = NULL; //cantidad de seguidos por geolocations
        public $amount_hashtags_used = NULL;
        public $amount_profile_hashtags_followed = NULL;
        
        /**
         * 
         * @todo Class constructor.
         * 
         */

        function __construct(Client &$client) {
            parent::__construct();

            $this->Client = $client;
            $this->ReferenceProfiles = array();
        }

        /**
         * 
         * @throws Exception
         */
        public function load_data(int $status = 1, int $type = -1) {
            $CI = &get_instance();
            $CI->load->model("Reference_profile_model");
            $data = $CI->Reference_profile_model->get_all_id($this->Client->Id, $status, $type);

            $this->ReferenceProfiles = array();

            $this->fill_data($data);
        }

        private function fill_data(array $referenec_profiles = NULL) {
            if (count($referenec_profiles)) {
                foreach ($referenec_profiles as $key => $reference_profile) {
                    $ReferenceProfile = new ReferenceProfile($reference_profile->id);

                    $this->ReferenceProfiles[$reference_profile->id] = $ReferenceProfile;
                    //$this->ReferenceProfiles[$ReferenceProfile->id] = $ReferenceProfile;
                }
            } else {
                //throw ErrorCodes::getException(ErrorCodes::CLIENT_DATA_NOT_FOUND);
            }
            
            $ci = &get_instance();
            $ci->load->model("Reference_profile_model");
            
            $this->amount_reference_profile_used = $ci->Reference_profile_model->load_amount_profile_used($this->Client->Id, 0);
            $this->amount_profile_followed = $ci->Reference_profile_model->amount_profile_followed($this->Client->Id, 0);  //cantidad de seguidos por perfiles de referencia
            
            $this->amount_geolocations_used = $ci->Reference_profile_model->load_amount_profile_used($this->Client->Id, 1);
            $this->amount_profile_geolocations_followed = $ci->Reference_profile_model->amount_profile_followed($this->Client->Id, 1); //cantidad de seguidos por geolocations
            
            $this->amount_hashtags_used = $ci->Reference_profile_model->load_amount_profile_used($this->Client->Id, 2);
            $this->amount_profile_hashtags_followed = $ci->Reference_profile_model->amount_profile_followed($this->Client->Id, 2);
        }

        /**
         *  
         */
        public function remove_reference_profile(int $reference_profile_id) {
            $this->ReferenceProfiles[$reference_profile_id]->remove($reference_profile_id);
            unset($this->ReferenceProfiles[$reference_profile_id]);
        }

        public function add_item(string $insta_id, int $client_id, string $init_date = NULL, int $type = NULL) {
            try {
                $reference_profile = new ReferenceProfile();
                $id = $reference_profile->save($insta_id, $client_id, null, $type);
                $this->ReferenceProfiles[$id] = $reference_profile;
                return $id;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        public function workable() {
            $rps = array();
            foreach ($this->ReferenceProfiles as $reference_profile) {
                if ($reference_profile->isWorkable()) {
                    $rps[] = $reference_profile;
                }
            }
            return $rps;
        }

    }

}
?>