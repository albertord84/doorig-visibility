<?php

namespace business\worker{
  
  use business\Client;
  use business\Business; 
  use business\SystemConfig;
  use buisness\BInstaClient;
  use buisness\ReferenceProfile;
  
  require_once config_item('business-class');
  require_once config_item('business-client-class');
  require_once config_item('business-system_config-class');
  require_once config_item('business-insta-client-class');
  require_once config_item('thirdparty-cookies');
  
  use InstaApiWeb\CookiesRequest;

  /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an DailyWork worker class.
   * 
   */
class DailyWork extends Business{
        /**
         * 
         * @access public
         */
        public $Client;

        /**
         * 
         * @access public
         */
        public $Ref_profile;


        /**
         * 
         * @access public
         */
        public $Foults;

        function __construct() {
          $ci = &get_instance();
      
          $ci->load->model('daily_work_model');   
        }
        
        
        public static function get_next_work()
        {
           $ci = &get_instance();
           $work_data = $ci->daily_work_model->get_next_work();           
           $this->Ref_profile = new ReferenceProfile($work_data->reference_id);           
           $this->Client = new Client($work_data->client_id);
           $this->Client->load_insta_data();
                 
        }
        
        public static function exist_work()
        {
          return TRUE;          
        }
        
        public function is_work_done($config) {
            
        }

        public function get_unfollow_list() {
            // Get profiles to unfollow today for this Client...(i.e the last followed)
          /*  $unfollow_data = $this->db_model->get_unfollow_data($client_id);
            while ($Followed = $unfollow_data->fetch_object()) {
                $To_Unfollow = new \follows\cls\Followed();
                // Update Ref Prof Data
                $To_Unfollow->id = $Followed->id;
                $To_Unfollow->followed_id = $Followed->followed_id;
                array_push($this->Followeds_to_unfollow, $To_Unfollow);
            }*/
        }
   }
}