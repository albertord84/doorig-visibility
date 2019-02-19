<?php

namespace business\Response {

use business\ReferenceProfiles;

    require_once config_item('business-response-class');
    require_once config_item('business-reference-profiles-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseReferenceProfiles extends Response {
        public $ReferenceProfiles;

        function __construct(ReferenceProfiles $ReferenceProfiles, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->ReferenceProfiles = $ReferenceProfiles;
            $this->output_array += array('ReferenceProfiles' => $ReferenceProfiles);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
