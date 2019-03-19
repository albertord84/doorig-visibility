<?php

use business\{
    worker\Worker as BusinessWorker
};

class Worker extends CI_Controller {

    function __construct() {
        parent::__construct();
        require_once config_item('business-worker-class');
    }

    public function index() {
        print("ok");
    }

    //NEW FOR TEST
    public function test_work(int $id) {
        $worker = new BusinessWorker();
        $worker->do_work();
    }

}
