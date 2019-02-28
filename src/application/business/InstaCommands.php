<?php

//ini_set('xdebug.var_display_max_depth', 256);
//ini_set('xdebug.var_display_max_children', 256);
//ini_set('xdebug.var_display_max_data', 1024);

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
                preg_match_all('/<[\s]*meta[\s]*(name|property)="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $content, $match);
                var_dump($match); // exit;
                
                $profile_data = new \stdClass;
                $profile_data->description = self::get_metadata_value($match, "og:description");
                $profile_data->image = self::get_metadata_value($match, "og:image");
                $profile_data->title = self::get_metadata_value($match, "og:title");
                $profile_data->url = self::get_metadata_value($match, "og:url");
                
                $doc = new \DOMDocument();
                $loaded = @$doc->loadHTML('<?xml encoding="UTF-8">' . $content);
                //print_r($content);die;
                if ($loaded) {
                    // ALBERTO: NAO BORRAR NUNCA!!!!
                    $json_str_reference = '@context';
                    $profile_data->json = self::search_by_profile_json_info($doc->textContent, $json_str_reference);
                    
                    //$json_str_reference = 'meta content';
                    //$json = self::search_by_beeline_info($doc->textContent, $json_str_reference);
                } else {
                    print "<br>\nProblem parsing document:<br>\n";
                    var_dump($doc);
                }
                return $profile_data;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        
        static function get_metadata_value(array $match, string $lock4) {
            foreach ($match[2] as $key => $value) {
                if ($value == $lock4) {
                    return $match[3][$key];
                }
            }
        }

        /**
         * 
         * @param string $textContent
         * @param string $json_str_reference
         */
        static function search_by_profile_json_info(string $textContent, string $json_str_reference) {
            // Copiar a partir de donde comienza el json deseado
            $start = strpos($textContent, $json_str_reference) - 2; // |{"@context
            $substr1 = substr($textContent, $start);
            //var_dump($substr1);
            // Copiar hasta donde termina el json deseado
            //$search = "/<//script/>";
            $json_str_reference = "window._sharedData";
            $end = strpos($substr1, $json_str_reference) - 3; // "}| window._sharedData;
            $substr2 = substr($substr1, 0, $end);

            $json_result = json_decode($substr2);
            return $json_result;
        }

        /**
         * 
         * @param string $textContent
         * @param string $json_str_reference
         */
        static function search_by_beeline_info(string $textContent, string $json_str_reference) {
            // Copiar a partir de donde comienza la linea deseada
            print_r($textContent);
            $start = strpos($textContent, $json_str_reference) + 1; // |<meta content="
            $substr1 = substr($textContent, $start);
            var_dump($substr1);

            // Copiar hasta donde termina el json deseado
            //$search = "/<//script/>";
            $json_str_reference = 'name="';
            $end = strpos($substr1, $json_str_reference) - 2; //       |" name="description" />
            $substr2 = substr($substr1, 0, $end);

            $json_result = json_decode($substr2);
            return $json_result;
        }

        static function file_get_contents_curl($url) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

            $data = curl_exec($ch);
            curl_close($ch);

            return $data;
        }

    }

}
