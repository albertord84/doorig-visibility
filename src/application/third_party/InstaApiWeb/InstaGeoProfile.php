<?php

namespace InstaApiWeb {

    require_once config_item('thirdparty-insta_profile-resource');
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
                        //$profile = $this->build_full_insta_profile($Edge->node->owner, $cookies, $proxy);
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
                exec($curl_str, $output, $status);
                return json_decode($output[0]);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        public function get_post_user_info(string $post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::GEO), new EnumAction(EnumAction::GET_OWNER_POST_DATA));
            $mngr->setReferencePost($post_reference);
            $mngr->setInstaId($this->insta_id);
            $curl_str = $mngr->make_curl_str($proxy, $cookies);
            $result = exec($curl_str, $output, $status);
            $object = json_decode($output[0]);

            if (is_object($object) && isset($object->graphql->shortcode_media->owner)) {
                $node = $object->graphql->shortcode_media->owner;
                $profile = new InstaProfile();
                $profile->insta_name = $node->username;
                $profile->insta_id = $node->id;
                $profile->image_url = $node->profile_pic_url;
                $profile->instaProfileData->blocked_by_viewer = $node->blocked_by_viewer;
                $profile->instaProfileData->followed_by_viewer = $node->followed_by_viewer;
                $profile->instaProfileData->requested_by_viewer = $node->requested_by_viewer;
                $profile->instaProfileData->has_blocked_viewer = $node->has_blocked_viewer;
                $profile->instaProfileData->is_verified = $node->is_verified;
                $profile->instaProfileData->is_unpublished = $node->is_unpublished;
                return $profile;
            }
            return NULL;
        }

        private function build_full_insta_profile($owner, Cookies $Cookies = NULL, Proxy $Proxy = NULL) {
            $InstaProfile = new InstaProfile();
            $InstaProfile->insta_id = $owner->id;
            //$InstaProfile->insta_name = $owner->username;
            //$InstaProfile->image_url = $owner->profile_pic_url;
            $profile_data = InstaProfile::get_user_data($owner->username, $Cookies, $Proxy);
            $InstaProfile->instaProfileData = new \stdClass();
            $user = $profile_data->graphql->user;
            if (isset($user->is_private)) {
                $InstaProfile->instaProfileData->is_private = $user->is_private;
            }
            if (isset($user->edge_owner_to_timeline_media->count)) {
                $InstaProfile->instaProfileData->posts_count = $user->edge_owner_to_timeline_media->count;
            }
            if (isset($user->edge_followed_by->count)) {
                $InstaProfile->follows = $user->edge_followed_by->count;
            }
            if (isset($user->edge_follow->count)) {
                $InstaProfile->following = $user->edge_follow->count;
            }
            return $InstaProfile;
        }

//end ReferenceProfile
    }

}