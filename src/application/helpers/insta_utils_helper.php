<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('conver_instanumber_to_number')) {

    function conver_instanumber_to_number($insta_number) {
        $M = strpos($insta_number, 'm');
        $K = strpos($insta_number, 'k');
        $insta_number = str_replace(',', '', $insta_number);
        $insta_number = str_replace('.', '', $insta_number);
        $insta_number = (int)$insta_number;
        if ($M)
            $insta_number = $insta_number * 100000;
        if ($K)
            $insta_number = $insta_number * 100;

        return $insta_number;
    }

}
