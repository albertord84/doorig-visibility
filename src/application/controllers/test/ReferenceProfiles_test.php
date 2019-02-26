<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\{
    Client,
    StatusProfiles,
    ReferenceProfile,
    Response\Response,
    Response\ResponseReferenceProfiles
};

class ReferenceProfiles_test extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-status_profiles-class');
        require_once config_item('business-reference-profiles-class');
        //        require_once config_item('business-person_profiles-class');
        //        require_once config_item('business-geolocation_profiles-class');
        //        require_once config_item('business-hashtag_profiles-class');
        require_once config_item('business-response-class');
        require_once config_item('business-response-reference-profiles-class');
    }

    public function index() {
        echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
    }

    public function run() {
        //======= REFERENCE-PROFILE =======//
        echo "<h2>Test ReferenceProfile Business</h2>";
        $obj = new ReferenceProfile(1);
        echo "[new] ReferenceProfile_business ==> (<b>ok</b>)<br><br>";

        $obj->load_data(1);
        echo "[load] load() ==> (<b>ok</b>)<br><br>"; //var_dump($obj);

        $client_id = 1;
        $Client = new Client($client_id);
        $status = 1; // ACTIVE
        $type = -1;   // Person Profile
        $Client->load_insta_reference_profiles_data($status, $type);
        $Response = new ResponseReferenceProfiles($Client->ReferenceProfiles);
        $Response->var_dump();
        echo "[get all] get all($status, $type) ==> (<b>ok</b>)<br><br>"; //var_dump($obj);

        $insta_id = '1958546960';
        $instaname = 'alberto_test';
        $type = 1;
        $client_id = 1;
        $Id = ReferenceProfile::save($insta_id, $instaname, $client_id, $type);
        echo "[save] $Id = save($insta_id, $instaname, $client_id, $type) ==> (<b>ok</b>)<br><br>"; //var_dump($obj);

        $type = -1;
        $Client->load_insta_reference_profiles_data($status, $type);
        $Response = new ResponseReferenceProfiles($Client->ReferenceProfiles);
        $Response->var_dump();

        ReferenceProfile::remove($Id);
        echo "[remove] remove($Id) ==> (<b>ok</b>)<br><br>"; //var_dump($obj);

        $Client->load_insta_reference_profiles_data($status, $type);
        $Response = new ResponseReferenceProfiles($Client->ReferenceProfiles);
        $Response->var_dump();
    }

}
