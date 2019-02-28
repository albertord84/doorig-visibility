<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\Client;
use business\InstaCommands;
use business\Proxy;
use business\ReferenceProfile;
use business\StatusProfiles;

class Business_test extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-proxy-class');
        require_once config_item('business-client-class');
        require_once config_item('business-status_profiles-class');
        require_once config_item('business-reference-profiles-class');
        require_once config_item('business-insta_commands-class');
    }

    public function index() {
        echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
    }

    public function run() {
        //======= INSTA-COMMANDS =======//
        echo "<h2>Test get_profile_public_data </h2>";
        //$profile_name = "ma.ietto";
            $profile_name = "leticiajural";
        //    $profile_name = "carinamacedosoaresoficial";
        $obj = InstaCommands::get_profile_public_data($profile_name);
        var_dump($obj);
        //var_dump(json_encode(object_to_array($obj)));
        echo "[get] StatusProfiles_business ==> (<b>ok</b>)";

        //======= CLIENT =======//
        echo "<pre>";
        echo "<h2>Test Client Business</h2>";
        $obj = new Client(1);
        echo "[new] Client_business ==> (<b>ok</b>)<br>";

        //$array = $obj->get_clients(); 
        //echo "[get] get_clients() => result: " . count($array) . " ==> (<b>ok</b>)<br>"; //var_dump($array);

        $array = $obj->load_data(); //var_dump($obj); echo "<h1>$obj->Id</h1>";
        echo "[get] load_data() => result: " . count($array) . " ==> (<b>ok</b>)<br>";

        $array = $obj->load_insta_reference_profiles_data(1, 2); //var_dump($array);
        echo "[get] get_reference_profiles() => result: " . count($array) . " ==> (<b>ok</b>)<br>";

        //var_dump($obj);
        //var_dump(json_encode(object_to_array($obj)));
        //var_dump(json_decode(json_encode(object_to_array($obj)), true));
        die;

        $obj->update_client_cookies('{"json_response":{"status":"ok","authenticated":true,"user":"ohhhYESSSS"}');
        echo "[update] update_client_cookies() ==> (<b>ok</b>)<br>";

        $obj->update_client_status(1);
        echo "[update] update_client_status() ==> (<b>ok</b>)<br>";

        //======= PROXY =======//
        echo "<h2>Test Proxy Business</h2>";
        $obj = new Proxy();
        echo "[new] Proxy_business ==> (<b>ok</b>)<br>";

        $obj->load_data(1);
        echo "[load] load() ==> (<b>ok</b>)"; //var_dump($obj);
        //======= REFERENCE-PROFILE =======//
        echo "<h2>Test ReferenceProfile Business</h2>";
        $obj = new ReferenceProfile();
        echo "[new] ReferenceProfile_business ==> (<b>ok</b>)<br>";

        $obj->load_data(1);
        echo "[load] load() ==> (<b>ok</b>)"; //var_dump($obj);
        //======= STATUS-PROFILE =======//
        echo "<h2>Test StatusProfiles Business</h2>";
        $obj = new StatusProfiles();
        echo "[new] StatusProfiles_business ==> (<b>ok</b>)";

        //echo "<h2>"; print_r(memory_get_usage()); echo '<br>'; echo "</h2>";
    }

}
