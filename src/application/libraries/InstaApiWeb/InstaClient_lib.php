<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use InstaApiWeb\Proxy;
use InstaApiWeb\Cookies;
use InstaApiWeb\InstaURLs;
use InstaApiWeb\InstaClient;
use InstaApiWeb\VerificationChoice;
use InstaApiWeb\Response\LoginResponse;
use InstaApiWeb\Exceptions\InstaException;
use InstaApiWeb\Exceptions\InstaCurlNetworkException;
use InstaApiWeb\Exceptions\InstaPasswordException;
use InstaApiWeb\Exceptions\InstaCheckpointException;

/**
 * @category CodeIgniter-Library: InstaApiLib
 * 
 * @access public
 *
 * @todo Define a codeigniter library for X
 * 
 */
class InstaClient_lib {


  public function __construct(array $params) {

    require_once config_item('thirdparty-proxy-resource');
    require_once config_item('thirdparty-insta_url-resource');
    require_once config_item('thirdparty-login_response-class');
    require_once config_item('thirdparty-insta_client-resource');
    require_once config_item('thirdparty-verification_choice-resource');
    require_once config_item('insta-checkpoint-exception-class');
    require_once config_item('thirdparty-cookies-resource');

    $this->CI = &get_instance();
    $this->CI->load->model("db_model");

    if (!array_key_exists("insta_id", $params)) {
      throw new Exception("The params insta_id was not found");
    }
    if (!array_key_exists("cookies", $params)) {
      throw new Exception("The params cookies was not found");
    }
    $insta_id = $params["insta_id"];
    $cookies = $params["cookies"];
    $proxy = NULL;
    if (array_key_exists("proxy", $params))
      $proxy = $params["proxy"];
    $this->InstaClient = new InstaClient($insta_id, $cookies, $proxy);
  }
  
  public function make_login(string $login, string $pass) {
    try {
      $result = $this->InstaClient->make_login($login, $pass);
    } catch (InstaCheckpointException $e) {
      $result = new LoginResponse(null, null, $e->GetChallange(), $e->getCode(), $e->getMessage());
    } catch (InstaException $e) {
      //$this->CI->db_model->insert_event_to_washdog($Client->id, $e->getMessage(), $source);

      $result = new LoginResponse(NULL, NULL, "", $e->getCode(), $e->getMessage());
    }
    return $result;
  }

  public function follow(string $resource_id) {
    return $this->InstaClient->follow($resource_id);
  }

  public function unfollow(string $resource_id) {
    return $this->InstaClient->unfollow($resource_id);
  }

  public function like_post(string $resource_id) {
    return $this->InstaClient->like_post($resource_id);
  }

  /* public function make_insta_friendships_command(string $resource_id, string $command = 'follow', string $objetive_url = 'web/friendships') {

    $this->InstaClient->make_insta_friendships_command($resource_id, $command, $objetive_url);
    }

    public function make_curl_friendships_command_str(string $url) {

    $this->InstaClient->make_curl_friendships_command_str($url);
    }
   */

  public function make_curl_chaining_str(string $insta_id, int $N, string $cursor = NULL) {

    return $this->InstaClient->make_curl_chaining_str($insta_id, $N, $cursor);
  }

  public function obtine_cookie_value($cookies, string $name) {

    return $this->InstaClient->obtine_cookie_value($cookies, $name);
  }

  public function get_cookies_value(string $key) {

    return $this->InstaClient->get_cookies_value($key);
  }

  public function make_post() {

    return $this->InstaClient->make_post();
  }

  public function get_insta_csrftoken($ch) {

    return $this->InstaClient->get_insta_csrftoken($ch);
  }

  public function verify_cookies(\stdClass $cookies) {

    return $this->InstaClient->verify_cookies($cookies);
  }

  public function like_first_post(string $fromClient_ista_id) {

   return $this->InstaClient->like_first_post($fromClient_ista_id);
  }

  public function curlResponseHeaderCallback($ch, string $headerLine) {

    return $this->InstaClient->curlResponseHeaderCallback($ch, $headerLine);
  }

  public function checkpoint_requested(string $login, string $pass, int $choise = VerificationChoice::Email) {

    return $this->InstaClient->checkpoint_requested($login, $pass, $choise);
  }
 
  public function make_checkpoint(string $login, string $code) {

    return $this->InstaClient->make_checkpoint($login, $code);
  }

  public function TurnOn_Logs() {

    $this->InstaClient->TurnOn_Logs();
  }

  public function TurnOff_Logs() {

    $this->InstaClient->TurnOff_Logs();
  }

  // Funcion temporal para comprobar que se cargo la lib.
  public function Msg() {
    echo __CLASS__ . "->" . __FUNCTION__ . "() invocado (<b>ok</b>)";
  }

}
