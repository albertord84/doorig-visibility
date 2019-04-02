<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('T')) {

    function T($token, $lang = "PT") {
        $ci = & get_instance();
        $ci->load->model('Translation_model');
        $translation = $ci->Translation_model->get_text_by_token($token, $lang);
        return $translation ? $translation : $token;
    }

}