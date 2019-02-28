<?php

namespace InstaApiWeb {



    require_once config_item('thirdparty-insta_ref_profile-resource');
    require_once config_item('thirdparty-followers-response-class');

//use InstaApiWeb\InstaApi;


    use Exception;
    use InstaApiWeb\Cookies;
    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\InstaReferenceProfile;
    use InstaApiWeb\Response\FollowersResponse;
    use function config_item;
    use function GuzzleHttp\json_decode;

    /**
     * Description of GeoProfile
     *
     * @author dumbu
     */
    class InstaGeoProfile extends InstaReferenceProfile {

        //begin ReferenceProfile
        /*  protected function make_curl_str(\stdClass $cookies, int $N, string $cursor = NULL, Proxy $proxy = NULL) {

          } */

        public function __construct(int $insta_id) {
            parent::__construct();
            $this->insta_id = $insta_id;
        }

        public function process_top_prof_data(\stdClass $content) {
            $Profile = NULL;
            if (is_object($content) && $content->status === 'ok') {
                $places = $content->places;
                // Get user with $ref_prof name over all matchs 
                if (is_array($places)) {
                    for ($i = 0; $i < count($places); $i++) {
                        if ($places[$i]->place->slug === $ref_prof) {
                            $Profile = $places[$i]->place;
                            // $Profile->follows = $this->get_insta_ref_prof_follows($ref_prof_id);
                            break;
                        }
                    }
                }
            } else {
                //var_dump($content);
                //var_dump("null reference profile!!!");
            }
            return $Profile;
        }

        public function get_insta_followers(Cookies $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL) {
            $json_response = $this->get_post($N, $cursor, $cookies, $proxy);
            $profiles = array();
            if (is_object($json_response)) {
                if (isset($json_response->status) && $json_response->status == 'ok' && isset($json_response->data->location->edge_location_to_media)) {
                    $page_info = $json_response->data->location->edge_location_to_media->page_info;

                    if ($this->has_logs) {
                        echo "Nodes: " . count($json_response->data->location->edge_location_to_media->edges) . " <br>\n";
                    }

                    foreach ($json_response->data->location->edge_location_to_media->edges as $Edge) {
                        $profile = $this->get_post_user_info($Edge->node->shortcode, $cookies, $proxy);
                        array_push($profiles, $profile);
                    }

                    return new FollowersResponse($profiles, $page_info->end_cursor, $page_info->has_next_page, 0, 'ok');
                }
                $message = isset($json_response->message) ? $json_response->message :
                        "Fail get insta followers for geo profile $this->insta_id. Unkown Reason";
                return new FollowersResponse(array(), '', false, 1, $message);
            }

            throw new \InstaException("unknown exception response: $json_response");
        }

        /**
         * 
         * @param int $N
         * @param string $cursor
         * @param \stdClass $cookies
         * @param Proxy $proxy
         */
        public function get_post(int $N, string $cursor = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::GEO), new EnumAction(EnumAction::GET_POST));
                $mngr->setMediaData($this->insta_id, $N, $cursor);
                $curl_str = $mngr->make_curl_str($proxy, $cookies);
                var_dump($curl_str);
                exec($curl_str, $output, $status);
                var_dump($output);
                return json_decode($output[0]);
            } catch (Exception $e) {
                var_dump($e);
            }

            /*
              $variables = "{\"id\":\"$this->insta_id\",\"first\":$N";
              if ($cursor != NULL && $cursor != "NULL") {
              $variables .= ",\"after\":\"$cursor\"";
              }
              $variables .= "}";

              $api = new InstaApi();
              $curl_str = $api->make_query($this->tag_query, $variables, $cookies, $proxy);
              if ($curl_str === NULL)
              return NULL;
              exec($curl_str, $output, $status);
              if (count($output) > 0 && isset($output[0])) {
              $json = json_decode($output[0]);
              if (isset($json->data->location->edge_location_to_media) && isset($json->data->location->edge_location_to_media->page_info)) {
              $cursor = $json->data->location->edge_location_to_media->page_info->end_cursor;
              if (count($json->data->location->edge_location_to_media->edges) == 0) {
              if ($this->has_logs) {
              echo ("<br>\n No nodes!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
              }
              $cursor = NULL;
              }
              } else if (isset($json->data) && $json->data->location == NULL) {
              //var_dump($output);
              if ($this->has_logs) {
              print_r($curl_str);
              }
              $cursor = NULL;
              } else if ($this->has_logs) {
              var_dump($output);
              print_r($curl_str);
              echo ("<br>\n Untrated error!!!");
              }
              return $json;
              } else if ($this->has_logs) {
              var_dump($output);
              print_r($curl_str);
              }
              return NULL;
              } catch (\Exception $exc) {
              if ($this->has_logs)
              echo $exc->getTraceAsString();
              } */
        }

        public function get_post_user_info(string $post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::GEO), new EnumAction(EnumAction::GET_OWNER_POST_DATA));
            $mngr->setReferencePost($post_reference);
            $mngr->setInstaId($this->insta_id);
            $curl_str = $mngr->make_curl_str($proxy, $cookies);
            var_dump($curl_str);
            $result = exec($curl_str, $output, $status);
            $object = json_decode($output[0]);

            if (is_object($object) && isset($object->graphql->shortcode_media->owner)) {
                $node = $object->graphql->shortcode_media->owner;
                $profile = new InstaProfile();
                $profile->insta_name = $node->username;
                $profile->insta_id = $node->id;
                $profile->image_url = $node->profile_pic_url;
                $profile->instaProfileData->is_private = $node->is_private;
                return $profile;
            }
            return NULL;
        }

        //end ReferenceProfile
    }

}