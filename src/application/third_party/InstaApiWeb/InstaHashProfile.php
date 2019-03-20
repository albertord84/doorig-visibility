<?php

namespace InstaApiWeb {

    require_once config_item('thirdparty-insta_ref_profile-resource');
    require_once config_item('thirdparty-insta_profile-resource');
    require_once config_item('thirdparty-followers-response-class');

//use InstaApiWeb\InstaApi;


    use Exception;
    use InstaApiWeb\Cookies;
    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\InstaReferenceProfile;
    use InstaApiWeb\Response\FollowersResponse;
    use function GuzzleHttp\json_decode;

    /**
     * Description of HashProfile
     *
     * @author dumbu
     */
    class InstaHashProfile extends InstaReferenceProfile {

        //begin ReferenceProfile
        /* protected function make_curl_str(\stdClass $cookies, int $N, string $cursor = NULL, Proxy $proxy = NULL) {

          } */
        public function __construct(string $insta_name) {
            parent::__construct();
            $this->insta_name = $insta_name;
        }

        public function process_top_prof_data(\stdClass $content) {
            $Profile = NULL;
            if (is_object($content) && $content->status === 'ok') {
                $tags = $content->hashtags;
                // Get user with $ref_prof name over all matchs 
                if (is_array($tags)) {
                    for ($i = 0; $i < count($tags); $i++) {
                        if ($tags[$i]->hashtag->name === $ref_prof) {
                            $Profile = $tags[$i]->hashtag;
                            //if ($ref_prof != NULL) {
                            // $Profile->follows = $this->get_insta_ref_prof_follows($ref_prof_id);
                            //}
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
            $N = $N/3 + 1;   // 
            $profiles = array();
            $json_response = $this->get_post($N, $cursor, $cookies, $proxy);

            if (is_object($json_response)) {

                if (isset($json_response->status) && $json_response->status == 'ok' && isset($json_response->data->hashtag->edge_hashtag_to_media)) {
                    $page_info = $json_response->data->hashtag->edge_hashtag_to_media->page_info;

                    if ($this->has_logs) {
                        echo "Nodes: " . count($json_response->data->hashtag->edge_hashtag_to_media->edges) . " <br>\n";
                    }

                    foreach ($json_response->data->hashtag->edge_hashtag_to_media->edges as $Edge) {
                        $profile = $this->get_post_user_info($Edge->node->shortcode, $cookies, $proxy);
                        array_push($profiles, $profile);
                    }

                    return new FollowersResponse($profiles, $page_info->end_cursor, $page_info->has_next_page, 0, 'ok');
                }
                $message = isset($json_response->message) ? $json_response->message :
                        "Fail get insta followers for geo profile $this->insta_id. Unkown Reason";
                return new FollowersResponse(array(), '', false, 1, $message);
            }

            throw new \InstaException("unknown exception response $json_response");
        }

        public function get_post(int $N, string $cursor = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::HASHTAG), new EnumAction(EnumAction::GET_POST));
                $mngr->setMediaData(/* $this->insta_name */'cuba', $N, $cursor);
                $curl_str = $mngr->make_curl_str($proxy, $cookies);
                exec($curl_str, $output, $status);
                return json_decode($output[0]);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        public function get_post_user_info(string $post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::HASHTAG), new EnumAction(EnumAction::GET_OWNER_POST_DATA));
            $mngr->setReferencePost($post_reference);
            //$mngr->setInstaId($this->insta_id);
            $curl_str = $mngr->make_curl_str($proxy, $cookies);
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
