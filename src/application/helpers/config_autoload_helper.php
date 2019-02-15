<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('config_autoload')) {

    function config_autoload() {
        $ci = & get_instance();
        $ci->load->model('System_config_model');
        $GLOBALS['sistem_config'] = $ci->System_config_model->load();

        // Force load ErrorCodes contructor to automatically translate messages 
        require_once config_item('business-error-codes-class');
        $ErrorCodes = new \business\ErrorCodes();
    }

    config_autoload();
}
