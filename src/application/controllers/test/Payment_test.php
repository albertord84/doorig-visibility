<?php

ini_set('xdebug.var_display_max_depth', 256);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

use business\{
    Client,
    Payment\Vindi,
    Response
};

class Payment_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_once config_item('business-client-class');
        require_once config_item('business-response-class');
        require_once config_item('business-payment_vindi-class');

    }

    public function index() {
        echo "Controller: <b>" . __CLASS__ . "</b> cargado.";
    }

    public function run() {
        //======= Payment =======//
        echo "<pre>";
        echo "<h2>Test Add Payment Client</h2>";

        $_POST['user_email'] = 'albertord84@gmail.com';
        $_POST['credit_card_name'] = 'alberto reyes diaz';
        $_POST['credit_card_number'] = '5234214982638268';
        $_POST['credit_card_exp_month'] = '08';
        $_POST['credit_card_exp_year'] = '2021';
        $_POST['credit_card_cvc'] = '057';

        $_POST['promotional-code'] = '';
        $_POST['cpf'] = '062.665.447-50';

        $CPayment = new Payment();

        $CPayment->add_payment();

        echo "[new] Add Payment Client ==> (<b>ok</b>)<br>";
    }

}
