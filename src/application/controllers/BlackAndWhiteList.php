<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use business\{
    Client,
    ReferenceProfile,
    Response\Response,
    Response\ResponseBlackAndWhiteList,
    Response\ResponseInsertedObject
};

class BlackAndWhiteList extends CI_Controller {

    public function __construct() {
        parent::__construct();

        require_once config_item('business-class');
        require_once config_item('business-client-class');
        require_once config_item('business-black_and_white_list-class');
        require_once config_item('business-response_black_and_white_list-class');
        require_once config_item('business-response_inserted_object-class');
    }

    public function index() {
        echo 'ok';
        // $this->load->view('personProfiles_view');
    }

    public function insert_black() {

        $datas = $this->input->post();

        $client_id = unserialize($this->session->userdata('client'))->Id;
        $Client = new Client($client_id);
        $BlackAndWhiteList = new \business\BlackAndWhiteList($Client);

        try {
            $id = $BlackAndWhiteList->add_item($client_id, $datas['insta_id'], $datas['insta_name'], NULL, 1);

            $response = new ResponseInsertedObject($id);
            $response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

    public function insert_white() {

        $datas = $this->input->post();

        $client_id = unserialize($this->session->userdata('client'))->Id;
        $Client = new Client($client_id);
        $BlackAndWhiteList = new \business\BlackAndWhiteList($Client);

        try {
            $id = $BlackAndWhiteList->add_item($client_id, $datas['insta_id'], $datas['insta_name'], NULL, 0);

            $response = new ResponseInsertedObject($id);
            $response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

    public function delete($black_and_white_id = NULL) {
        $datas = $this->input->post();
        $datas['black_and_white_id'] = $datas['black_and_white_id'] ? $datas['black_and_white_id'] : $black_and_white_id;
        try {
            $BlackAndWhiteItem = new \business\BlackAndWhiteItem($datas['black_and_white_id']);
            $BlackAndWhiteItem->remove();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }

        Response::ResponseOK()->toJson();
    }

    public function get($client_id = null) {
        $datas = $this->input->post();

        try {
            $client_id = $this->session->userdata('client_id');

            $Client = new BusinessClient($client_id);
            $Client->load_black_and_white_list_data();

            //var_dump($Client);

            $Response = new ResponseBlackAndWhiteList($Client->BlackAndWhiteList);
            return $Response->toJson();
        } catch (Exception $exc) {
            Response::ResponseFAIL($exc->getMessage(), $exc->getCode())->toJson();
            return;
        }
    }

}
