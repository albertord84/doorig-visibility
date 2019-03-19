<?php

use business\ErrorCodes;
use business\Response\Response;

class Gmail {

    public $email = NULL;

    public function __construct() {
        require_once config_item('business-error-codes-class');
        require_once config_item('business-response-class');

        $this->CI = & get_instance();
        $this->CI->load->library('email');
        $this->CI->email->from($GLOBALS['sistem_config']->SYSTEM_EMAIL, $GLOBALS['sistem_config']->SYSTEM_USER_LOGIN);
        $this->CI->email->reply_to($GLOBALS['sistem_config']->ATENDENT_EMAIL, $GLOBALS['sistem_config']->ATENDENT_USER_LOGIN);
        $this->CI->email->cc($GLOBALS['sistem_config']->ATENDENT_EMAIL);
    }

    public function send_test_email($useremail, $username = NULL, $subject = NULL, $mail = NULL) {
        $subject = 'This is a test';
        $message = '<p>This message has been sent for testing purposes.</p>';

        // Get full html:
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
                <title>' . html_escape($subject) . '</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Verdana, Helvetica, sans-serif;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
            ' . $message . '
            </body>
            </html>';
        // Also, for getting full html you may use the following internal method:
        //$body = $this->email->full_html($subject, $message);

        $result = $this->CI->email
                ->to($useremail)
                ->subject($subject)
                ->message($body)
                ->send();

        var_dump($result);
        echo '<br />';
        echo $this->CI->email->print_debugger();
    }

    public function send_client_login_error($useremail, $username, $instaname, $instapass = NULL) {
        $this->CI->email->to($useremail, $username);
        $this->CI->email->reply_to($GLOBALS['sistem_config']->ATENDENT_EMAIL);
        $this->CI->email->cc($GLOBALS['sistem_config']->ATENDENT_EMAIL);

        $this->CI->email->subject(T('Problem with your login'));

        $username = urlencode($username);
        $instaname = urlencode($instaname);
        $instapass = urlencode($instapass);
        $lang = $GLOBALS['sistem_config']->LANGUAGE;
        $url = base_url("resources/$lang/emails/link_recovery_password.php?useremail=$useremail&username=$username&link_recovery_password=$link_recovery_password");
        $body = @file_get_contents($url);
        $this->CI->email->message($body);

        $this->CI->email->set_alt_message(T('Recovery password link: '));

        if (!$this->CI->email->send()) {
            throw ErrorCodes::getException(ErrorCodes::GMAIL_ERROR_SEND);
        }

        return true;
    }

}
