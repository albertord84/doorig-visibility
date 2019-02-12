<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once config_item('reference-profile_libraries');

use InstaApiWeb\Proxy;
use InstaApiWeb\ProfileType;
use InstaApiWeb\InstaPersonProfile;

/**
 * @category CodeIgniter-Library: X
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */
class InstaPersonProfile_lib extends InstaReferenceProfile_lib {

    public function __construct($params) {
        parent::__construct();
        require_once config_item('thirdparty-insta_person_profile-resource');
        if (!array_key_exists("insta_id", $params)) {
            throw new Exception("The params insta_id was not found");
        }
        $insta_id = $params["insta_id"];
        $this->ReferenceProfile = new InstaPersonProfile($insta_id);
    }

    public function get_insta_following_count() {

        $this->PersonProfile->get_insta_following_count();
    }

    public function get_reference_data(CookiesRequest $cookies, string $referense_name) {

        $this->PersonProfile->get_reference_data($cookies, $referense_name);
    }

    public function exists_profile(string $profile_name, ProfileType $type, string $insta_id = NULL, CookiesRequest $cookies = NULL, Proxy $proxy = NULL) {

        $this->PersonProfile->exists_profile($profile_name, $type, $insta_id, $cookies, $proxy);
    }

    public function make_curl_following_str(CookiesRequest $cookies, int $N, string $cursor = NULL, Proxy $proxy = NULL) {

        $this->PersonProfile->make_curl_following_str($cookies, $N, $cursor, $proxy);
    }

    public function parse_follow_count($follow_count_str) {

        $this->PersonProfile->parse_follow_count($follow_count_str);
    }

    // Funcion temporal para comprobar que se cargo la lib.
    public function Msg() {
        echo __CLASS__ . "->" . __FUNCTION__ . "() invocado (<b>ok</b>)";
    }

}
