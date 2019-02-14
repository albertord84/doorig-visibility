<?php

namespace InstaApiWeb {

  require_once config_item('thirdparty-proxy-resource');
  require_once config_item('thirdparty-cookies-resource');
  require_once config_item('insta-curl-exception-class');

  use InstaApiWeb\Proxy;
  use InstaApiWeb\Cookies;
  use InstaApiWeb\Exceptions\InstaCurlMediaException;
  use InstaApiWeb\Exceptions\InstaCurlActionException;
  use InstaApiWeb\Exceptions\InstaCurlArgumentException;

  /**
   * 
   * Define a abstract base enum for Instagram Concepts.
   * 
   * @category Third-Party Instagram API
   * 
   * @access public
   *
   */
  abstract class EnumBase {

    protected $enumValue;

    public function __construct(int $value) {
      $this->enumValue = $value;
    }

    public function getEnumValue() {
      return $this->enumValue;
    }

  }

  /**
   * 
   * Define a enum for Instagram Entity.
   * 
   * @category Third-Party Instagram API
   * 
   * @access public
   * .
   */
  class EnumEntity extends EnumBase {

    const GEO = 1;
    const PERSON = 2;
    const HASHTAG = 4;
    const CLIENT = 8;

    private $TagQuery = array(array());

    /**
     * 
     * @param int $value
     * @throws InstaCurlArgumentException
     */
    public function __construct(int $value) {
      if ($value != EnumEntity::GEO && $value != EnumEntity::PERSON &&
              $value != EnumEntity::HASHTAG && $value != EnumEntity::CLIENT)
        throw new InstaCurlArgumentException("The EnumEntity value ($value) provided is ilegal!!!.");

      parent::__construct($value);

      /* Instagram Hash-query definitions */
      $this->TagQuery['Geo'] = "ac38b90f0f3981c42092016a37c59bf7";
      $this->TagQuery['Person'] = "37479f2b8209594dde7facb0d904896a";
      $this->TagQuery['HashTag'] = "ded47faa9a1aaded10161a2ff32abb6b";
    }

    /**
     * 
     * @return type
     */
    public function getHashQuery() {
      $hash = null;
      switch ($this->enumValue) {
        case EnumEntity::GEO : $hash = $this->TagQuery['Geo'];
          break;
        case EnumEntity::PERSON : $hash = $this->TagQuery['Person'];
          break;
        case EnumEntity::HASHTAG: $hash = $this->TagQuery['HashTag'];
          break;
      }

      return $hash;
    }

    /**
     * 
     * @return string
     */
    function __toString() {
      switch ($this->enumValue) {
        case EnumEntity::GEO : $str = "GEOLOCALIZATION";
          break;
        case EnumEntity::PERSON : $str = "PERSON";
          break;
        case EnumEntity::HASHTAG: $str = "HASHTAG";
          break;
        case EnumEntity::CLIENT : $str = "CLIENT";
          break;
      }

      return $str;
    }

  }

  /**
   * 
   * Define a enum for Instagram Actions.
   * 
   * @category Third-Party Instagram API
   * 
   * @access public
   * .
   */
  class EnumAction extends EnumBase {

    const CMD_LIKE = 16;
    const CMD_FOLLOW = 32;
    const CMD_UNFOLLOW = 64;
    const CMD_CHECKPOINT = 128;
    const GET_POST = 256;
    const GET_FIRST_POST = 512;
    const GET_FOLLOWERS = 1024;
    const GET_FOLLOWED = 2048;
    const GET_OWNER_POST_DATA = 4096;
    const GET_PROFILE_INFO = 9182;
    const GET_CHALLENGE_CODE = 18364;
    const GET_TOP_SEARCH = 36728;

    /**
     * 
     * @param int $value
     * @throws InstaCurlArgumentException
     */
    public function __construct(int $value) {
      if ($value != EnumAction::CMD_LIKE && $value != EnumAction::CMD_FOLLOW &&
              $value != EnumAction::CMD_UNFOLLOW && $value != EnumAction::CMD_CHECKPOINT &&
              $value != EnumAction::GET_POST && $value != EnumAction::GET_FIRST_POST &&
              $value != EnumAction::GET_FOLLOWERS && $value != EnumAction::GET_FOLLOWED &&
              $value != EnumAction::GET_OWNER_POST_DATA && $value != EnumAction::GET_PROFILE_INFO &&
              $value != EnumAction::GET_CHALLENGE_CODE && $value != EnumAction::GET_TOP_SEARCH)
        throw new InstaCurlArgumentException("The EnumAction value ($value) provided is ilegal!!!.");

      parent::__construct($value);
    }

    /**
     * 
     * @return string
     */
    public function getCmdSubQuery() {
      switch ($this->enumValue) {
        case EnumAction::CMD_LIKE : $str = "like";
          break;
        case EnumAction::CMD_FOLLOW : $str = "follow";
          break;
        case EnumAction::CMD_UNFOLLOW: $str = "unfollow";
          break;
        default: $str = "NO_ACTION_DEFINED!!!";
      }

      return $str;
    }

    /**
     * 
     * @return string
     */
    public function getObjetiveUrl() {
      switch ($this->enumValue) {
        case EnumAction::CMD_LIKE:
          $str = "web/likes";
          break;

        case EnumAction::CMD_FOLLOW:
        case EnumAction::CMD_UNFOLLOW:
          $str = "web/friendships";
          break;

        default: $str = "NO_OBJETIVE_DEFINED!!!";
      }

      return $str;
    }

    /**
     * 
     * @return string
     */
    function __toString() {
      switch ($this->enumValue) {
        case EnumAction::CMD_LIKE : $str = "CMD_LIKE";
          break;
        case EnumAction::CMD_FOLLOW : $str = "CMD_FOLLOW";
          break;
        case EnumAction::CMD_UNFOLLOW : $str = "CMD_UNFOLLOW";
          break;
        case EnumAction::CMD_CHECKPOINT : $str = "CMD_CHECKPOINT";
          break;
        case EnumAction::GET_POST : $str = "GET_POST";
          break;
        case EnumAction::GET_FIRST_POST : $str = "GET_FIRST_POST";
          break;
        case EnumAction::GET_FOLLOWERS : $str = "GET_FOLLOWERS";
          break;
        case EnumAction::GET_FOLLOWED : $str = "GET_FOLLOWED";
          break;
        case EnumAction::GET_OWNER_POST_DATA: $str = "GET_OWNER_POST_DATA";
          break;
        case EnumAction::GET_PROFILE_INFO : $str = "GET_PROFILE_INFO";
          break;
        case EnumAction::GET_CHALLENGE_CODE: $str = "GET_CHALLENGE_CODE";
          break;
        case EnumAction::GET_TOP_SEARCH : $str = "GET_TOP_SEARCH";
          break;
      }

      return $str;
    }

  }

  /**
   * 
   * Define
   * 
   * @category Third-Party Instagram API
   * 
   * @access public
   * .
   */
  class InstaCurlMgr {

    private $Config;
    private $InstaId;
    private $MediaStr;
    private $Challenge;
    private $ActionType;
    private $ResourceId;
    private $ProfileType;
    private $ReferencePost;
    private $Headers = array(array());
    private $InstaURL = array(array());

    /**
     * 
     * @param \InstaApiWeb\EnumEntity $profile
     * @param \InstaApiWeb\EnumAction $action
     */
    public function __construct(EnumEntity $profile, EnumAction $action) {

      $this->InstaId = null;
      $this->MediaStr = null;
      $this->Challenge = null;
      $this->ResourceId = null;
      $this->ReferencePost = null;
      $this->ProfileType = $profile;
      $this->ActionType = $action;

      /* Instagram Base URLs */
      $this->InstaURL['Base'] = "https://www.instagram.com";
      $this->InstaURL['Graphql'] = "https://www.instagram.com/graphql/query";
      $this->InstaURL['TopSearch'] = "https://www.instagram.com/web/search/topsearch";

      /* Instagram cUrl Headers definitions */
      $this->Headers['Host'] = "Host: www.instagram.com";
      $this->Headers['X-Post'] = "-X POST";
      $this->Headers['Cookie-public'] = "-H 'cookie: mid=W1ZcJgAEAAFqS5yqkDU8yMWgOgsB; csrftoken=gcEQPaqCjzgQ944fOec5QYec86aKVfGU'";
      $this->Headers['Cookie-small'] = "-H 'Cookie: mid=%s; sessionid=%s; csrftoken=%s; ds_user_id=%s'";
      $this->Headers['Cookie-big'] = "-H 'Cookie: mid=%s; sessionid=%s; s_network=; ig_pr=1; ig_vw=1855; csrftoken=%s; ds_user_id=%s'";
      $this->Headers['Origin'] = "-H 'Origin: https://www.instagram.com'";
      $this->Headers['AcceptEncodingGzip'] = "-H 'Accept-Encoding: gzip, deflate'";
      $this->Headers['AcceptEncodingSdch'] = "-H 'Accept-Encoding: deflate, sdch'";
      $this->Headers['AcceptLanguage'] = "-H 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4'";
      $this->Headers['UserAgent'] = "-H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:49.0) Gecko/20100101 Firefox/49.0'";
      $this->Headers['X-Requested'] = "-H 'X-Requested-with: XMLHttpRequest'";
      $this->Headers['ContentType'] = "-H 'content-type: application/x-www-form-urlencoded'";
      $this->Headers['AcceptAll'] = "-H 'Accept: */*'";
      $this->Headers['AcceptJson'] = "-H 'Accept: application/json'";
      $this->Headers['Referer'] = "-H 'Referer: https://www.instagram.com/'";
      $this->Headers['Authority'] = "-H 'Authority: www.instagram.com'";
      $this->Headers['X-CSRFToken'] = "-H 'X-CSRFToken: %s'";
      $this->Headers['X-Instagram-Ajax'] = "-H 'X-Instagram-Ajax: dad8d866382b'";
      $this->Headers['ContentLength'] = "-H 'Content-Length: 0'";
      $this->Headers['compressed'] = "--compressed";

      // Singlenton CI
      //$ci = &get_instance();
    }

    /**
     * 
     * @param string $insta_id
     */
    public function setInstaId(string $insta_id) {
      $this->InstaId = $insta_id;
    }

    /**
     * 
     * @param string $rsrc_id
     */
    public function setResourceId(string $rsrc_id) {
      $this->ResourceId = $rsrc_id;
    }

    /**
     * 
     * @param string $reference
     */
    public function setReferencePost(string $reference) {
      $this->ReferencePost = $reference;
    }

    /**
     * 
     * @param string $challenge
     */
    public function setChallengeData(string $challenge) {
      $this->Challenge = $challenge;
    }

    /**
     * 
     * @param string $id
     * @param int $first
     * @param string $cursor
     */
    public function setMediaData(string $id, int $first, string $cursor = null) {
      $tag = ($this->ProfileType->getEnumValue() == EnumEntity::HASHTAG) ? "tag_name" : "id";
      $str_cur = ($cursor != null) ? sprintf(",\"after\":\"%s\"", $cursor) : "";
      $this->MediaStr = sprintf("{\"%s\":\"%s\",\"first\":\"%s\"%s}", $tag, $id, $first, $str_cur);
    }

    /**
     * 
     * @param Proxy $proxy
     * @param Cookies $cookies
     * @param string $resource_id
     * @return type
     * @throws InstaCurlActionException
     */
    public function make_curl_str(Proxy $proxy = null, Cookies $cookies = null) {
      $profile = $this->ProfileType->getEnumValue();
      $action = $this->ActionType->getEnumValue();

      switch ($profile + $action) {
        case EnumEntity::CLIENT + EnumAction::CMD_LIKE:
        case EnumEntity::CLIENT + EnumAction::CMD_FOLLOW:
        case EnumEntity::CLIENT + EnumAction::CMD_UNFOLLOW:
          if ($this->ResourceId == null) {
            throw new InstaCurlArgumentException("The parameter (resource_id) was not given!!!. Use: setResourceId(string).");
          }
          $str_curl = $this->cmd_friendships($cookies, $this->ResourceId, $proxy);

          break;

        case EnumEntity::HASHTAG + EnumAction::GET_OWNER_POST_DATA:
          if ($this->ReferencePost == null) {
            throw new InstaCurlArgumentException("The parameter (reference_post) was not given!!!. Use: setReferencePost(string).");
          }
          $str_curl = $this->get_user_info_post($proxy, $cookies, $this->ReferencePost);
          break;

        case EnumEntity::GEO + EnumAction::GET_OWNER_POST_DATA:
          if ($this->ReferencePost == null) {
            throw new InstaCurlArgumentException("The parameter (reference_post) was not given!!!.Use: setReferencePost(string).");
          }
          if ($this->InstaId == null) {
            throw new InstaCurlArgumentException("The parameter (insta_id) was not given!!!.Use: setInstaId(string).");
          }
          $str_curl = $this->get_owner_post($proxy, $cookies, $this->ReferencePost, $this->InstaId);
          break;

        case EnumEntity::GEO + EnumAction::GET_POST:
        case EnumEntity::PERSON + EnumAction::GET_POST:
        case EnumEntity::HASHTAG + EnumAction::GET_POST:
        case EnumEntity::PERSON + EnumAction::GET_FOLLOWERS:
          if ($this->MediaStr == null) {
            throw new InstaCurlMediaException("The media-cUrl parameters (id, cursor, first) have not been established!!!. Use: setMediaData (string, int, string).");
          }
          $str_curl = $this->get_post($proxy, $cookies, $this->MediaStr);
          break;
        default:
          throw new InstaCurlActionException("The action required: ($this->ActionType) is not applied to: ($this->ProfileType)!!!.");
      }

      return $str_curl;
    }

    public function make_curl_obj(Proxy $proxy = null, Cookies $cookies = null) {
      $profile = $this->ProfileType->getEnumValue();
      $action = $this->ActionType->getEnumValue();

      switch ($profile + $action) {
        case EnumEntity::CLIENT + EnumAction::CMD_CHECKPOINT:
          //$obj_curl = 
          break;

        case EnumEntity::CLIENT + EnumAction::GET_CHALLENGE_CODE:
          //$obj_curl = 
          break;

        case EnumEntity::CLIENT + EnumAction::GET_TOP_SEARCH:
          //$obj_curl = 
          break;

        case EnumEntity::GEO + EnumAction::GET_PROFILE_INFO:
        case EnumEntity::PERSON + EnumAction::GET_PROFILE_INFO:
        case EnumEntity::HASHTAG + EnumAction::GET_PROFILE_INFO:
          if ($this->ReferencePost == null) {
            throw new InstaCurlArgumentException("The parameter (reference_post) was not given!!!.Use: setReferencePost(string).");
          }
          $obj_curl = $this->get_profile_info();
          break;

        default:
          throw new InstaCurlActionException("The action required: ($this->ActionType) is not applied to: ($this->ProfileType)!!!.");
      }

      return $obj_curl;
    }

    /**
     * Funcion de Utileria.
     * Construye cUrl tipo GET para obtener un post para los perfiles de Instagram ==> [Geo, HashTag, Person]  
     */
    private function get_post(Proxy $proxy = null, Cookies $cookies = null, string $media_str) {
      // Paso 1. configuracion inicial de la curl
      $curl_str = sprintf("curl %s '%s/?query_hash=%s&variables=%s'",
              ($proxy != null) ? $proxy->ToString() : "",
              $this->InstaURL['Graphql'], $this->ProfileType->getHashQuery(), urlencode($media_str));

      // Paso 2. agregando la cookies a la curl
      if ($cookies != null) {
        $ck = sprintf("%s", $this->Headers['Cookie-big']);
        $ck = sprintf($ck, $cookies->Mid, $cookies->SessionId, $cookies->CsrfToken, $cookies->DsUserId);
        $curl_str = sprintf("%s %s", $curl_str, $ck);

        $csrf = sprintf("%s", $this->Headers['X-CSRFToken']);
        $csrf = sprintf($csrf, $cookies->CsrfToken);
        $curl_str = sprintf("%s %s", $curl_str, $csrf);
      }

      // Paso 3. agregando el resto de los headers
      $curl_str = sprintf("%s %s %s %s %s %s %s %s %s %s %s", $curl_str,
              $this->Headers['Origin'],
              $this->Headers['AcceptEncodingGzip'],
              $this->Headers['AcceptLanguage'],
              $this->Headers['UserAgent'],
              $this->Headers['XRequested'],
              $this->Headers['ContentType'],
              $this->Headers['Accept'],
              $this->Headers['Referer'],
              $this->Headers['Authority'],
              $this->Headers['compressed']);

      return $curl_str;
    }

    /**
     * Funcion de Utileria.
     * 
     */
    private function get_owner_post(Proxy $proxy, Cookies $cookies, string $reference_post, string $insta_id = "") {
      // Paso 1. configuracion inicial de la curl
      $sub = sprintf("%s/p", $this->InstaURL['Base']);
      if ($this->ProfileType->getEnumValue() == EnumEntity::HASHTAG)
        $sub = sprintf("%s/%s/?__a=1", $sub, $this->ReferencePost);
      else
        $sub = sprintf("%s/%s/?taken-at=%s&__a=1", $sub, $this->ReferencePost, $this->InstaId);

      $curl_str = sprintf("curl %s '%s'", $proxy->ToString(), $sub);

      // Paso 2. agregando la cookies a la curl
      if ($cookies != null) {
        $ck = sprintf("%s", $this->Headers['Cookie-big']);
        $ck = sprintf($ck, $cookies->Mid, $cookies->SessionId, $cookies->CsrfToken, $cookies->DsUserId);
        $curl_str = sprintf("%s %s", $curl_str, $ck);
      }

      // Paso 3. agregando el resto de los headers
      $curl_str = sprintf("%s %s %s %s %s %s %s %s %s", $curl_str,
              $this->Headers['AcceptEncodingGzip'],
              $this->Headers['XRequested'],
              $this->Headers['AcceptLanguage'],
              $this->Headers['UserAgent'],
              $this->Headers['Accept'],
              $this->Headers['Referer'],
              $this->Headers['Authority'],
              $this->Headers['compressed']);

      return $curl_str;
    }

    /**
     * Funcion de Utileria.
     * 
     */
    private function get_profile_info(Proxy $proxy, Cookies $cookies) {
      /* if ($ref_prof == "" || $ref_prof == NULL) {
        throw new \Exception("This was and empty or null referece profile (ref_prof)");
        } */
      $csrftoken = isset($cookies->csrftoken) ? $cookies->csrftoken : 0;
      $ds_user_id = isset($cookies->ds_user_id) ? $cookies->ds_user_id : 0;
      $sessionid = isset($cookies->sessionid) ? $cookies->sessionid : 0;
      $mid = isset($cookies->mid) ? $cookies->mid : 0;
      $headers = array();
      $headers[] = $this->Headers['Host'];
      $headers[] = $this->Headers['UserAgent'];
      $headers[] = $this->Headers['AcceptAll'];
      $headers[] = $this->Headers['AcceptLanguage'];
      $headers[] = $this->Headers['AcceptEncodingSdch'];
      $headers[] = "Referer: https://www.instagram.com/";
      $headers[] = "Content-Type: application/x-www-form-urlencoded";
      $headers[] = "X-Requested-With: XMLHttpRequest";
      $headers[] = "Authority: www.instagram.com";
      if ($cookies != NULL) {
        $headers[] = "X-CSRFToken: $csrftoken";
        $headers[] = "Cookie: mid=$mid; sessionid=$sessionid; s_network=; ig_pr=1; ig_vw=1855; csrftoken=$csrftoken; ds_user_id=$ds_user_id";
      }
      $url = InstaURLs::TopSearch;
      $url .= "?context=blended&query=$ref_prof";
      $ch = curl_init(InstaURLs::Instagram);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

      if ($proxy != NULL) {
        curl_setopt($ch, CURLOPT_PROXY, $proxy->ip);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy->port);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxy->user:$proxy->password");
      }
      $output = curl_exec($ch);
      //$string = curl_error($ch);
      curl_close($ch);
      return json_decode($output);
    }

    private function get_challenge() {
      $ch = curl_init(InstaURLs::Instagram);
      $csrftoken = $this->get_insta_csrftoken($ch);
      $urlgen = $this->get_cookies_value('urlgen');
      $mid = $this->get_cookies_value('mid');
      $rur = $this->get_cookies_value('rur');
      $ig_vw = $this->get_cookies_value('ig_vw');
      $ig_pr = $this->get_cookies_value('ig_pr');
      $ig_vh = $this->get_cookies_value('ig_vh');
      $ig_or = $this->get_cookies_value('ig_or');

      $url = InstaURLs::Instagram;
      $url .= "/" . $challenge;

      $cookies = new \stdClass();
      $cookies->csrftoken = $csrftoken;
      $cookies->mid = $mid;
      $cookies->checkpoint_url = $challenge;

      $headers = array();
      $headers[] = "Origin: https://www.instagram.com";
      $headers[] = "User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0' -H 'Accept: */*";
      $headers[] = "Accept-Language: en-US,en;q=0.5";
      $headers[] = "Referer: $url";
      $headers[] = "X-CSRFToken: $csrftoken";
      $headers[] = "X-Instagram-AJAX: 1";
      $headers[] = "Content-Type: application/x-www-form-urlencoded";
      $headers[] = "X-Requested-With: XMLHttpRequest";
      $headers[] = "Cookie: csrftoken=$csrftoken; mid=$mid; rur=$rur; ig_vw=$ig_vw; ig_pr=$ig_pr; ig_vh=$ig_vh; ig_or=$ig_or";
      $headers[] = "Connection: keep-alive";
      $postinfo = "choice=$choice";

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      //curl_setopt($ch, CURLOPT_POST, true);
      //            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
      //            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      return $ch;
    }

    /**
     * Funcion de Utileria.
     * Construye cUrl tipo CMD para las acciones de los friendship ==> [Follow, Unfollow, Like].
     */
    private function cmd_friendships(Cookies $cookies, string $resource_id, Proxy $proxy = null) {
      // Paso 1. configuracion inicial de la curl
      $curl_str = sprintf("curl %s %s/%s/%s/%s/",
              ($proxy != null) ? $proxy->ToString() : "",
              $this->InstaURL['Base'], $this->ActionType->getObjetiveUrl(), $resource_id, $this->ActionType->getCmdSubQuery());

      // Paso 2. agregando la cookies a la curl
      if ($cookies != null) {
        $curl_str = sprintf("%s %s", $curl_str, $this->Headers['X-Post']);
        $curl_str = sprintf("%s %s", $curl_str, $this->Headers['Cookie-small']);
        $curl_str = sprintf($curl_str, $cookies->Mid, $cookies->SessionId, $cookies->CsrfToken, $cookies->DsUserId);

        $csrf = sprintf("%s", $this->Headers['X-CSRFToken']);
        $csrf = sprintf($csrf, $cookies->CsrfToken);
        $curl_str = sprintf("%s %s", $curl_str, $csrf);
      }

      // Paso 3. agregando el resto de los headers
      $curl_str = sprintf("%s %s %s %s %s %s %s %s %s %s %s %s %s", $curl_str,
              $this->Headers['Origin'],
              $this->Headers['AcceptEncodingGzip'],
              $this->Headers['AcceptLanguage'],
              $this->Headers['UserAgent'],
              $this->Headers['XRequested'],
              $this->Headers['X-Instagram-Ajax'],
              $this->Headers['ContentType'],
              $this->Headers['Accept'],
              $this->Headers['Referer'],
              $this->Headers['Authority'],
              $this->Headers['ContentLength'],
              $this->Headers['compressed']);

      return $curl_str;
    }

    private function cmd_checkpoint() {
      // INSTACLIENT - make_checkpoint
      $csrftoken = $this->cookies->csrftoken;
      $mid = $this->cookies->mid;
      $url = $this->InstaURL['Base'] . "/" . $this->cookies->checkpoint_url;
      $ch = curl_init($this->InstaURL['Base']);

      $postinfo = "security_code=$code";

      $headers = array();
      $headers[] = $this->Headers['Origin'];
      $headers[] = $this->Headers['UserAgent'];
      $headers[] = $this->Headers['AcceptAll'];
      $headers[] = $this->Headers['AcceptLanguage'];
      $headers[] = $this->Headers['AcceptEncodingGzip'];
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

      return $ch;
    }

  }

}
