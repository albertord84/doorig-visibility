<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\{
    Client,
    StatusProfiles,
    ReferenceProfile
};

class Client_test extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-status_profiles-class');
        require_once config_item('business-reference-profiles-class');
    }

    public function index() {
        echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
    }

    public function run() {
        //======= CLIENT =======//
        echo "<pre>";
        echo "<h2>Test Client Business</h2>";
        $obj = new Client(1); //var_dump($obj);
        echo "[new] Client_business ==> (<b>ok</b>)<br>";
        
        echo "<pre>";
        echo "<h2>Test Insta Curl Info Business</h2>";
        $obj->load_daily_report_data(); var_dump($obj); die();
        echo "[load] Client Reference Profiles Business ==> (<b>ok</b>)<br>";
        
        echo "<pre>";
        echo "<h2>Test Insta Curl Info Business</h2>";
        $obj->load_insta_data(); //var_dump($obj);
        echo "[load] Client Reference Profiles Business ==> (<b>ok</b>)<br>";
        
        echo "<pre>";
        echo "<h2>Test Client Reference Profiles Business (status ACTIVE) </h2>";
        $status_id = 1; // ACTIVE;
        $obj->load_insta_reference_profiles_data($status_id); var_dump($obj);
        echo "[load] Client Reference Profiles Business ==> (<b>ok</b>)<br>";
        
        //$obj->ReferenceProfiles->remove_reference_profile(24306);
        //$obj->load_insta_reference_profiles_data(1); var_dump($obj);
        echo "[remove] Client Reference Profiles Business ==> (<b>ok</b>)<br>";
        

//    $array = $obj->get_clients(); 
//    echo "[get] get_clients() => result: " . count($array) . " ==> (<b>ok</b>)<br>"; //var_dump($array);
//
//    $array = $obj->load_data(); //var_dump($obj); echo "<h1>$obj->Id</h1>";
//    echo "[get] load_data() => result: " . count($array) . " ==> (<b>ok</b>)<br>";
//     
//    $array = $obj->get_reference_profiles(); //var_dump($array);
//    echo "[get] get_reference_profiles() => result: ".count($array) . " ==> (<b>ok</b>)<br>";
//
//    $obj->update_client_cookies('{"json_response":{"status":"ok","authenticated":true,"user":"ohhhYESSSS"}'); 
//    echo "[update] update_client_cookies() ==> (<b>ok</b>)<br>";
//    
//    $obj->update_client_status(1); 
//    echo "[update] update_client_status() ==> (<b>ok</b>)<br>";
//   
    //======= REFERENCE-PROFILE =======//
//    echo "<h2>Test ReferenceProfile Business</h2>";
//    $obj = new ReferenceProfile();
//    echo "[new] ReferenceProfile_business ==> (<b>ok</b>)<br>";
//    
//    $obj->load_data(1);
//    echo "[load] load() ==> (<b>ok</b>)"; //var_dump($obj);
//    
//    //======= STATUS-PROFILE =======//
//    echo "<h2>Test StatusProfiles Business</h2>";
//    $obj = new StatusProfiles();
//    echo "[new] StatusProfiles_business ==> (<b>ok</b>)";
        //echo "<h2>"; print_r(memory_get_usage()); echo '<br>'; echo "</h2>";
    }

}
