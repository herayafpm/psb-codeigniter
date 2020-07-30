<?php
function sendEmail($emailTo,$subject,$message,$attachments)
{
  $email = \Config\Services::email();
  $email->setFrom('admin@test.com', getenv('APP_NAME'));
  $email->setTo($emailTo);
  $email->setSubject($subject);
  $email->setMessage($message);
  foreach ($attachments as $attach) {
    $email->attach($attach);
  }
  $email->send();
  return true;
}