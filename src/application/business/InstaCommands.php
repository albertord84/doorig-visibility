<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace business {
    
    require_once config_item('business-class');

    /**
     * Description of InstaCommands
     *
     * @author albertord
     */
    class InstaCommands extends Business {

        public function __construct() {
            parent::__construct();
        }

        static function get_profile_public_data(string $profile_name) {
            try {
                $content = @file_get_contents("https://www.instagram.com/$profile_name/", false);
                //echo $content;
                $doc = new \DOMDocument();
                //$doc->loadXML($content);
                $substr2 = NULL;
                $loaded = @$doc->loadHTML('<?xml encoding="UTF-8">' . $content);
                if ($loaded) {
                    //var_dump($doc->textContent);
                    // Copiar a partir de donde comienza el json deseado
                    $search = '@context';
                    $start = strpos($doc->textContent, $search) - 2; // |{"@context
                    $substr1 = substr($doc->textContent, $start);
                    var_dump($substr1);
                    
                    // Copiar hasta donde termina el json deseado
                    //$search = "/<//script/>";
                    $search = "window._sharedData";
                    $end = strpos($substr1, $search) - 3; // "}| window._sharedData;
                    $substr2 = substr($substr1, 0, $end);
                    
                    return json_decode($substr2);
                } else {
                    print "<br>\nProblem parsing document:<br>\n";
                    var_dump($doc);
                }
                return intval($substr2) ? intval($substr2) : 0;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

    }

}
