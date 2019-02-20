<?php

/**
 * Uncoment this lines (ln 53 set_error_handler("my_error_handler")) if you want your own exception throw;
 */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('my_error_handler')) {

    /*
      |--------------------------------------------------------------------------
      | Registra un controlador-de-Errores personalizada que transforma los errores
      | de PHP en excepciones.
    * throw exceptions based on E_* error types
    */
    function my_error_handler($err_severity, $err_msg, $err_file, $err_line, array $err_context)
    {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) { return false;}
        switch($err_severity)
        {
            case E_ERROR:               throw new ErrorException            ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_WARNING:             throw new WarningException          ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_PARSE:               throw new ParseException            ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_NOTICE:              throw new NoticeException           ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_CORE_ERROR:          throw new CoreErrorException        ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_CORE_WARNING:        throw new CoreWarningException      ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_COMPILE_ERROR:       throw new CompileErrorException     ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_COMPILE_WARNING:     throw new CoreWarningException      ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_USER_ERROR:          throw new UserErrorException        ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_USER_WARNING:        throw new UserWarningException      ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_USER_NOTICE:         throw new UserNoticeException       ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_STRICT:              throw new StrictException           ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_RECOVERABLE_ERROR:   throw new RecoverableErrorException ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_DEPRECATED:          throw new DeprecatedException       ($err_msg, -1, $err_severity, $err_file, $err_line);
            case E_USER_DEPRECATED:     throw new UserDeprecatedException   ($err_msg, -1, $err_severity, $err_file, $err_line);
        }
    };

    class WarningException              extends ErrorException {}
    class ParseException                extends ErrorException {}
    class NoticeException               extends ErrorException {}
    class CoreErrorException            extends ErrorException {}
    class CoreWarningException          extends ErrorException {}
    class CompileErrorException         extends ErrorException {}
    class CompileWarningException       extends ErrorException {}
    class UserErrorException            extends ErrorException {}
    class UserWarningException          extends ErrorException {}
    class UserNoticeException           extends ErrorException {}
    class StrictException               extends ErrorException {}
    class RecoverableErrorException     extends ErrorException {}
    class DeprecatedException           extends ErrorException {}
    class UserDeprecatedException       extends ErrorException {}

    if (isset($_SERVER['CI_ENV']) && ($_SERVER['CI_ENV'] == 'production'))
        set_error_handler("my_error_handler");
}

if (!function_exists('my_exception_handler')) {
    /*
      |--------------------------------------------------------------------------
      | Registra un manejador de excepción no capturada.
     */

    function my_exception_handler($error) {
        echo "<pre>";
        echo "<h2>Exception no manipulada.... tratada por my_exception_handler</h2>";
        echo "<b>Code: </b>" . $error->getCode() . "<br>";
        echo "<b>Message: </b>" . $error->getMessage() . "<br>";
        echo "<b>File: </b>" . $error->getFile() . "<br>";
        echo "<b>Line: </b>" . $error->getLine() . "<br>";
        echo "<b>Trace: </b>" . $error->getTraceAsString();
        echo '</pre>';

        $ci = &get_instance();
        if ($ci->db->error()['code'] != 0) {
            echo "<br><br>";
            echo count($ci->db->error()) . "<br>";
            echo $ci->db->error()['code'] . "<br>";
            print_r($ci->db->error());
        }
        
//        throw new ErrorException($error->getMessage(), $error->getCode(), 0, $error->getFile(), $error->getLine()); 
        //throw new \Exception("Exception", -1); 
        //header("HTTP/1.0 500 Internal Server Error"); 
    }

    set_exception_handler("my_exception_handler");
}

