<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author:      Carlos R. Herrera Marquez <cherreram2012@gmail.com>
 * 
 * @description: define for CodeIgniter environment the paths of projects  
 *               resources.
 */
/*
  |--------------------------------------------------------------------------
  | Paths de las clases del Negocio.
 */

$config['business-class'] = getcwd() . '/application/business/Business.php';
$config['business-client-class'] = getcwd() . '/application/business/Client.php';
$config['business-daily_report-class'] = getcwd() . '/application/business/DailyReport.php';
$config['business-black_and_white_list-class'] = getcwd() . '/application/business/BlackAndWhiteList.php';
$config['business-black_and_white_item-class'] = getcwd() . '/application/business/BlackAndWhiteItem.php';
$config['business-user-class'] = getcwd() . '/application/business/User.php';
$config['business-admin-class'] = getcwd() . '/application/business/Admin.php';
$config['business-attendent-class'] = getcwd() . '/application/business/Attendent.php';

//$config['business-geo_profile-class'] = getcwd() . '/application/business/BusinessGeoProfile.php';
//$config['business-hash_profile-class'] = getcwd() . '/application/business/BusinessHashProfile.php';
//$config['business-person_profile-class'] = getcwd() . '/application/business/BusinessPersonProfile.php';
$config['business-ref_profile-class'] = getcwd() . '/application/business/ReferenceProfile.php';
$config['business-reference-profiles-class'] = getcwd() . '/application/business/ReferenceProfiles.php';
//$config['business-person_profiles-class'] = getcwd() . '/application/business/PersonProfiles.php';
//$config['business-geolocation_profiles-class'] = getcwd() . '/application/business/GeolocationProfiles.php';
//$config['business-hashtag_profiles-class'] = getcwd() . '/application/business/HashtagProfiles.php';
$config['business-loader-class'] = getcwd() . '/application/business/Loader.php';
$config['business-insta_commands-class'] = getcwd() . '/application/business/InstaCommands.php';
$config['business-insta-curl-info-class'] = getcwd() . '/application/business/InstaCurlInfo.php';
$config['business-client-class'] = getcwd() . '/application/business/Client.php';
$config['business-cookies_request-class'] = getcwd() . '/application/business/CookiesRequest.php';
$config['business-own_exception-class'] = getcwd() . '/application/business/OwnException.php';
$config['business-proxy-class'] = getcwd() . '/application/business/Proxy.php';
$config['business-proxy_manager-class'] = getcwd() . '/application/business/ProxyManager.php';
$config['business-status_profiles-class'] = getcwd() . '/application/business/StatusProfiles.php';
$config['business-user-class'] = getcwd() . '/application/business/User.php';
$config['business-system_config-class'] = getcwd() . '/application/business/SystemConfig.php';
$config['business-user_role-class'] = getcwd() . '/application/business/UserRole.php';
$config['business-user_status-class'] = getcwd() . '/application/business/UserStatus.php';
$config['business-washdog_type-class'] = getcwd() . '/application/business/WashdogType.php';

//Clases del negocio del Worker
$config['business-daily_work-class'] = getcwd() . '/application/business/Worker/DailyWork.php';
$config['business-error_type-class'] = getcwd() . '/application/business/Worker/ErrorType.php';
$config['business-robot-class'] = getcwd() . '/application/business/Worker/Robot.php';
$config['business-worker-class'] = getcwd() . '/application/business/Worker/Worker.php';

//Clases del negocio del Response
$config['business-dumbu_response-class'] = getcwd() . '/application/business/SystemResponse/DUMBUResponse.php';
$config['business-payment_response-class'] = getcwd() . '/application/business/SystemResponse/PaymentResponse.php';
$config['business-reference_profile_response-class'] = getcwd() . '/application/business/SystemResponse/ReferenceProfileResponse.php';
$config['business-response-class'] = getcwd() . '/application/business/Response/Response.php';
$config['business-response_inserted_object-class'] = getcwd() . '/application/business/Response/ResponseInsertedObject.php';
$config['business-response-reference-profiles-class'] = getcwd() . '/application/business/Response/ResponseReferenceProfiles.php';
$config['business-response_black_and_white_list-class'] = getcwd() . '/application/business/Response/ResponseBlackAndWhiteList.php';

/*
  |--------------------------------------------------------------------------
  | Paths de los recursos de terceros.
 */

//Recursos de la InstaApiWeb que viraron tambien librerias (nombreRecurso_lib)
$config['thirdparty-insta_geo_profile-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaGeoProfile.php';
$config['thirdparty-insta_ref_profile-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaReferenceProfile.php';
$config['thirdparty-insta_hash_profile-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaHashProfile.php';
$config['thirdparty-insta_person_profile-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaPersonProfile.php';
$config['thirdparty-media-resource'] = getcwd() . '/application/third_party/InstaApiWeb/Media (deprecated).php';
$config['thirdparty-proxy-resource'] = getcwd() . '/application/third_party/InstaApiWeb/Proxy.php';
$config['thirdparty-insta_api-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaApi (deprecated).php';
$config['thirdparty-insta_curl_mgr-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaCurlMgr.php';
$config['thirdparty-insta_client-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaClient.php';
$config['thirdparty-insta_profile_list-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaProfileList (deprecated).php';
$config['thirdparty-insta_profile-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaProfile.php';

//Recursos solamente de la InstaApiWeb
$config['thirdparty-insta_url-resource'] = getcwd() . '/application/third_party/InstaApiWeb/InstaURLs (deprecated).php';
$config['thirdparty-profile_type-resource'] = getcwd() . '/application/third_party/InstaApiWeb/ProfileType (deprecated).php';
$config['thirdparty-verification_choice-resource'] = getcwd() . '/application/third_party/InstaApiWeb/VerificationChoice.php';

//Otros recursos dentro de InstaApiWeb
$config['thirdparty-cookies-resource'] = getcwd() . '/application/third_party/InstaApiWeb/Cookies.php';

/*
  | --------------------------------------------------------------------------
  | Paths de las Clases Exception
 */
//Exception de la BD
$config['db-exception-class'] = getcwd() . '/application/business/OwnException.php';

//Exception de la InstaApiWeb  
$config['curl_nertwork-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/CurlNertworkException (deprecated).php';
$config['end_cursor-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/EndCursorException.php';
$config['code-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/ExceptionCode.php';

$config['insta-cookies-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/InstaCookiesException.php';
$config['insta-password-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/InstaPasswordException.php';
$config['insta-checkpoint-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/InstaCheckpointException.php';
$config['insta-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/InstaException.php';
//$config['wrong_end_cursor-exception-class'] = getcwd().'/application/third_party/InstaApiWeb/Exception/WrongEndCursorException.php';

$config['insta-curl-exception-class'] = getcwd() . '/application/third_party/InstaApiWeb/Exception/InstaCurlException.php';

/*
  |--------------------------------------------------------------------------
  | Paths de las Clases Response de la InstaApiWeb
 */

$config['thirdparty-client_response-class'] = getcwd() . '/application/third_party/InstaApiWeb/Response/ClientResponse.php';
$config['thirdparty-response-class'] = getcwd() . '/application/third_party/InstaApiWeb/Response/Response.php';
$config['thirdparty-login_response-class'] = getcwd() . '/application/third_party/InstaApiWeb/Response/LoginResponse.php';
$config['thirdparty-end_cursor_response-class'] = getcwd() . '/application/third_party/InstaApiWeb/Response/EndCursorResponse.php';
$config['thirdparty-followers-response-class'] = getcwd() . '/application/third_party/InstaApiWeb/Response/FollowersResponse.php';

/*
  |--------------------------------------------------------------------------
  | Paths de las librerias Email y Payment
 */

//Librerias de Email 
$config['email-allin-libraries'] = getcwd() . '/application/libraries/Email/Allin.php';
$config['email-gmail-libraries'] = getcwd() . '/application/libraries/Email/Gmail.php';

//Librerias de Payment
$config['payment-mundipagg-libraries'] = getcwd() . '/application/libraries/Payment/Mundipagg.php';
$config['payment-vindi-libraries'] = getcwd() . '/application/libraries/Payment/Vindi.php';

//Librerias Api Web
$config['reference-profile_libraries'] = getcwd() . '/application/libraries/InstaApiWeb/InstaReferenceProfile_lib.php';

$config['business-error-codes-class'] = getcwd() . '/application/business/ErrorCodes.php';
$config['business-own-exception-class'] = getcwd() . '/application/business/OwnException.php';

/*
  |--------------------------------------------------------------------------
  | Paths de las Clases Response del Negocio
 */
$config['business-response-class'] = getcwd() . '/application/business/Response/Response.php';
$config['business-response-login-token-class'] = getcwd() . '/application/business/Response/ResponseLoginToken.php';
?>

