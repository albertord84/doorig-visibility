<?php

namespace business\Response {

    /**
     * Description of Response
     *
     * @author albertord
     */
    class Response {

        public $code = 0;
        public $message = "";
        public $extra_data;

        function __construct(int $code = 0, string $message = "") {
            $this->code = $code;
            $this->message = $message;
            $this->output_array = array('code' => $this->code, 'message' => $this->message);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

        public function var_dump() {
            var_dump($this->output_array);
        }

        static function ResponseOK(string $message = "OK") {
            $R = new Response(0, $message);
            return $R;
        }

        static function ResponseFAIL(string $message = "FAIL", int $code = 1) {
            $R = new Response($code, $message);
            return $R;
        }

    }

}
