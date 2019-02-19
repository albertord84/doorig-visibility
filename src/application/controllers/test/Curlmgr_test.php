<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

use InstaApiWeb\Proxy;
use InstaApiWeb\Cookies;
use InstaApiWeb\EnumEntity;
use InstaApiWeb\EnumAction;
use InstaApiWeb\InstaCurlMgr;
use InstaApiWeb\Exceptions\InstaException;
use InstaApiWeb\Exceptions\InstaCurlMediaException;

ini_set('xdebug.var_display_max_depth', 17);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 8024);

class CurlMgr_test extends CI_Controller {

  public function __construct() {
    parent::__construct();

    require_once config_item('thirdparty-proxy-resource');
    require_once config_item('thirdparty-cookies-resource');
    require_once config_item('thirdparty-insta_curl_mgr-resource');
    require_once config_item('insta-curl-exception-class');
  }

  public function index() {
    echo "Controller: <b>" . __CLASS__ . "</b> cargado.";

    //$str = "<br><br>mi nombre es: <b>%s</b>. Esta es una cadena formateada de forma avanzada";
    //$str = sprintf($str, "Carlos");
    //echo $str;

    $str = "'{\"status\":\"ok\",\"authenticated\":true,\"user\":\"josergm86\"},\"csrftoken\":\"tf1VJ4xXfPMBRMNozuLHGOa4hEr20XZO\",\"sessionid\":\"IGSC1b336ba7700e62c3e1cb90c90655488463d069b26d7cd823091f92c24821006d%3AvIoWSs5N8oW03XThBLfJ4gjsX78zEspz%3A%7B%22_token_ver%22%3A2%2C%22_auth_user_id%22%3A3858629065%2C%22_token%22%3A%223858629065%3AoAHvXyzvZHBjRxPmgaYfZcoEjJ3USXzD%3A267dac87c2a808a9b49cada179ac36f3b766f6a18abc6aa1f007bd2a4f2b3974%22%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22last_refreshed%22%3A1482254863.410775%2C%22_platform%22%3A4%2C%22_auth_user_hash%22%3A%22%22%7D\",\"ds_user_id\":\"3858629065\",\"mid\":\"WFlqDwAEAAHTSpuRe2vTEm6KEruS\"}'"; 
    $c = json_decode($str);
    var_dump($c);
    
    $id = 123;
    $N = 1;
    $cursor = "00-cursor-00";

    /* $variables = "{\"id\":\"$id\",\"first\":\"$N\"";
      //if ($cursor != NULL && $cursor != "NULL") {
      $variables .= ",\"after\":\"$cursor\"";
      //}
      $variables .= "}";

      echo "<br><br>".$variables."<br>"; echo urlencode($variables); */

    //$obj = new InstaCurlMgr(new EnumEntity(EnumEntity::HASHTAG), new EnumAction(EnumAction::CMD_FOLLOW));
    //$obj->setMediaData($id, $N, $cursor);
    //$obj->make_curl_str($proxy, $cookies);
    //$obj = new EnumAction(EnumAction::CMD_LOGIN);
    //echo "<br>".$obj;
  }

  public function run() {
    try {
      echo "<div style='border: solid 2px;padding:5px;padding-top:0px;'>";
      echo "<h2>CLIENT + LIKE</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_LIKE));
      $obj->setResourceId("my-id-111");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));

      echo "<h2>CLIENT + FOLLOW</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_FOLLOW));
      $obj->setResourceId("my-id-222");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));

      echo "<h2>CLIENT + UNFOLLOW</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_UNFOLLOW));
      $obj->setResourceId("my-id-333");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      echo "</div>";
      //------------------------------------------------------------------------------------

      echo "<div style='border: solid 2px;padding:5px;;padding-top:0px;margin-top:10px;'>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::GEO), new EnumAction(EnumAction::GET_OWNER_POST_DATA));
      $obj->setInstaId("123");
      $obj->setReferencePost("999");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      echo "</div>";
      //------------------------------------------------------------------------------------

      echo "<div style='border: solid 2px;padding:5px;;padding-top:0px;margin-top:10px;'>";
      echo "<h2>GEO + GET_POST</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::GEO), new EnumAction(EnumAction::GET_POST));
      $obj->setMediaData("AAA", "111", "AA-cursor-11");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      //var_dump($obj);

      echo "<h2>HASHTAG + GET_POST</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::HASHTAG), new EnumAction(EnumAction::GET_POST));
      $obj->setMediaData("BBB", "2", "BB-cursor-22");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      //var_dump($obj);

      echo "<h2>PERSON + GET_POST</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::PERSON), new EnumAction(EnumAction::GET_POST));
      $obj->setMediaData("CCC", "3", "CC-cursor-33");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      //var_dump($obj);      
      echo "</div>";

      echo "<h2>PERSON + GET_PROFILE_INFO</h2>";
      $obj = new InstaCurlMgr(new EnumEntity(EnumEntity::PERSON), new EnumAction(EnumAction::GET_PROFILE_INFO));
      $obj->setReferenceUser("leticiajural");
      echo $obj->make_curl_str(new Proxy("", "", "", ""), new Cookies("AAA", "BBB", "CCC", "DDD"));
      //var_dump($obj);      
      echo "</div>";

      //$obj = new InstaProfileType(InstaProfileType::PERSON);
      //var_dump($obj);
    } catch (InstaException $e) {
      echo $e->getMessage();
    }
  }

}
