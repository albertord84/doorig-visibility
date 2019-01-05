<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: modulesController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Modules extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('modules_model', 'modules');

        $this->load->database();
    }

    public function index() {



        $this->load->view('modules_view');
    }

    public function combogrid() {



        $items = $this->modules->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->modules->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('modules');



        echo json_encode($result);
    }

    public function load() {

        $items = $this->modules->get_all($this->uri->segment(3));



        echo json_encode($items);
    }

    public function save() {

        $name = $this->input->post('name');
        $description = $this->input->post('description');


        $this->modules->save($name, $description);
    }

    public function update() {

        $name = $this->input->post('name');
        $description = $this->input->post('description');


        $id = $this->uri->segment(3);

        $this->modules->update($id, $name, $description);
    }

    public function delete() {



        $this->modules->delete($this->uri->segment(3));
    }

}
?>

