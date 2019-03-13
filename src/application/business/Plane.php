<?php

namespace business {

    require_once config_item('business-loader-class');

    /**
     * Description of HashtagProfile
     *
     * @author dumbu
     */
    class Plane extends Loader {

        public $id;
        public $initial_val;
        public $normal_val;
        public $to_follow;
        public $gateway_prod_id;
        public $gateway_plane_id;

        public function __construct(int $id = NULL) {
            parent::__construct();
            $ci = &get_instance();
            $ci->load->model('Plane_model');

            $this->id = $id;
            if ($id) {
                $this->load_data();
            }
        }

        public function load_data() {
            $ci = &get_instance();
            $data = $ci->Plane_model->get_by_id($this->id);

            if ($data)
                $this->fill_data($data);
        }

        protected function fill_data(\stdClass $data) {
            $this->id = $data->id;
            $this->initial_val = $data->initial_val;
            $this->normal_val = $data->normal_val;
            $this->to_follow = $data->to_follow;
            $this->gateway_prod_id = $data->gateway_prod_id;
            $this->gateway_plane_id = $data->gateway_plane_id;
        }

    }

}    
