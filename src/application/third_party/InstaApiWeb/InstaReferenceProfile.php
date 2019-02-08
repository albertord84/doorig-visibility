<?php

namespace InstaApiWeb {

  /**
   * Description of ReferenceProfile
   *
   * @author dumbu
   */
  abstract class ReferenceProfile {

    //not need
    //public $id

    public $insta_id;
    public $insta_name;
    public $unfollowed;
    protected $has_logs = TRUE;
    protected $tag_query;

    public function __construct() {
      $this->insta_id = 212673249;
      require_once config_item('thirdparty-insta_api-resource');
      require_once config_item('thirdparty-insta_curl_mgr-resource');
      require_once config_item('thirdparty-cookies');
      //require_once config_item('thirdparty-proxy');
    }

    abstract protected function process_top_search_profile(\stdClass $content);
    
    abstract public function get_post(int $N, string $cursor = NULL, CookiesRequest $cookies = NULL, Proxy $proxy = NULL);

    abstract public function get_followers(\stdClass $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL);
    
    abstract public function get_owner_post_data($post_reference, \stdClass $cookies = NULL, Proxy $proxy = NULL);
    
    public function get_topsearch_profile(\stdClass $cookies = NULL, Proxy $proxy = NULL) {
      try {
        $Profile = NULL;
        $content = ReferenceProfile::get_insta_data_from_client($this->insta_name, $cookies, $proxy);
        $Profile = $this->process_top_search_profile($content);
        return $Profile;
      } catch (\Exception $ex) {
        if ($this->has_logs) {
          print_r($ex->message);
        }
        return NULL;
      }
    }

    public function TurnOn_Logs() {
      $has_logs = TRUE;
    }

    public function TurnOff_Logs() {
      $has_logs = FALSE;
    }

  }

}