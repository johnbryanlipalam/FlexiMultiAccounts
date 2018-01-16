<?php

If(isset($_POST['sendEmail']))
{
// Multiple recipients
$to = $_POST['recipients']; // note the comma

// Subject
$subject = 'WFM Flex Schedule Portal Announcement';

// Message
$message = $_POST['emailbody'];

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: HOME-CommandCenterSRS <home-CommandCenterSRS@sykes.com>';
$headers[] = 'From: WFM Flex Schedule Portal <home-CommandCenterSRS@sykes.com>';
$headers[] = 'Cc: bethany.hernandez@sykes.com,Joanne.Grepo@sykes.com,Romina.Comandante@sykes.com';
$headers[] = 'Bcc: Jean.Agustin@sykes.com,paul.sayo@sykes.com,roberta.c.villanueva@sykes.com,patrickjohn.frias@sykes.com,johnbryan.lipalam@sykes.com';
// Mail it
if(mail($to, $subject, $message, implode("\r\n", $headers)))
{
    echo '<script type="text/javascript">alert("Email notification sent!");location="SendNotification.php";</script>';
}
else
    echo '<script type="text/javascript">alert("Email notification failed!");location="SendNotification.php";</script>';
}
?>