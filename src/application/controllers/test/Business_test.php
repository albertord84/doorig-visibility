<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

use business\Proxy;
use business\Client;
use business\StatusProfiles;

class Business_test extends CI_Controller {

  public function __construct() {
    parent::__construct();

    require_once config_item('business-proxy-class');
    require_once config_item('business-client-class');
    require_once config_item('business-status_profiles-class');
  }

  public function index() {
    echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
  }

  public function run() {
    //======= CLIENT =======//
    echo "<pre>";
    echo "<h2>Test Client Business</h2>";
    $obj = new Client(1);
    echo "[new] Client_business ==> (<b>ok</b>)<br>";

    $array = $obj->get_clients(); 
    echo "[get] get_clients() => result: " . count($array) . " ==> (<b>ok</b>)<br>"; //var_dump($array);

    $array = $obj->load_data(); //var_dump($obj); echo "<h1>$obj->Id</h1>";
    echo "[get] load_data() => result: " . count($array) . " ==> (<b>ok</b>)<br>";
     
    $array = $obj->get_reference_profiles(); //var_dump($array);
    echo "[get] get_reference_profiles() => result: ".count($array) . " ==> (<b>ok</b>)<br>";

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
    /*echo "<h2>Test ReferenceProfile Business</h2>";
    $obj = new ReferenceProfile();
    echo "[new] ReferenceProfile_business ==> (<b>ok</b>)<br>";
    
    $obj->load_data(1);
    echo "[load] load() ==> (<b>ok</b>)"; var_dump($obj);*/
    
    //======= STATUS-PROFILE =======//
    echo "<h2>Test StatusProfiles Business</h2>";
    $obj = new StatusProfiles();
    echo "[new] StatusProfiles_business ==> (<b>ok</b>)";

    
    //echo "<h2>"; print_r(memory_get_usage()); echo '<br>'; echo "</h2>";
  }

}
