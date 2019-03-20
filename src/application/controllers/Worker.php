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

    public function prepare_daily_work() {
        $worker = new BusinessWorker();
        $worker->truncate_daily_work();
        $worker->prepare_daily_work();
    }

    public function do_work() {
        $worker = new BusinessWorker();
        $worker->do_work();
    }

    public function do_work_by_id($reference_id) {
        //header('Content-Type: application/json');
        $worker = new BusinessWorker();
        $worker->do_work_by_id($reference_id);
    }

}
