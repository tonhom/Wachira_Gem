<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'phpmailer/class.phpmailer.php';

class MY_Mailer extends PHPMailer {

    public function __construct() {
        require_once('phpmailer/PHPMailerAutoload.php');
    }

}
