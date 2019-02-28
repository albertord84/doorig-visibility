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
                //$meta_content = @get_meta_tags("https://www.instagram.com/$profile_name/");
                //var_dump($meta_content); // exit;

                $content = @file_get_contents("https://www.instagram.com/$profile_name/", false);
                $doc = new \DOMDocument();
                $loaded = @$doc->loadHTML('<?xml encoding="UTF-8">' . $content);
                //print_r($content);die;
                if ($loaded) {
                    $json_str_reference = '@context';
                    $json = self::search_by_profile_json_info($doc->textContent, $json_str_reference);

                    //$json->by_line = $meta_content['description'];

                    //$json_str_reference = 'meta content';
                    //$json = self::search_by_beeline_info($doc->textContent, $json_str_reference);

                    return $json;
                } else {
                    print "<br>\nProblem parsing document:<br>\n";
                    var_dump($doc);
                }
                return intval($substr2) ? intval($substr2) : 0;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
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

        static function getUrlData($url, $raw = false) { // $raw - enable for raw display
            $result = false;

            $contents = self::getUrlContents($url);

            if (isset($contents) && is_string($contents)) {
                $title = null;
                $metaTags = null;
                $metaProperties = null;

                preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);

                if (isset($match) && is_array($match) && count($match) > 0) {
                    $title = strip_tags($match[1]);
                }

                preg_match_all('/<[\s]*meta[\s]*(name|property)="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

                if (isset($match) && is_array($match) && count($match) == 4) {
                    $originals = $match[0];
                    $names = $match[2];
                    $values = $match[3];

                    if (count($originals) == count($names) && count($names) == count($values)) {
                        $metaTags = array();
                        $metaProperties = $metaTags;
                        if ($raw) {
                            if (version_compare(PHP_VERSION, '5.4.0') == -1)
                                $flags = ENT_COMPAT;
                            else
                                $flags = ENT_COMPAT | ENT_HTML401;
                        }

                        for ($i = 0, $limiti = count($names); $i < $limiti; $i++) {
                            if ($match[1][$i] == 'name')
                                $meta_type = 'metaTags';
                            else
                                $meta_type = 'metaProperties';
                            if ($raw)
                                ${$meta_type}[$names[$i]] = array(
                                    'html' => htmlentities($originals[$i], $flags, 'UTF-8'),
                                    'value' => $values[$i]
                                );
                            else
                                ${$meta_type}[$names[$i]] = array(
                                    'html' => $originals[$i],
                                    'value' => $values[$i]
                                );
                        }
                    }
                }

                $result = array(
                    'title' => $title,
                    'metaTags' => $metaTags,
                    'metaProperties' => $metaProperties,
                );
            }

            return $result;
        }

        static function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0) {
            $result = false;

            $contents = @file_get_contents($url);

            // Check if we need to go somewhere else

            if (isset($contents) && is_string($contents)) {
                preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);

                if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1) {
                    if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections) {
                        return self::getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
                    }

                    $result = false;
                } else {
                    $result = $contents;
                }
            }

            return $contents;
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
