<?php

namespace InstaApiWeb {

    require_once config_item('thirdparty-insta_ref_profile-resource');

    use stdClass;
//use InstaApiWeb\InstaApi;
    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\InstaReferenceProfile;
    use InstaApiWeb\Cookies;

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

            $profiles = new InstaProfileList();

            $json_response = $this->get_post($cookies, $N, $cursor, $proxy);
            if (is_object($json_response)) {
                if (isset($json_response->data->hashtag->edge_hashtag_to_media)) {
                    if ($this->has_logs) {
                        echo "Nodes: " . count($json_response->data->hashtag->edge_hashtag_to_media->edges) . " <br>\n";
                    }
                    $page_info = $json_response->data->hashtag->edge_hashtag_to_media->page_info;
                    foreach ($json_response->data->hashtag->edge_hashtag_to_media->edges as $Edge) {
                        $profile = new \stdClass();
                        $profile->node = $this->get_owner_post_data($Edge->node->shortcode, $cookies, $proxy);
                        array_push($profiles->profile_list, $profile);
                    }
                    $error = FALSE;
                } else {
                    throw new Exceptions\EndCursorException("The cursor has ended");
                }
                return $profiles;
            }
            return new \InstaException("unknown exception");
        }

        public function get_post(int $N, string $cursor = NULL, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::HASHTAG), new EnumAction(EnumAction::GET_POST));
                $mngr->setMediaData(/* $this->insta_name */'cuba', $N, $cursor);
                $curl_str = $mngr->make_curl_str($proxy, $cookies);
                var_dump($curl_str);
                exec($curl_str, $output, $status);
                var_dump($output);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        public function get_post_user_info(string $post_reference, Cookies $cookies = NULL, Proxy $proxy = NULL) {
            if ($cookies != NULL) {
                $csrftoken = isset($cookies->csrftoken) ? $cookies->csrftoken : 0;
                $ds_user_id = isset($cookies->ds_user_id) ? $cookies->ds_user_id : 0;
                $sessionid = isset($cookies->sessionid) ? $cookies->sessionid : 0;
                $mid = isset($cookies->mid) ? $cookies->mid : 0;
            }
            $url = "https://www.instagram.com/p/$post_reference/?__a=1";
            $curl_str = "curl $proxy '$url' ";
            $curl_str .= "-H 'Accept-Encoding: gzip, deflate, br' ";
            $curl_str .= "-H 'X-Requested-With: XMLHttpRequest' ";
            $curl_str .= "-H 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4' ";
            $curl_str .= "-H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0' ";
            $curl_str .= "-H 'Accept: */*' ";
            $curl_str .= "-H 'Referer: https://www.instagram.com/' ";
            $curl_str .= "-H 'Authority: www.instagram.com' ";
            if ($cookies != NULL) {
                $curl_str .= "-H 'Cookie: mid=$mid; sessionid=$sessionid; s_network=; ig_pr=1; ig_vw=1855; csrftoken=$csrftoken; ds_user_id=$ds_user_id' ";
            }
            $curl_str .= "--compressed ";
            $result = exec($curl_str, $output, $status);
            $object = json_decode($output[0]);
            if (is_object($object) && isset($object->graphql->shortcode_media->owner)) {
                return $object->graphql->shortcode_media->owner;
            }
            return NULL;
        }

        //end ReferenceProfile
    }

}
