<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**

 * Desarrollo del controlador: pay_dataController

 *

 * @author Grupo Nobel, Desarrolladores: Daniel M. Garcia Fernandez - Onel Rosello Reyes

 */
class Pay_data extends CI_Controller {

    function __construct() {

        parent::__construct();



        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('html');

        $this->load->model('pay_data_model', 'pay_data');

        $this->load->database();
    }

    public function index() {



        $this->load->view('pay_data_view');
    }

    public function combogrid() {



        $items = $this->pay_data->all();

        $result = array();

        $result["rows"] = $items;

        echo json_encode($result);
    }

    public function ajaxgrid() {



        $pages = $_POST['page'];

        $rows = $_POST['rows'];

        $offset = ($pages - 1) * $rows;

        $items = $this->pay_data->collection($rows, $offset);

        $result = array();

        $result["rows"] = $items;

        $result["total"] = $this->db->count_all('pay_data');



        echo json_encode($result);
    }

    public function load() {

        $items = $this->pay_data->get_all($this->uri->segment(3));



        echo json_encode($items);
    }

    public function save() {

        $client_id = $this->input->post('client_id');
        $gateway_id = $this->input->post('gateway_id');
        $customer_id = $this->input->post('customer_id');
        $cpf = $this->input->post('cpf');


        $this->pay_data->save($client_id, $gateway_id, $customer_id, $cpf);
    }

    public function update() {

        $client_id = $this->input->post('client_id');
        $gateway_id = $this->input->post('gateway_id');
        $customer_id = $this->input->post('customer_id');
        $cpf = $this->input->post('cpf');


        $id = $this->uri->segment(3);

        $this->pay_data->update($id, $client_id, $gateway_id, $customer_id, $cpf);
    }

    public function delete() {



        $this->pay_data->delete($this->uri->segment(3));
    }

}
?>

