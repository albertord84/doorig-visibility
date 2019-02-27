<?php

namespace InstaApiWeb {

  #require_once config_item('business-cookies_request-class');

  use InstaApiWeb\Cookies;
  use InstaApiWeb\Exceptions\InstaCheckpointException;
  use InstaApiWeb\Exceptions\InstaCookiesException;
  use InstaApiWeb\Exceptions\InstaCurlException;
  use InstaApiWeb\Exceptions\InstaException;
  use InstaApiWeb\Exceptions\InstaPasswordException;
  use InstaApiWeb\InstaCurlMgr;
  use InstaApiWeb\Proxy;
  use InstaApiWeb\Responses\LoginResponse;
  use InstagramAPI\Instagram;

  /**
   * @category CodeIgniter-Library: InstaApiLib
   * 
   * @access public
   *
   * @todo Define a codeigniter library for X
   * 
   */
  class InstaClient {

    public $cookies;
    public $insta_id;
    public $proxy;
    private $has_logs;

    public function __construct(string $insta_id, Cookies $cookies = NULL, Proxy $proxy = NULL) {
      require_once config_item('composer_autoload');
      require_once config_item('insta-exception-class');
      require_once config_item('insta-cookies-exception-class');
      require_once config_item('insta-curl-exception-class');
      require_once config_item('insta-cookies-exception-class');
      require_once config_item('insta-password-exception-class');
      require_once config_item('thirdparty-login_response-class');
      require_once config_item('insta-checkpoint-exception-class');
      require_once config_item('thirdparty-cookies-resource');
      require_once config_item('thirdparty-insta_curl_mgr-resource');


      if (!InstaClient::verify_cookies($cookies)) {
        throw new InstaCookiesException('the cookies you are passing are incompleate or wrong');
      }
      $this->insta_id = $insta_id;
      $this->cookies = $cookies;
      $this->proxy = $proxy;
      $this->has_log = TRUE;
    }

    public function follow(string $resource_id) {
      try {
        $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_FOLLOW));
        $mngr->setResourceId($resource_id);
        $curl_str = $mngr->make_curl_str($this->proxy, $this->cookies);
        //var_dump($curl_str);
        exec($curl_str, $output, $status);
        return $output[0];
      } catch (Exception $e) {
        var_dump($e);
      }
    }

    public function unfollow(string $resource_id) {
      try {
        $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_UNFOLLOW));
        $mngr->setResourceId($resource_id);
        $curl_str = $mngr->make_curl_str($this->proxy, $this->cookies);
        var_dump($curl_str);
        exec($curl_str, $output, $status);
        var_dump($output);
      } catch (Exception $e) {
        var_dump($e);
      }
    }

    public function like_post(string $resource_id) {
      try {
        $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_LIKE));
        $mngr->setResourceId($resource_id);
        $curl_str = $mngr->make_curl_str($proxy, $cookies);
        var_dump($curl_str);
        exec($curl_str, $output, $status);
        var_dump($output);
      } catch (Exception $e) {
        var_dump($e);
      }
    }

    /*
      public function make_insta_friendships_command(string $resource_id, string $command = 'follow', string $objetive_url = 'web/friendships') {
      $insta = InstaURLs::Instagram;
      $curl_str = $this->make_curl_friendships_command_str("'$insta/$objetive_url/$resource_id/$command/'");

      exec($curl_str, $output, $status);
      $error = false;
      if (is_array($output) && count($output)) { // Retorna un arreglo con elementos
      $json_response = json_decode($output[count($output) - 1]);
      if ($json_response && (isset($json_response->result) || (isset($json_response->status) && $json_response->status === 'ok'))) {
      return $json_response;
      } else {
      if ($this->has_logs) {
      echo "status fail in command $command from function make_insta_friendships_command\n";
      var_dump($output);
      var_dump($curl_str);
      }
      return $json_response;
      }
      } else if (is_array($output)) { // Retorno un arreglo vacio
      if ($this->has_logs)
      echo "array empty in command $command from function make_insta_friendships_command\n";
      $error = true;
      } else {  // Retornar diferente de arreglo
      if ($this->has_logs)
      echo "unknown error in command $command from function make_insta_friendships_command\n";
      $error = true;
      }

      if ($this->has_logs) {
      var_dump($output);
      var_dump($curl_str);
      }

      return $output;
      } */

    /*
      public function make_curl_friendships_command_str(string $url) {
      /*if (!$this->verify_cookies($cookies))
      throw new Exceptions\CookiesWrongSyntaxException("The cookies are wrong");
      $proxy_str = "";

      if ($proxy != NULL)
      $proxy_str = $proxy->ToString();
      $curl_str = "curl $proxy_str  $url ";
      $curl_str .= "-X POST ";
      $curl_str .= "-H 'Cookie: mid=$mid; sessionid=$sessionid;  csrftoken=$csrftoken; ds_user_id=$ds_user_id' ";
      $curl_str .= "-H 'origin: www.instagram.com' ";
      $curl_str .= "-H 'Accept-Encoding: gzip, deflate' ";
      $curl_str .= "-H 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4' ";
      $curl_str .= "-H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0' ";
      $curl_str .= "-H 'X-Requested-with: XMLHttpRequest' ";
      $curl_str .= "-H 'X-CSRFToken: $csrftoken' ";
      $curl_str .= "-H 'X-Instagram-Ajax: dad8d866382b' ";
      $curl_str .= "-H 'Content-Type: application/x-www-form-urlencoded' ";
      $curl_str .= "-H 'Accept: **' ";
      $curl_str .= "-H 'Referer: https://www.instagram.com/' ";
      $curl_str .= "-H 'Authority: www.instagram.com' ";
      $curl_str .= "-H 'Content-Length: 0' ";
      $curl_str .= "--compressed ";

      return $curl_str;
      } */

    public static function obtine_cookie_value($cookies, string $name) {
      /* oreach ($cookies as $key => $object) {
        //print_r($object + "<br>");
        if ($object->name == $name) {
        return $object->value;
        }
        }
        return null; */
    }

    public function get_cookies_value(string $key) {
      /* $value = NULL;
        global $cookies;
        foreach ($cookies as $index => $cookie) {
        $pos = strpos($cookie[1], $key);
        if ($pos !== FALSE) {
        $value = explode("=", $cookie[1]);
        if ($value[1] != "\"\"" && $value[1] != "" && $value[1] != NULL) {
        $value = $value[1];
        break;
        }
        }
        } */
    }

    public function make_post() {
//$url = InstaURLs::MakePost;
    }

    public function get_insta_csrftoken($ch) {
      /* curl_setopt($ch, CURLOPT_URL, InstaURLs::Instagram);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLINFO_COOKIELIST, true);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, array($this, "curlResponseHeaderCallback"));
        global $cookies;
        $cookies = array();
        $response = curl_exec($ch);
        $csrftoken = $this->get_cookies_value("csrftoken");
        //var_dump($cookies);
        return $csrftoken; */
    }

    public static function verify_cookies(Cookies $cookies = NULL) {
      if ($cookies != NULL) {
        return (isset($cookies->CsrfToken) && $cookies->CsrfToken !== NULL && $cookies->CsrfToken !== '' &&
                isset($cookies->Mid) && $cookies->Mid !== NULL && $cookies->Mid !== '' &&
                isset($cookies->SessionId) && $cookies->SessionId !== NULL && $cookies->SessionId !== '' &&
                isset($cookies->DsUserId) && $cookies->DsUserId !== NULL && $cookies->DsUserId !== '');
      }

      return false;
    }

    public function make_login(string $username, string $password, bool $force_login = FALSE) {
      $debug = false;
      $truncatedDebug = true;
//////////////////////

      Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

      try {
        $ig = new Instagram($debug, $truncatedDebug);

        //$ig->setOutputInterface("191.252.110.140");
        //$ig->setProxy(['proxy'=>'tcp://70.39.250.32:23128']);
        if ($this->proxy)
          $ig->setProxy("http://" . $this->proxy->ToString());
        //$ig->setProxy("http://albertreye9917:3r4rcz0b1v@207.188.155.18:21316");

        $loginIGResponse = $ig->login($username, $password, $force_login);

        $ig->client->loadCookieJar();

        if ($loginIGResponse !== null && $loginIGResponse->isTwoFactorRequired()) {
          $twoFactorIdentifier = $loginIGResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
          $verificationCode = trim(fgets(STDIN));
          $ig->finishTwoFactorLogin($verificationCode, $twoFactorIdentifier);
        }

        $ck = array("sessionid" => $ig->client->getCookie('sessionid')->getValue(),
            "csrftoken" => $ig->client->getCookie('csrftoken')->getValue(),
            "ds_user_id" => $ig->client->getCookie('ds_user_id')->getValue(),
            "mid" => $ig->client->getCookie('mid')->getValue());
        $Cookies = new Cookies(json_encode($ck));
        $loginResponse = new LoginResponse('ok', true, "", $Cookies);

        return $loginResponse;
      } catch (\Exception $e) {
        //echo '<br>Something went wrong: ' . $e->getMessage() . "\n</br>";
        //echo $e->getTraceAsString();                
        $source = 0;
        if (isset($id) && $id !== NULL && $id !== 0)
          $source = 1;

        if ((strpos($e->getMessage(), 'Challenge required') !== FALSE) || (strpos($e->getMessage(), 'Checkpoint required') !== FALSE) || (strpos($e->getMessage(), 'challenge_required') !== FALSE)) {
          $res = $e->getResponse()->getChallenge()->getApiPath();
          throw new InstaCheckpointException($e->getMessage(), $e->getPrevious(), $res);
        } else if (strpos($e->getMessage(), 'Network: CURL error 28') !== FALSE) { // Time out by bad proxy
          throw new InstaCurlException($e->getMessage(), $e);
        } else if (strpos($e->getMessage(), 'password you entered is incorrect') !== FALSE) {
          throw new InstaPasswordException($e->getMessage(), $e);
        } else if (strpos($e->getMessage(), 'there was a problem with your request') !== FALSE) {
          throw new InstaException('problem_with_your_request', $e->getCode());
        } else {
          throw new InstaException($e->getMessage(), $e->getCode());
        }
      }
    }

    public function like_first_post(string $fromClient_ista_id) {

      try {
        $result = $this->get_insta_chaining($fromClient_ista_id, 1, NULL);
        //print_r($result);
        $error = true;
        if ($result != NULL && is_array($result)) {
          if (count($result) > 0 && array_key_exists('0', $result)) {
            $result = $this->make_insta_friendships_command($result[0]->node->id, 'like', 'web/likes');
            if (isset($result->status) && $result->status === 'ok') {
              if ($this->has_logs) {
                var_dump("  LIKE FIRST OK\n");
              }
              $error = false;
            }
          } else if (count($result) == 0) {
            if ($this->has_logs) {
              var_dump("O perfil pode ser privado\n");
            }
            $error = false;
          }
        }
        if ($error) {
          if ($this->has_logs) {
            var_dump(" Problem in first_like\n");
            var_dump($result);
          }
        }
        return $result;
      } catch (\Exception $exc) {
        throw $exc; //melhorar esse return
      }
    }

    public function get_insta_chaining(string $insta_id, int $N = 1, string $cursor = NULL) {

      $curl_str = $this->make_curl_chaining_str($insta_id, $N, $cursor);
      if ($curl_str === NULL) {
        if ($this->has_logs) {
          var_dump("error in cookies line 708 function get_insta_chaining \n");
        }
        return NULL;
      }

      exec($curl_str, $output, $status);
      $json = json_decode($output[0]);

      if (isset($json->data->user->edge_owner_to_timeline_media) && isset($json->data->user->edge_owner_to_timeline_media->edges)) {
        return $json->data->user->edge_owner_to_timeline_media->edges;
      }
      if ($this->has_logs) {
        echo "Message Error in get_insta_chaining</br>\n";
        var_dump($output);
        var_dump($curl_str);
      }
      return FALSE;
    }

    public function curlResponseHeaderCallback($ch, string $headerLine) {
      global $cookies;
      if (preg_match('/^Set-Cookie:\s*([^;]*)/mi', $headerLine, $cookie) == 1)
        $cookies[] = $cookie;
      //        $cookies[] = $headerLine;
      return strlen($headerLine); // Needed by curl */
    }

    public function checkpoint_requested(string $login, string $pass, int $choise = VerificationChoice::Email) {
      try {

        $result = $this->make_login($login, $pass);
        return $result;
      } catch (InstaCheckpointException $exc) {
        $res = $exc->GetChallange();

        $response = $this->get_challenge_data($res, $login, $choise);
        return $response;
      }
    }

    public function get_challenge_data(string $challenge, string $login, int $choice = VerificationChoice::Email) {
      try {
        $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::GET_CHALLENGE_CODE));

        $mngr->setChallengeCode($challenge);
        $mngr->setChoise($choice);
        $ch = $mngr->make_curl_obj($this->proxy);

        $html = curl_exec($ch);
        var_dump($html);
        $info = curl_getinfo($ch);

        $cookies = new Cookies();
        $cookies->CsrfToken = $mngr->get_cookies_value("csrftoken");
        $cookies->Mid = $mngr->get_cookies_value("mid");
        $cookies->Challenge = $challenge;

        $ci = &get_instance();
        $ci->session->set_userdata(["cookies-challenge" => $cookies]);
        var_dump($cookies);

        // LOGIN WITH CURL TO TEST
        // Parse html response
        curl_close($ch);
        $start = strpos($html, "200") != 0;
        $json_str = substr($html, $start);

        return $json_response = json_decode($json_str);
      } catch (\Exception $exc) {
        var_dump($exc);
      }
    }

    public function make_checkpoint(string $login, string $code) {
      $ci = &get_instance();
      $checkpoint_cookies = new \InstaApiWeb\Cookies();
      $checkpoint_cookies = unserialize(serialize($ci->session->userdata("cookies-challenge")));
      $csrftoken = $checkpoint_cookies->CsrfToken;
      $challenge = $checkpoint_cookies->Challenge;
      $mid = $checkpoint_cookies->Mid;

      try {
        $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_CHECKPOINT));
        $mngr->setChallengeCode($challenge);
        $mngr->setSecurityCode($code);

        $ch = $mngr->make_curl_obj($this->proxy, $checkpoint_cookies);
        global $cookies;
        $cookies = array();
        $html = curl_exec($ch);
        print_r($html);
        $info = curl_getinfo($ch);

        $start = strpos($html, "200") != 0;
        $json_str = substr($html, $start);
        $json_response = json_decode($json_str);

        var_dump($cookies);
        var_dump($json_response);

        $login_data = new \stdClass();
        $login_data->json_response = $json_response;
        if (count($checkpoint_cookies) >= 2 && $start) {
          $login_data->json_response = json_decode('{"authenticated":true,"user":true,"status":"ok"}');

          $login_data->csrftoken = $mngr->get_cookies_value("csrftoken");
          $login_data->sessionid = $mngr->get_cookies_value("sessionid");
          $login_data->ds_user_id = $mngr->get_cookies_value("ds_user_id");
          $login_data->mid = $mngr->get_cookies_value("mid");

          if ($login_data->mid == NULL || $login_data->mid == "") {
            $login_data->mid = $mid;
          }
          //(new \follows\cls\Client())->set_client_cookies($Client->id, json_encode($login_data));
        } else {
          $login_data->json_response = json_decode('{"authenticated":false, "status":"fail"}');
        }

        var_dump($login_data);

        curl_close($ch);
        $this->cookies = $login_data;
        return $login_data;
      } catch (\Exception $exc) {
        
      }


      /* $url = InstaURLs::Instagram . "/" . $cookies->checkpoint_url;
        $ch = curl_init(InstaURLs::Instagram);
        $headers = array();

        $postinfo = "security_code=$code";
        $headers[] = "Origin: https://www.instagram.com";
        $headers[] = "User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0";
        //            $headers[] = "Accept: application/json";
        $headers[] = "Accept: **";
        $headers[] = "Accept-Language: en-US,en;q=0.5, ";
        $headers[] = "Accept-Encoding: gzip, deflate, br";
        $headers[] = "Referer: $url";
        $headers[] = "X-CSRFToken: $csrftoken";
        $headers[] = "X-Instagram-AJAX: 1";
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        //            $headers[] = "Content-Type: application/json";
        $headers[] = "X-Requested-With: XMLHttpRequest";
        $headers[] = "Cookie: mid=$mid; csrftoken=$csrftoken";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //curl_setopt($ch, CURLOPT_POST, true);
        //            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        //            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, array($this, "curlResponseHeaderCallback"));
        global $cookies;
        $cookies = array();
        $html = curl_exec($ch);
        $info = curl_getinfo($ch); */

// LOGIN WITH CURL TO TEST
// Parse html response
    }

    public function TurnOn_Logs() {
      $has_logs = TRUE;
    }

    public function TurnOff_Logs() {
      $has_logs = FALSE;
    }

  }

}