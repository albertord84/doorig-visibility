<?php

namespace business {

    require_once config_item('business-own-exception-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ErrorCodes {

        const EMAIL_NOT_FOUND = 21;
        const WRONG_PASSWORD = 22;
        const EMAIL_ALREADY_EXIST = 23;
        const CLIENT_DATA_NOT_FOUND = 24;
        const DB_ERROR = 25;
        const CLIENT_ID_NOT_FOUND = 26;
        const GMAIL_ERROR_SEND = 27;
        const VERIFICATION_CODE_DONOT_MATCH = 28;
        const VALIDATION_TOKEN_NOT_FOUND = 28;

        public static $Messages = array(
            ErrorCodes::EMAIL_NOT_FOUND => "Email não encontrado",
            ErrorCodes::WRONG_PASSWORD => "O password não coicide para o email informado",
            ErrorCodes::EMAIL_ALREADY_EXIST => "O email informado ja existe",
            ErrorCodes::CLIENT_DATA_NOT_FOUND => "Os dados do cliente não foram encontrados",
            ErrorCodes::CLIENT_ID_NOT_FOUND => "Id de cliente não encontrado",
            ErrorCodes::DB_ERROR => "Database error",
            ErrorCodes::VERIFICATION_CODE_DONOT_MATCH => "Codigo de verificação não coinside com o enviado",
            ErrorCodes::VALIDATION_TOKEN_NOT_FOUND => "Codigo de validação não encontrado",
            ErrorCodes::GMAIL_ERROR_SEND => "Error sending email"
        );

        public function __construct() {
            foreach (ErrorCodes::$Messages as $code => $message) {
                T($message);
            }
        }

        static public function Defines($const) {
            $cls = new ReflectionClass(__CLASS__);
            foreach ($cls->getConstants() as $key => $value) {
                if ($value == $const) {
                    return true;
                }
            }

            return false;
        }

        static function getException(int $code) {
            $ex = new \Exception(ErrorCodes::$Messages[$code], $code);
            return $ex;
        }

    }

}
