<?php
if (!session_id()) session_start();

require_once '../app/init.php';
require_once '../vendor/autoload.php';
require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';

$app = new App;
