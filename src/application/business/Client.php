<?php

namespace business {

    require_once config_item('business-user-class');
    require_once config_item('business-insta-curl-info-class');
    require_once config_item('business-ref_profile-class');
    require_once config_item('business-reference-profiles-class');

    /**
     * @category Business class
     * 
     * @access public
     *
     * @todo Define an Client business class.
     * 
     */
    class Client extends User {

        public $InstaCurlInfo;
        public $InstaContactInfo;       // Client intagram general information Class
        public $ReferenceProfiles;      // Client referent profiles Class
        public $DailyReport;            // Client daily report Class

        public function __construct(int $id) {
            parent::__construct($id);

            $this->InstaCurlInfo = new InstaCurlInfo($this);
            //$this->InstaContactInfo = new InstaContactInfo($this);
            $this->ReferenceProfiles = new ReferenceProfiles($this);
            //$this->DailyReport = new DailyReport($this);
        }

        public function load_data() {
            parent::load_data();

            $ci = &get_instance();
            $data = $ci->users_model->get_user_base_info($this->Id);

            if ($data) {
                $this->fill_data($data);
            }
        }       

        protected function fill_data(\stdClass $data) {
            parent::fill_data($data);
        }

        public function load_insta_data() {
            $this->InstaCurlInfo->load_data();
        }

        public function load_insta_reference_profiles_data(int $status = 0, int $type = -1) {
            $this->ReferenceProfiles->load_data($status, $type);
        }

        public function login() {
            return true;
        }
        
        public function SaveFollowed()
        {}

    }

}

?>
