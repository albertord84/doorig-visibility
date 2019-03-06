<?php

namespace business\Response {

use business\BlackAndWhiteList;

    require_once config_item('business-response-class');
    require_once config_item('business-black_and_white_list-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseBlackAndWhiteList extends Response {
        public $BlackAndWhiteList;

        function __construct(BlackAndWhiteList $BlackAndWhiteList, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->BlackAndWhiteList = $BlackAndWhiteList;
            $this->output_array += array('BlackAndWhiteList' => $BlackAndWhiteList);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
