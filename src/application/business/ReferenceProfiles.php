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
        public function load_data(int $status = 0, int $type = -1) {
            $CI = &get_instance();
            $CI->load->model("Reference_profile_model");
            $data = $CI->Reference_profile_model->get_all_id($this->Client->Id, $status, $type);

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
        }

        /**
         *  
         */
        public function remove_reference_profile(int $reference_profile_id) {
            $this->ReferenceProfiles[$reference_profile_id]->remove($reference_profile_id);
            unset($this->ReferenceProfiles[$reference_profile_id]);
        }

    }

}
?>