<?php
require_once('./sendEmail.php');

$name = $_POST['name'];
$subject = 'Application for Job';
$fromAddress = $_POST['email'];
$body = '<b>Name</b>: '.$_POST['name'].'<br/><b>Email</b>: '.$_POST['email'].'<br/><b>Contact Number</b>: '.$_POST['contact'].'<br/><b>Subject</b>: '.$_POST['subject'].'<br/><b>Message</b>: '.$_POST['message'];

sendEmail($name, $fromAddress, $subject, $body, 'resume');
?>