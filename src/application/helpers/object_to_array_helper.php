<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('object_to_array')) {

    function object_to_array($object, int $level = 0) {
        static $mark;
        if ($level == 0) $mark = array();
        if ($level <= 4) {
            if (is_object($object)) {
                $reflect = new \ReflectionClass($object);
                if (isset($mark[$reflect->getName()]) && isset($object->Id) && $mark[$reflect->getName()] == $object->Id)
                    return null;
                $mark[$reflect->getName()] = isset($object->Id) ? $object->Id : true;
                $object = (array) $object;
            }
            if (is_array($object)) {
                $new = array();
                foreach ($object as $key => $val) {
                    $x = object_to_array($val, $level + 1);
                    $new[$key] = $x;
                }
            } else {
                $new = $object;
            }
            return $new;
        }
    }

}