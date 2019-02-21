<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientsController

 *

 * @author 

 */
use business\Response\Response;

class GeolocationProfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
    }

    public function insert_geolocation() {
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }

    public function delete_geolocation() {
        $datas = $this->input->post();

        return Response::ResponseOK()->toJson();
    }

}
