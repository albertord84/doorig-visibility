<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: gatewayController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Gateway extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('gateway_model', 'gateway');

        $this->load->database();
    }

    public function index() {



        $this->load->view('gateway_view');
    }

    public function combogrid() {



        $items = $this->gateway->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->gateway->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('gateway');



        echo json_encode($result);
    }

    public function load() {

        $items = $this->gateway->get_all($this->uri->segment(3));



        echo json_encode($items);
    }

    public function save() {

        $name = $this->input->post('name');
        $api_url = $this->input->post('api_url');
        $api_sandbox_url = $this->input->post('api_sandbox_url');
        $merchant_key = $this->input->post('merchant_key');
        $description = $this->input->post('description');


        $this->gateway->save($name, $api_url, $api_sandbox_url, $merchant_key, $description);
    }

    public function update() {

        $name = $this->input->post('name');
        $api_url = $this->input->post('api_url');
        $api_sandbox_url = $this->input->post('api_sandbox_url');
        $merchant_key = $this->input->post('merchant_key');
        $description = $this->input->post('description');


        $id = $this->uri->segment(3);

        $this->gateway->update($id, $name, $api_url, $api_sandbox_url, $merchant_key, $description);
    }

    public function delete() {



        $this->gateway->delete($this->uri->segment(3));
    }

}
?>

