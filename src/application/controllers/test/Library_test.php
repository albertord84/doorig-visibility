<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use business\Client;
use InstaApiWeb\Cookies;

class Library_test extends CI_Controller {

  public function __construct() {
    parent::__construct();

    require_once config_item('db-exception-class');
    //require_once config_item('business-client-class');
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-insta_profile-resource');
  }

  public function index() {
    echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
  }

  public function client() {
    echo "Dentro de client controller";

    $obj = new Client();

    echo "<br><br>Ok";
  }

  public function load() {
    //$params = array('username'  => 'isela');

    $count = 0;
    echo "<h3><u>Test de carga de librerias</u></h3>";

    // -OK-
    echo "<pre>";
    echo "[load] GeoProfile_lib ==> ";
    //$this->load->library("InstaApiWeb/InstaGeoProfile_lib", null, 'GeoProfile_lib');
    echo "(<b>ok</b>)";
    $count++;

    // -OK-
    echo "<br>[load] HashProfile_lib ==> ";
    //$this->load->library("InstaApiWeb/InstaHashProfile_lib", null, 'HashProfile_lib');
    echo "(<b>ok</b>)";
    $count++;

    // -OK-
    echo "<br>[load] PersonProfile_lib ==> ";
    //$this->load->library("InstaApiWeb/InstaPersonProfile_lib", null, 'PersonProfile_lib');
    echo "(<b>ok</b>)";
    $count++;
    
    // -OK-
 /* echo "<br>[load] InstaApi_lib ==> ";
    $this->load->library("InstaApiWeb/InstaApi_lib", null, 'InstaApi_lib');
    //$this->load->library("InstaApiWeb/InstaApi_lib", $params, 'InstaApi_lib');
    echo "(<b>ok</b>)";
    $count++;
  */

    // -OK-
    echo "<br>[load] InstaClient_lib ==> ";
    $this->load->library("InstaApiWeb/InstaClient_lib", null, 'InstaClient_lib');
    echo "(<b>ok</b>)";
    $count++;

    // -OK-
    //echo "<br>[load] InstaProfileList_lib ==> ";
    //$this->load->library("InstaApiWeb/InstaProfileList", null, 'InstaProfileList_lib');
    //echo "(<b>ok</b>)";
    //$count++;

    // -OK-
    echo "<br>[load] InstaProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaProfile_lib", null, 'InstaProfile_lib');
    echo "(<b>ok</b>)";
    $count++;

    // -OK-
    //echo "<br>[load] Proxy_lib ==> ";
    //$this->load->library("InstaApiWeb/Proxy_lib", null, 'Proxy_lib');
    //echo "(<b>ok</b>)";
    //$count++;

    // -OK-
    //echo "<br>[load] Media_lib ==> ";
    //$this->load->library("InstaApiWeb/Media_lib", null, 'Media_lib');
    //echo "(<b>ok</b>)";
    //$count++;

    echo "<br><br>total: " . $count . " libs";
    echo "</pre>";
  }

  public function run ()
  {
    //======= GEO_PROFILE-LIB =======//
   /* echo "<pre>";
    echo "<h2>Test GeoProfile Library</h2>";
    echo "[load] GeoProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaGeoProfile_lib", null, 'GeoProfile_lib');
    echo "(<b>ok</b>)<br>";
    
    echo "[exec] process_insta_prof_data() ==> ";
    $this->GeoProfile_lib->process_insta_prof_data(new \stdClass());
    echo "[exec] process_top_search_profile() ==> ";
    $this->GeoProfile_lib->process_top_search_profile(new \stdClass());
    echo "(<b>ok</b>)<br>";
   
    echo "[exec] get_followers() ==> ";
    //$this->GeoProfile_lib->get_followers();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_post() ==> ";
    //$this->GeoProfile_lib->get_post();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_owner_post_data() ==> ";
    //$this->GeoProfile_lib->get_owner_post_data();
    //echo "(<b>ok</b>)<br>";
    
    //======= HASH_PROFILE-LIB =======//
    echo "<h2>Test HashProfile Library</h2>";
    echo "[load] HashProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaHashProfile_lib", null, 'HashProfile_lib');
    echo "(<b>ok</b>)<br>";
    
    echo "[exec] process_top_search_profile() ==> ";
    //$this->HashProfile_lib->process_top_search_profile();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_followers() ==> ";
    //$this->HashProfile_lib->get_followers();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_post() ==> ";
    //$this->HashProfile_lib->get_post();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_owner_post_data() ==> ";
    //$this->HashProfile_lib->get_owner_post_data();
    //echo "(<b>ok</b>)<br>";
    
    //======= PERSON_PROFILE-LIB =======//
    echo "<h2>Test PersonProfile Library</h2>";
    echo "[load] HashProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaPersonProfile_lib", null, 'PersonProfile_lib');
    echo "(<b>ok</b>)<br>";
        
    echo "[exec] get_followers() ==> ";
    //$this->PersonProfile_lib->get_followers();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_followers_list() ==> ";
    //$this->PersonProfile_lib->get_followers_list();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_post() ==> ";
    //$this->PersonProfile_lib->get_post();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_owner_post_data() ==> ";
    //$this->PersonProfile_lib->get_owner_post_data();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_insta_following_count() ==> ";
    //$this->PersonProfile_lib->get_insta_following_count();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_reference_data() ==> ";
    //$this->PersonProfile_lib->get_reference_data();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] process_top_search_profile() ==> ";
    //$this->PersonProfile_lib->process_top_search_profile();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] make_curl_following_str() ==> ";
    //$this->PersonProfile_lib->make_curl_following_str();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] parse_follow_count() ==> ";
    //$this->PersonProfile_lib->parse_follow_count();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] exists_profile() ==> ";
    //$this->PersonProfile_lib->exists_profile();
    //echo "(<b>ok</b>)<br>";
   */    
    //======= INSTA_API_CLIENT-LIB =======//
    echo "<h2>Test InstaApiClient Library</h2>";
    echo "[load] InstaClient_lib ==> ";
    $cookies =  new stdClass();
    $cookies->sessionid = "3445996566%3AUdrflm2b4CXrbl%3A15";
    $cookies->csrftoken = "7jSEZvsYWGzZQUx5zlR8I3MmvPATX1X0";
    $cookies->ds_user_id = "3445996566";
    $cookies->mid = "XEExCwAEAAE88jhoc0YKOgFcqT3I";
    $this->load->library("InstaApiWeb/InstaClient_lib", array("insta_id"=>"3445996566", "cookies" => new InstaApiWeb\Cookies(json_encode($cookies))), 'InstaClient_lib');
    echo "(<b>ok</b>)<br>";
     
   /* echo "[exec] make_login() ==> ";
      $result = $this->InstaClient_lib->make_login("riveauxmerino", "notredame");
    echo "(<b>ok</b>)<br>"; var_dump($result);
  */
    
    
    echo "[exec] unfollow() ==> ";
    $this->InstaClient_lib->unfollow("2023444583");
    echo "(<b>ok</b>)<br>"; 
    
    
    echo "[exec] follow() ==> ";
    $this->InstaClient_lib->follow("2023444583");
    echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] make_curl_friendships_command_str() ==> ";
    //$this->InstaClient_lib->make_curl_friendships_command_str();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] make_curl_chaining_str() ==> ";
    //$this->InstaClient_lib->make_curl_chaining_str();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] obtine_cookie_value() ==> ";
    //$this->InstaClient_lib->obtine_cookie_value();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] get_cookies_value() ==> ";
    //$this->InstaClient_lib->get_cookies_value();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] make_post() ==> ";
    //$this->InstaClient_lib->make_post();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] get_insta_csrftoken() ==> ";
    //$this->InstaClient_lib->get_insta_csrftoken();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] verify_cookies() ==> ";
    //$this->InstaClient_lib->verify_cookies();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] like_first_post() ==> ";
    //$this->InstaClient_lib->like_first_post();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] curlResponseHeaderCallback() ==> ";
    //$this->InstaClient_lib->curlResponseHeaderCallback();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] checkpoint_requested() ==> ";
    //$this->InstaClient_lib->checkpoint_requested();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] get_challenge_data() ==> ";
    //$this->InstaClient_lib->get_challenge_data();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] make_checkpoint() ==> ";
    //$this->InstaClient_lib->make_checkpoint();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] TurnOn_Logs() ==> ";
    //$this->InstaClient_lib->TurnOn_Logs();
    //echo "(<b>ok</b>)<br>"; 
    
    echo "[exec] TurnOff_Logs() ==> ";
    //$this->InstaClient_lib->TurnOff_Logs();
    //echo "(<b>ok</b>)<br>"; 
    
    //$result = new InstaApiWeb\Responses\LoginResponse();
    //
    //var_dump($result);
    //echo "(<b>ok</b>)<br>";
    
    
    //---------------------------------DEPRECATED--------------------------------------//
    
    
    //======= INSTA_API-LIB =======//
/*  echo "<h2>Test InstaApi Library</h2>";
    echo "[load] InstaApi_lib ==> ";
    $this->load->library("InstaApiWeb/InstaApi_lib", null, 'InstaApi_lib');
    echo "(<b>ok</b>)<br>";
    
    echo "[exec] login() ==> ";
    //$this->InstaApi_lib->login();
    //echo "(<b>ok</b>)<br>";
    
    echo "[exec] make_query() ==> ";
    //$this->InstaApi_lib->make_query();
    //echo "(<b>ok</b>)<br>";
    
    //======= INSTA_PROFILE_LIST-LIB =======//
    echo "<h2>Test InstaProfileList Library</h2>";
    echo "[load] InstaProfileList_lib ==> ";
    $this->load->library("InstaApiWeb/InstaProfileList_lib", null, 'InstaProfileList_lib');
    echo "(<b>ok</b>)<br>";
    
    echo "[exec] get_list_from_insta_follower_list() ==> ";
    //$this->InstaProfileList_lib->get_list_from_insta_follower_list();
    //echo "(<b>ok</b>)<br>";
    
    //======= MEDIA-LIB =======//
    echo "<h2>Test Media Library</h2>";
    echo "[load] Media_lib ==> ";
    $this->load->library("InstaApiWeb/Media_lib", null, 'Media_lib');
    echo "(<b>ok</b>)<br>";
     
    //echo "[exec] () ==> ";
    //$this->Media_lib->
    //echo "(<b>ok</b>)<br>";
   
    //======= PROXY-LIB =======//
    echo "<h2>Test Proxy Library</h2>";
    echo "[load] Proxy_lib ==> ";
    $this->load->library("InstaApiWeb/Proxy_lib", null, 'Proxy_lib');
    echo "(<b>ok</b>)<br>";
    
    //echo "[exec] () ==> ";
    //$this->Proxy_lib->
    //echo "(<b>ok</b>)<br>";
*/    
    
       
    echo "</pre>";
  }
  
  public function curl()
  {
    echo "<pre>";
    echo "<h2>Test PersonProfile Library</h2>";
    echo "[load] PersonProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaProfile_lib", null, 'InstaProfile_lib');
    $cookies = new Cookies('{"sessionid":"204662017%3AGQm7k6jfzicxNp%3A17","csrftoken":"WMhg3ci30e5yfmnRToZxQdnua2HyUNTK","ds_user_id":"204662017","mid":"WtlMoQABAAHZAlviRrBwRMd8ynet","json_response":{"status":"ok","authenticated":true}}  ');
    $result = $this->InstaProfile_lib->get_user_data("leticiajural", $cookies, null);
    var_dump($result);
    echo "(<b>ok</b>)<br>";
    
    
    
    
    
    echo "<pre>";
    echo "<h2>Test GeoProfile Library</h2>";
    echo "[load] GeoProfile_lib ==> ";

    $this->load->library("InstaApiWeb/InstaGeoProfile_lib", array("insta_id"=>"330156361"), 'GeoProfile_lib');
    $cookies = new Cookies(' {"sessionid":"204662017%3AGQm7k6jfzicxNp%3A17","csrftoken":"WMhg3ci30e5yfmnRToZxQdnua2HyUNTK","ds_user_id":"204662017","mid":"WtlMoQABAAHZAlviRrBwRMd8ynet","json_response":{"status":"ok","authenticated":true}}  ');
    $cursor = null;
    $res = $this->GeoProfile_lib->get_insta_followers($cookies,5,$cursor);
    var_dump($res);

    echo "(<b>ok</b>)<br>";
    
    echo "<pre>";
    echo "<h2>Test HashProfile Library</h2>";
    echo "[load] HashProfile_lib ==> ";

    $this->load->library("InstaApiWeb/InstaHashProfile_lib", array("insta_name"=>"cuba"), 'HashProfile_lib');
    $res = $this->HashProfile_lib->get_insta_followers($cookies,5, $cursor);
    var_dump($res);
    echo "(<b>ok</b>)<br>";

    
    echo "<pre>";
    echo "<h2>Test PersonProfile Library</h2>";
    echo "[load] PersonProfile_lib ==> ";
    $this->load->library("InstaApiWeb/InstaPersonProfile_lib",array("insta_id"=>"3445996566") , 'PersonProfile_lib');
    $res  = $this->PersonProfile_lib->get_insta_followers($cookies,15,$cursor);
    var_dump($res);
    echo "(<b>ok</b>)<br>";
 
  }
  
  public function login (){
    //echo "estoy dentro de login";
    
    $ck = array("sessionid" => "3445996566%3AUdrflm2b4CXrbl%3A15", 
                "csrftoken" => "7jSEZvsYWGzZQUx5zlR8I3MmvPATX1X0", 
                "ds_user_id" => "3445996566", 
                "mid" => "XEExCwAEAAE88jhoc0YKOgFcqT3I");
                
    $param = array("insta_id"=>"3445996566", "cookies" => new Cookies(json_encode($ck)));
    $this->load->library("InstaApiWeb/InstaClient_lib", $param, 'InstaClient_lib');
    
    echo "<h2>result login</h2>";
    $r = $this->InstaClient_lib->make_login("riveauxmerino", "notredame");
//    $r = $this->InstaClient_lib->make_login("carlosh_test", "Servidor19");        
//    $r = $this->InstaClient_lib->make_login("alberto_test", "alberto2");        
    var_dump($r);
    
    if (strstr($r->Message, "Challenge required") != false){
      echo "<h3>Cuenta bloqueada!!!. Challenge required<h3>";
      $r = $this->InstaClient_lib->checkpoint_requested("riveauxmerino", "notredame");
    }
    else{
      //$str = "curl 'https://www.instagram.com/graphql/query/?query_hash=0f318e8cfff9cc9ef09f88479ff571fb&variables=%7B%22id%22%3A%2211148782713%22%7D' -H 'cookie: mid=XCTI8gAEAAEVVYLYNcpS_G1J9l2Y; mcd=3; shbid=487; shbts=1550777997.8902974; rur=FTW; csrftoken=cszNLDehRcW4b5Z7P3gzSY9Cb7wBbJv8; ds_user_id=11148782713; sessionid=11148782713%3AHaTAVUlNWvHyUM%3A0; urlgen=\"{\"177.41.230.161\": 18881\054 \"177.19.35.84\": 10429}:1gwuEF:X_eM2qibUYKy211lpfWA2OEok0o\"' -H 'x-ig-app-id: 936619743392459' -H 'accept-encoding: gzip, deflate, br' -H 'accept-language: en-US,en;q=0.9' -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36' -H 'accept: */*' -H 'referer: https://www.instagram.com/' -H 'authority: www.instagram.com' -H 'x-requested-with: XMLHttpRequest' -H 'x-instagram-gis: b623ba4eb3f9a4aa43dd6319c52f6ca8' --compressed";
      $str = "curl 'https://www.instagram.com/graphql/query/?query_hash=ae21d996d1918b725a934c0ed7f59a74&variables=%7B%22fetch_media_count%22%3A0%2C%22fetch_suggested_count%22%3A30%2C%22ignore_cache%22%3Atrue%2C%22filter_followed_friends%22%3Atrue%2C%22seen_ids%22%3A%5B%5D%2C%22include_reel%22%3Atrue%7D' -H 'cookie: mid=XCTI8gAEAAEVVYLYNcpS_G1J9l2Y; mcd=3; shbid=487; shbts=1550777997.8902974; rur=FTW; csrftoken=cszNLDehRcW4b5Z7P3gzSY9Cb7wBbJv8; ds_user_id=11148782713; sessionid=11148782713%3AHaTAVUlNWvHyUM%3A0; urlgen=\"{\"177.41.230.161\": 18881\054 \"177.19.35.84\": 10429}:1gwuEF:X_eM2qibUYKy211lpfWA2OEok0o\"' -H 'x-ig-app-id: 936619743392459' -H 'accept-encoding: gzip, deflate, br' -H 'accept-language: en-US,en;q=0.9' -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36' -H 'accept: */*' -H 'referer: https://www.instagram.com/' -H 'authority: www.instagram.com' -H 'x-requested-with: XMLHttpRequest' -H 'x-instagram-gis: 78d695c40d26a8af17cc358144786042' --compressed";
      exec($str, $output, $status);

      echo "<h2>output</h2>";
      var_dump($output);
      echo "<h2>status</h2>";
      var_dump($status);

      //$this->InstaClient_lib->Msg();
    }    
  }
  
  public function checkpoint (){
    //echo "estoy dentro de checkpoint";
    
    $ck = array("sessionid" => "3445996566%3AUdrflm2b4CXrbl%3A15", 
                "csrftoken" => "7jSEZvsYWGzZQUx5zlR8I3MmvPATX1X0", 
                "ds_user_id" => "3445996566", 
                "mid" => "XEExCwAEAAE88jhoc0YKOgFcqT3I");
    $param = array("insta_id"=>"3445996566", "cookies" => new Cookies(json_encode($ck)));
    $this->load->library("InstaApiWeb/InstaClient_lib", $param, 'InstaClient_lib');
    
    echo "<h3>result login</h3>";
    //$r = $this->InstaClient_lib->checkpoint_requested("carlosh_test", "Servidor19");        
    //var_dump($r);
    
    //exec("curl 'https://www.instagram.com/challenge/3445996566/iDF1GfIeqT/' -H 'cookie: mid=XD3OzgAEAAHUu2xvm6meNNMo-BgB;csrftoken=5OLjdNXobyLR8Cyqq0O3NdcIDPscdzbq' -H 'origin: https://www.instagram.com' -H 'accept-encoding: gzip, deflate, br' -H 'accept-language: en-US,en;q=0.9,es;q=0.8,pt;q=0.7' -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.80 Safari/537.36' -H 'x-requested-with: XMLHttpRequest' -H 'x-csrftoken: 5OLjdNXobyLR8Cyqq0O3NdcIDPscdzbq' -H 'x-ig-app-id: 936619743392459' -H 'x-instagram-ajax: 871c83538bd0' -H 'content-type: application/x-www-form-urlencoded' -H 'accept: */*' -H 'referer: https://www.instagram.com/challenge/3445996566/iDF1GfIeqT/' --data 'choice=0' --compressed", $output);
    //var_dump($output); exit;
    
    
    $r = $this->InstaClient_lib->checkpoint_requested("riveauxmerino", "notredame");
    //$r = $this->InstaClient_lib->get_challenge_data("carlosh_test", "Servidor19");
    var_dump($r);  
      
    //$r = $this->InstaClient_lib->make_checkpoint();
  }
  
}
