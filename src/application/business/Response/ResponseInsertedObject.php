<?php

namespace business\Response {

    require_once config_item('business-response-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseInsertedObject extends Response {

        public $InsertedId;

        function __construct(int $InsertedId, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->InsertedId = $InsertedId;
            $this->output_array += array('InsertedId' => $InsertedId);
        }

    }

}
