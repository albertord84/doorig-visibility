<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: client_statusController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Client_status extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('client_status_model', 'client_status');

        $this->load->database();
    }

    public function index() {



        $this->load->view('client_status_view');
    }

    public function combogrid() {



        $items = $this->client_status->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->client_status->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('client_status');



        echo json_encode($result);
    }

    public function load() {

        $items = $this->client_status->get_all($this->uri->segment(3));



        echo json_encode($items);
    }

    public function save() {

        $name = $this->input->post('name');
        $description = $this->input->post('description');


        $this->client_status->save($name, $description);
    }

    public function update() {

        $name = $this->input->post('name');
        $description = $this->input->post('description');


        $id = $this->uri->segment(3);

        $this->client_status->update($id, $name, $description);
    }

    public function delete() {



        $this->client_status->delete($this->uri->segment(3));
    }

}
?>

