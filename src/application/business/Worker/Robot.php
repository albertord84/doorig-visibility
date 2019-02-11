<?php

namespace business\worker {
  
  use business\Business; 
 
  require_once config_item('business-class');  

  
   /**
   * @category Business class
   * 
   * @access public
   *
   * @todo Define an Robot worker class.
   * 
   */
    
    class Robot extends Business{

        public function __construct() {
          $ci = &get_instance();
      
          $ci->load->model('db_model');
          //$ci->load->library("InstaApiWeb/InstaApi_lib", null, 'InstaApi_lib');
            
        /*  $config = parse_ini_file(dirname(__FILE__) . $conf_file, true);
            $this->IPS = $config["IPS"];
            $this->Day_client_work = new Day_client_work();
            $this->Ref_profile = new Reference_profile();*/
        }

        public function do_follow_work (\InstaReferenceProfile_lib $profile)
        {
             echo "[exec] get_insta_followers() ==> ";
             $cookies = json_decode('{"json_response":{"authenticated":true,"user":true,"status":"ok"},"csrftoken":"kToHKxaPB4iPuVY7t2XzQdi3GeyxrI7D","sessionid":"5453435354%3AVg6DjXraZlISez%3A15","ds_user_id":"5453435354","mid":"W-SbgAAEAAGuwWxQcdNcdZ0xa8Mi"}');
            
              $profile->get_insta_media(15,NULL,$cookies);
             echo "(<b>ok</b>)<br>";
        }

        public function do_unfollow_work ()
        {
            //está comentada en el antiguo fichero 
        }

        public function process_error($json_response) {
            
        }

<<<<<<< HEAD
=======
        public function get_profiles_to_follow(DayliWork $daily_work, ErrorType &$error = NULL, &$page_info) {
            $ci = &get_instance();
            $Profiles = array();
            $error = TRUE;
            $login_data = json_decode($daily_work->cookies);
            $quantity = min(array($daily_work->to_follow, $GLOBALS['sistem_config']->REQUESTS_AT_SAME_TIME));
            $page_info = new \stdClass();
            $Client = (new \follows\cls\Client())->get_client($daily_work->client_id);
            $proxy = $this->get_proxy_str($Client);
            if ($daily_work->rp_type == 0) {
                echo "<br>\nRef Profil: $daily_work->insta_name<br>\n";
                $json_response = $this->get_followers(
                        $login_data, $daily_work->rp_insta_id, $quantity, $daily_work->insta_follower_cursor, $proxy
                );
                //var_dump($json_response);
                if ($json_response === NULL) {
                    var_dump("<br>\n Empty response getting followers from this profile... <br>\n");
                    $json_response = $this->process_get_followers_error($daily_work, $Client, $quantity, $proxy);
                }
                if (is_object($json_response) && $json_response->status == 'ok') {
                    if (isset($json_response->data->user->edge_followed_by)) { // if response is ok
                        echo "Nodes: " . count($json_response->data->user->edge_followed_by->edges) . " <br>\n";
                        $page_info = $json_response->data->user->edge_followed_by->page_info;
                        $Profiles = $json_response->data->user->edge_followed_by->edges;
                        //$DB = new DB();
                        if ($page_info->has_next_page === FALSE && $page_info->end_cursor != NULL) { // Solo qdo es <> de null es que llego al final
                            $ci->db_model->update_reference_cursor($daily_work->reference_id, NULL);
                            echo ("<br>\n Updated Reference Cursor to NULL!!");
                            $result = $ci->db_model->delete_daily_work($daily_work->reference_id);
                            if ($result) {
                                echo ("<br>\n Deleted Daily work!! Ref $daily_work->reference_id");
                            }
                        } else if ($page_info->has_next_page === FALSE && $page_info->end_cursor === NULL) {
//                            $Client = new Client();
//                            $Client = $Client->get_client($daily_work->user_id);
//                            $login_result = $Client->sign_in($Client);
                            $ci->db_model->update_reference_cursor($daily_work->reference_id, NULL);
                            echo ("<br>\n Updated Reference Cursor to NULL!!");
                            $result = $ci->db_model->delete_daily_work($daily_work->reference_id);
                            if ($result) {
                                echo ("<br>\n Deleted Daily work!! Ref $daily_work->reference_id");
                            }
                        }
                        $error = FALSE;
                    } else {
                        $page_info->end_cursor = NULL;
                        $page_info->has_next_page = false;
                    }
                }
            } else if ($daily_work->rp_type == 1) {
                $json_response = $this->get_insta_geomedia($login_data, $daily_work->rp_insta_id, $quantity, $daily_work->insta_follower_cursor, $proxy);
                if (is_object($json_response) && $json_response->status == 'ok') {
                    if (isset($json_response->data->location->edge_location_to_media)) { // if response is ok
                        echo "Nodes: " . count($json_response->data->location->edge_location_to_media->edges) . " <br>\n";
                        $page_info = $json_response->data->location->edge_location_to_media->page_info;
                        foreach ($json_response->data->location->edge_location_to_media->edges as $Edge) {
                            $profile = new \stdClass();
                            $profile->node = $this->get_geo_post_user_info($login_data, $daily_work->rp_insta_id, $Edge->node->shortcode, $proxy);
                            array_push($Profiles, $profile);
                        }
                        $error = FALSE;
                    } else {
                        $page_info->end_cursor = NULL;
                        $page_info->has_next_page = false;
                    }
                }
            } else if ($daily_work->rp_type == 2) {
                $json_response = $this->get_insta_tagmedia($login_data, $daily_work->insta_name, $quantity, $daily_work->insta_follower_cursor, $proxy);
                if (is_object($json_response)) {
                    if (isset($json_response->data->hashtag->edge_hashtag_to_media)) { // if response is ok
                        echo "Nodes: " . count($json_response->data->hashtag->edge_hashtag_to_media->edges) . " <br>\n";
                        $page_info = $json_response->data->hashtag->edge_hashtag_to_media->page_info;
                        foreach ($json_response->data->hashtag->edge_hashtag_to_media->edges as $Edge) {
                            $profile = new \stdClass();
                            $profile->node = $this->get_tag_post_user_info($login_data, $Edge->node->shortcode, $proxy);
                            array_push($Profiles, $profile);
                        }
                        $error = FALSE;
                    } else {
                        $page_info->end_cursor = NULL;
                        $page_info->has_next_page = false;
                    }
                }
            }
            if ($error) {
                $error = $this->process_follow_error($json_response);
            }
            return $Profiles;
        }
>>>>>>> 779ec2dc6af91589e0777d18dc193d380529ae9c

        public function process_get_insta_ref_prof_data_for_daily_report($content, \BusinessRefProfile $ref_prof) {
           
        }

        public function set_client_cookies_by_curl(int $client_id, string $curl, int $robot_id = NULL) {
            
        }

        public function temporal_log($data)  {
            
        }

       public function process_get_followers_error(DailyWork $daily_work, \business\cls\Client $client, int $quantity, Proxy $proxy) {
<<<<<<< HEAD
           
=======
            $ci = &get_instance();
            $result = $this->RecognizeClientStatus($client);
            if (isset($result->json_response->authenticated) && $result->json_response->authenticated) {
                //retry of graph request
                $json_response = $this->get_followers($result, $daily_work->rp_insta_id, $quantity, $daily_work->insta_follower_cursor, $proxy);
                if ($json_response === NULL) {
                    $ci->db_model->update_reference_cursor($daily_work->reference_id, NULL);
                    $ci->db_model->delete_daily_work($daily_work->reference_id);
                    $ci->db_model->insert_event_to_washdog($client_id, washdog_type::ERROR_IN_PR, 1, $this->id, "unexistence reference profile or may be the reference profile is block ing the client");
                } else if (isset($json_response->status) && $json_response->status == 'ok') {
                    return $json_response;
                }
                return NULL;
            } else if ($result->json_response->message == 'checkpoint_required' || $result->json_response->message == 'incorrect_password') {
                //unautorized, bloc by password or an api unrecognized error
                $msg = $result->json_response->message;
                var_dump("daily work deleted for client ($daily_work->client_id) because $msg\n");
                $ci->db_model->delete_daily_work_client($daily_work->client_id);
            }
>>>>>>> 779ec2dc6af91589e0777d18dc193d380529ae9c
        }
    }
}