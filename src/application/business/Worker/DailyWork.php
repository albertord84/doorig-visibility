<?php

namespace business\worker{
  
  use business\Client;
  use business\Business; 
  use business\SystemConfig;
  use buisness\BInstaClient;
  
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
        public $To_unfollow_list = array();

        /**
         * Elapsed time since last access to this $Client
         * @access public
         */
        public $Client_last_accesss;
        
        public $RP_last_acess;

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
           $this->last_access = $work_data->client_last_access;
           switch ($work_data->rp_type)
           {
             case 0:
               break;
             case 1:               
              $ci->load->library("InstaApiWeb/InstaGeoProfile_lib", null, 'ReferenceProfile');
               break;
             case 2:
               break;
             default :
               break;
           }
           $this->Ref_profile = $ci->ReferenceProfile;
           
           /*
            * ("clients.cookies as cookies,"
                     ."clients.user_id as user_id,"
                     . "clients.last_access as client_last_access,"
                     ."reference_profile.insta_id as rp_insta_id,"
                     ."reference_profile.type as rp_type,"
                     . "reference_profile.id as rp_id,"
                     . "clients.insta_id as insta_id,"
                     . "daily_work.to_follow,daily_work.to_unfollow");
            */
           
           $this->Client = BInstaClient::buildClient($work_data->user_id,$work_data->insta_id,new CookiesRequest($work_data->cookies));
                 
        }
        
        public function is_work_done($config) {
            
        }

        public function get_unfollow_data($client_id) {
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