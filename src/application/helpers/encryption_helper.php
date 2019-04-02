<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('mycrypt')) {
    function mycrypt($str) {
        $seed = $GLOBALS["sistem_config"]->ENCRYPTION_KEY;
        $key_number = md5($seed);
        $cipher = "aes-256-ctr";
        $tag = 'GCM';
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $str = openssl_encrypt ($str, $cipher, $key_number,$options=0, '1234567812345678');
        return base64_encode($str);
    }
}

if (!function_exists('mydecrypt')) {
    function mydecrypt($str_encrypted) {
        $seed = $GLOBALS["sistem_config"]->ENCRYPTION_KEY;
        $key_number = md5($seed);
        $cipher = "aes-256-ctr";
        $tag = 'GCM';
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $str_encrypted= base64_decode($str_encrypted);
        $str = openssl_decrypt ($str_encrypted, $cipher, $key_number,$options=0, '1234567812345678');
        return $str;
    }
}