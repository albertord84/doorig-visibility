<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clients_modulesController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Clients_modules extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('clients_modules_model', 'clients_modules');

        $this->load->database();
    }

    public function index() {



        $this->load->view('clients_modules_view');
    }

    public function combogrid() {



        $items = $this->clients_modules->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->clients_modules->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('clients_modules');



        echo json_encode($result);
    }

    public function load() {

        $items = $this->clients_modules->get_all($this->uri->segment(3));



        echo json_encode($items);
    }

    public function save() {

        $client_id = $this->input->post('client_id');
        $module_id = $this->input->post('module_id');
        $active = $this->input->post('active');
        $init_date = $this->input->post('init_date');
        $end_date = $this->input->post('end_date');


        $this->clients_modules->save($client_id, $module_id, $active, $init_date, $end_date);
    }

    public function update() {

        $client_id = $this->input->post('client_id');
        $module_id = $this->input->post('module_id');
        $active = $this->input->post('active');
        $init_date = $this->input->post('init_date');
        $end_date = $this->input->post('end_date');


        $id = $this->uri->segment(3);

        $this->clients_modules->update($id, $client_id, $module_id, $active, $init_date, $end_date);
    }

    public function delete() {



        $this->clients_modules->delete($this->uri->segment(3));
    }

}
?>

