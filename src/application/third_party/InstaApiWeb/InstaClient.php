<?php

namespace InstaApiWeb {

    #require_once config_item('business-cookies_request-class');

    use InstaApiWeb\Cookies;
    use InstaApiWeb\Exceptions\InstaCheckpointException;
    use InstaApiWeb\Exceptions\InstaCookiesException;
    use InstaApiWeb\Exceptions\InstaCurlNetworkException;
    use InstaApiWeb\Exceptions\InstaException;
    use InstaApiWeb\Exceptions\InstaPasswordException;
    use InstaApiWeb\InstaCurlMgr;
    use InstaApiWeb\Proxy;
    use InstaApiWeb\Response\LoginResponse;
    use InstaApiWeb\Response\PostInstaResponse;
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
            require_once config_item('insta-cookies-exception-class');
            require_once config_item('insta-password-exception-class');
            require_once config_item('thirdparty-login_response-class');
            require_once config_item('thirdparty-post_response-class');
            require_once config_item('insta-checkpoint-exception-class');
            require_once config_item('thirdparty-cookies-resource');
            require_once config_item('thirdparty-insta_curl_mgr-resource');

            $this->insta_id = $insta_id;
            $this->cookies = $cookies;
            $this->proxy = $proxy;
            $this->has_log = TRUE;
        }

        public function follow(string $resource_id) {
            try {
                if (!InstaClient::verify_cookies($this->cookies)) {
                    throw new InstaCookiesException('the cookies you are passing are incompleate or wrong');
                }

                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_FOLLOW));
                $mngr->setResourceId($resource_id);
                $curl_str = $mngr->make_curl_str($this->proxy, $this->cookies);
                //var_dump($curl_str);
                exec($curl_str, $output, $status);
                $obj = null;
                $code = -1;
                if (count($output) > 0) {
                    $obj = json_decode($output[0]);
                    $code = $this->parse_insta_response($obj);
                    $message = count($output) > 0 && isset($output[0]->message) ? $output[0]->message : "";
                }
                if(is_object($message))
                {
                    $message = \GuzzleHttp\json_encode($message);
                }
                return new Response\PostInstaResponse($obj, $code, $message);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        public function unfollow(string $resource_id) {
            try {

                if (!InstaClient::verify_cookies($this->cookies)) {
                    throw new InstaCookiesException('the cookies you are passing are incompleate or wrong');
                }

                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_UNFOLLOW));
                $mngr->setResourceId($resource_id);
                $curl_str = $mngr->make_curl_str($this->proxy, $this->cookies);
                // var_dump($curl_str);
                exec($curl_str, $output, $status);
                $obj = null;
                $code = -1;
                if (count($output) > 0) {
                    $obj = json_decode($output[0]);
                    $code = $this->parse_insta_response($obj);
                    $message = count($output) > 0 && isset($output[0]->message) ? $output[0]->message : "";
                }
                
                if(is_object($message))
                {
                    $message = \GuzzleHttp\json_encode($message);
                }
                return new Response\PostInstaResponse($obj, $code, $message);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        public function like_post(string $resource_id) {
            try {

                if (!InstaClient::verify_cookies($this->cookies)) {
                    throw new InstaCookiesException('the cookies you are passing are incompleate or wrong');
                }

                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_LIKE));
                $mngr->setResourceId($resource_id);
                $curl_str = $mngr->make_curl_str($proxy, $cookies);
                //var_dump($curl_str);
                exec($curl_str, $output, $status);
                $obj = null;
                $code = -1;
                if (count($output) > 0) {
                    $obj = json_decode($output[0]);
                    $code = $this->parse_insta_response($obj);
                    $message = count($output) > 0 && isset($output[0]->message) ? $output[0]->message : "";
                }
                
                if(is_object($message))
                {
                    $message = \GuzzleHttp\json_encode($message);
                }
                return new Response\PostInstaResponse($obj, $code, $message);
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

        public function make_login(string $username, string $password, bool $force_login = TRUE) {
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

               if($this->has_logs)
                {
                    var_dump($loginIGResponse);
                }
                
                $ig->client->loadCookieJar();

                if ($loginIGResponse !== null && $loginIGResponse->isTwoFactorRequired()) {
                    $twoFactorIdentifier = $loginIGResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
                    $verificationCode = trim(fgets(STDIN));
                    $ig->finishTwoFactorLogin($verificationCode, $twoFactorIdentifier);
                }

                $Cookies = new Cookies();
                $Cookies->SessionId = $ig->client->getCookie('sessionid')->getValue();
                $Cookies->CsrfToken = $ig->client->getCookie('csrftoken')->getValue();
                $Cookies->Mid = $ig->client->getCookie('mid')->getValue();
                $Cookies->DsUserId = $ig->client->getCookie('ds_user_id')->getValue();
                $loginResponse = new LoginResponse('ok', $Cookies);

                return $loginResponse;
            } catch (\Throwable $e) {
                //echo '<br>Something went wrong: ' . $e->getMessage() . "\n</br>";
                //echo $e->getTraceAsString();                 
           
               if($this->has_logs)
                {
                    var_dump($e);
                }
                
                $source = 0;
                if (isset($id) && $id !== NULL && $id !== 0)
                    $source = 1;

                $msg = $e->getMessage();
                if ((strpos($e->getMessage(), 'Challenge required') !== FALSE) || (strpos($e->getMessage(), 'Checkpoint required') !== FALSE) || (strpos($e->getMessage(), 'challenge_required') !== FALSE)) {
                    $res = $e->getResponse()->getChallenge()->getApiPath();
                    throw new InstaCheckpointException($e->getMessage(), $e->getPrevious(), $res);
                } else if (strpos($e->getMessage(), 'Network') !== FALSE) { // Time out by bad proxy
                    throw new InstaCurlNetworkException($e->getMessage(), $e);
                } else if (strpos($e->getMessage(), 'InstaPasswordException') !== FALSE) {
                    throw new InstaPasswordException($e->getMessage(), $e);
                } else if (strpos($e->getMessage(), 'there was a problem with your request') !== FALSE) {
                    throw new InstaException('problem_with_your_request', $e->getCode());
                } else {
                    throw new InstaException("Insta login: Untrathed error", -1);
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
                $response = $this->make_login($login, $pass);
                return $response;
            } catch (InstaCheckpointException $exc) {
                $res = $exc->GetChallange();

                $response = $this->get_challenge_data($res, $login, $choise);
                return $response;
            } catch (\Exception $exc) {
                return new LoginResponse(FALSE, NULL, "", $exc->getCode(), $exc->getMessage());
            }
        }

        public function get_challenge_data(string $challenge, string $login, int $choice = VerificationChoice::Email) {
            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::GET_CHALLENGE_CODE));

                $mngr->setChallengeCode($challenge);
                $mngr->setChoise($choice);
                $ch = $mngr->make_curl_obj($this->proxy);

                global $cookies;
                //$cookies = array();
                $html = curl_exec($ch);
                $info = curl_getinfo($ch);

                $cookies_response = new Cookies();
                $cookies_response->CsrfToken = $mngr->get_cookies_value("csrftoken");
                $cookies_response->Mid = $mngr->get_cookies_value("mid");
                $cookies_response->Challenge = $challenge;

                // LOGIN WITH CURL TO TEST
                // Parse html response
                curl_close($ch);
                $start = strpos($html, "200") != 0;
                if ($start) {
                    $response = new Response\LoginResponse(false, $cookies_response, $challenge, 2, "checkpoint requiered");
                    return $response;
                }
            } catch (\Exception $exc) {
                var_dump($exc);
            }
        }

        public function make_checkpoint(string $login, string $code) {
            $ci = &get_instance();
            $challenge = $this->cookies->Challenge;
            $mid = $this->cookies->Mid;

            try {
                $mngr = new InstaCurlMgr(new EnumEntity(EnumEntity::CLIENT), new EnumAction(EnumAction::CMD_CHECKPOINT));
                $mngr->setChallengeCode($challenge);
                $mngr->setSecurityCode($code);

                $ch = $mngr->make_curl_obj($this->proxy, $this->cookies);
                global $cookies;
                $cookies = array();
                $html = curl_exec($ch);
                //print_r($html);
                $info = curl_getinfo($ch);

                $http_reponse_OK = strpos($html, "200 OK") != 0;
                $http_reponse_BAD_REQUEST = strpos($html, "400 Bad Request") != 0;
                $json_str = substr($html, $http_reponse_OK);
                $json_response = json_decode($json_str);

                $Cookies = new Cookies();
                $Cookies->json_response = $json_response;
                if (count($cookies) >= 2 && $http_reponse_OK) {
                    $Cookies->json_response = json_decode('{"authenticated":true,"user":true,"status":"ok"}');
                    $Cookies->CsrfToken = $mngr->get_cookies_value("csrftoken");
                    $Cookies->SessionId = $mngr->get_cookies_value("sessionid");
                    $Cookies->DsUserId = $mngr->get_cookies_value("ds_user_id");
                    $Cookies->Mid = $mngr->get_cookies_value("mid");
                    if ($Cookies->Mid == NULL || $Cookies->Mid == "") {
                        $Cookies->Mid = $mid;
                    }

                    curl_close($ch);

                    $response = new Response\LoginResponse(false, $Cookies, $challenge, 0, "checkpoint requiered");
                    return $response;
                } else {
                    $Cookies->json_response = json_decode('{"authenticated":false, "status":"fail"}');
                }
            } catch (\Exception $exc) {
                
            }

            $response = new Response\LoginResponse(false, $Cookies, '', -4, 'Make checkpoint bad request ');
            return $response;
        }

        public function TurnOn_Logs() {
            $this->has_logs = TRUE;
        }

        public function TurnOff_Logs() {
            $this->has_logs = FALSE;
        }

        private function parse_insta_response($insta_response) {
//            var_dump($response->message);
            if (is_object($insta_response) && $insta_response->status == "ok")
                return 0;
            if (is_object($insta_response) && isset($insta_response->message)) {
                if ($insta_response->status == "ok")
                    return 0;
                if ((strpos($insta_response->message, 'Com base no uso anterior deste recurso') !== FALSE) || (strpos($insta_response->message, 'Parece que você estava usando este recurso de forma indevida avançando muito rapidamente') !== FALSE)) {
                    return 1;
                }
                if ((strpos($insta_response->message, 'Você atingiux o limite máximo de contas para seguir.') !== FALSE) || (strpos($insta_response->message, "Sorry, you're following the max limit of accounts.") !== FALSE)) {
                    return 2;
                }
                if (strpos($insta_response->message, 'unauthorized') !== FALSE) {
                    return 3;
                }
                if (strpos($insta_response->message, 'Parece que você estava usando esse recurso indevidamente de forma muito') !== FALSE) {
                    return 4;
                }
                if (strpos($insta_response->message, 'checkpoint_required') !== FALSE) {
                    return 5;
                }
                if ((strpos($insta_response->message, 'Tente novamente mais tarde') !== FALSE) || (strpos($insta_response->message, 'Aguarde alguns minutos antes de tentar novamente') !== FALSE) || (strpos($insta_response->message, 'orbidden') !== FALSE)) {
                    return 7;
                }
                if (strpos($insta_response->message, 'Esta mensagem contém conteúdo que foi bloqueado pelos nossos sistemas de segurança.') !== FALSE) {
                    return 8;
                }
                if (strpos($insta_response->message, 'Ocorreu um erro ao processar essa solicita') !== FALSE) {
                    return 9;
                }
                if (strpos($insta_response->message, 'se ha bloqueado. Vuelve a intentarlo') !== FALSE) {
                    return 11;
                }
                if ($insta_response->message === '') {
                    return 6; // Empty message
                }
                if (strpos($insta_response->message, 'execution error') !== FALSE || strpos($insta_response->message, 'execution failure') !== FALSE) {
                    return 12;
                }
            } // If array
            else if (is_array($insta_response) && count($insta_response) >= 1 && is_string($insta_response[0]) &&
                    ((strpos($insta_response[0], 'Tente novamente mais tarde') !== FALSE) || strpos($insta_response[0], 'Aguarde alguns minutos antes de tentar novamente') !== FALSE)) {
                return 7; // Tente novamente mais tarde
            } else if (is_array($insta_response) && count($insta_response) == 0) {
                return 10; // Tente novamente mais tarde
            }
            return -1;
        }

    }

}