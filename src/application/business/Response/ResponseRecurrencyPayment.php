<?php

namespace business\Response {

    require_once config_item('business-response-class');

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ResponseRecurrencyPayment extends Response {

        public $PaymentKey;
        public $Subscription;

        function __construct(string $PaymentKey, \stdClass $Subscription = NULL, int $code = 0, string $message = "") {
            parent::__construct($code, $message);

            $this->PaymentKey = $PaymentKey;
            $this->Subscription = $Subscription;
            $this->output_array += array('PaymentKey' => $PaymentKey, 'Subscription' => $Subscription);
        }

        public function toJson() {
            get_instance()->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($this->output_array));
        }

    }

}
