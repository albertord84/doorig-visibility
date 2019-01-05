<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: clientsController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Clients extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('clients_model', 'clients');

        $this->load->database();
    }

    public function index() {

        var_dump("Thanks God!");

        $this->load->view('clients_view');
    }

    public function combogrid() {



        $items = $this->clients->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->clients->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('clients');



        echo json_encode($result);
    }

    public function load() {

        $id = $this->uri->segment(3);
        if ($id) {
            $items = $this->clients->get_by_id($id);
        } else {
            $items = $this->clients->get_all($id);
        }

        echo json_encode($items);
    }

    public function save() {

        $pay_id = $this->input->post('pay_id');
        $login_token = $this->input->post('login_token');


        $this->clients->save($pay_id, $login_token);
    }

    public function update() {

        $pay_id = $this->input->post('pay_id');
        $login_token = $this->input->post('login_token');


        $id = $this->uri->segment(3);

        $this->clients->update($id, $pay_id, $login_token);
    }

    public function delete() {



        $this->clients->delete($this->uri->segment(3));
    }

}
?>

