<?php

namespace InstaApiWeb {


    require_once config_item('thirdparty-insta_ref_profile-resource');
    require_once config_item('thirdparty-insta_profile-resource');
    require_once config_item('thirdparty-followers-response-class');
    require_once config_item('insta-exception-class');

    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\InstaReferenceProfile;
    use InstaApiWeb\Response\FollowersResponse;
    use InstaApiWeb\InstaProfile;
    use InstaApiWeb\Exceptions\InstaException;

    /**
     * Description of PersonProfile
     *
     * @author dumbu
     */
    class InstaPersonProfile extends InstaReferenceProfile {

        //put your code here
        //begin ReferenceProfile
        /* protected function make_curl_str(\stdClass $cookies, int $N, string $cursor = NULL, Proxy $proxy = NULL) {

          } */
        public function __construct(int $insta_id) {
            parent::__construct();
            $this->insta_id = $insta_id;
        }

        public function process_top_prof_data(\stdClass $content) {
            $Profile = NULL;
            if (is_object($content) && $content->status === 'ok') {
                $users = $content->users;
                // Get user with $ref_prof name over all matchs 
                if (is_array($users)) {
                    for ($i = 0; $i < count($users); $i++) {
                        if ($users[$i]->user->username === $ref_prof) {
                            $Profile = $users[$i]->user;
                            //var_dump($Profile);
                            //  $Profile->follows = $this->get_insta_ref_prof_follows($ref_prof_id);
                            $Profile->following = $this->get_insta_following_count($ref_prof);
                            if (!isset($Profile->follower_count)) {
                                $Profile->follower_count = isset($Profile->byline) ? $this->parse_follow_count($Profile->byline) : 0;
                            }
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

            $profiles = array();
            $json_response = $this->get_insta_followers_list($cookies, $N, $cursor, $proxy);
            if (is_object($json_response)) {
                if (isset($json_response->status) && $json_response->status == 'ok' && isset($json_response->data->user->edge_followed_by)) {

                    $page_info = $json_response->data->user->edge_followed_by->page_info;
                    if ($this->has_logs) {
                        echo "Nodes: " . count($json_response->data->user->edge_followed_by->edges) . " <br>\n";
                    }

                    foreach ($json_response->data->user->edge_followed_by->edges as $node) {
                        array_push($profiles, $this->build_full_insta_profile($node->node, $cookies, $proxy));
                    }

                    return new FollowersResponse($profiles, $page_info->end_cursor, $page_info->has_next_page, 0, 'ok');
                }
                $message = isset($json_response->message) ? $json_response->message :
                        "Fail get insta followers for geo profile $this->insta_id. Unkown Reason";
                return new FollowersResponse(array(), '', false, 1, $message);
            }else{
                // JOSE REVISAR!!!!
                throw new \InstaException("unknown exception response" . \GuzzleHttp\json_encode($json_response),-1);
            }
        }

        public function get_insta_followers_list(Cookies $cookies = NULL, int $N = 15, string& $cursor = NULL, Proxy $proxy = NULL) {
            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::PERSON), new EnumAction(EnumAction::GET_FOLLOWERS));
                $mngr->setMediaData($this->insta_id, $N, $cursor);
                $curl_str = $mngr->make_curl_str($proxy, $cookies);
                exec($curl_str, $output, $status);
                return json_decode($output[0]);
            } catch (\Exception $e) {
                var_dump($e);
            }
        }

        private function build_full_insta_profile($node, Cookies $Cookies = NULL, Proxy $Proxy = NULL) {
            $InstaProfile = new InstaProfile();
            $InstaProfile->insta_id = $node->id;
            $InstaProfile->insta_name = $node->username;
            $InstaProfile->image_url = $node->profile_pic_url;
            $profile_data = InstaProfile::get_user_data($node->username, $Cookies, $Proxy);
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

        public function get_post(int $N, string $cursor = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            
        }

        public function get_post_user_info(string $post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            
        }

        public function make_curl_following_str(Cookies $cookies, int $N, string $cursor = NULL, Proxy $proxy = NULL) {
            
        }

        public function parse_follow_count($follow_count_str) {
            
        }

        public function get_insta_following_count() {
            
        }

        public function get_reference_data(Cookies $cookies, string $referense_name) {
            
        }

        public function exists_profile(string $profile_name, ProfileType $type, string $insta_id = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            
        }

    }

}
