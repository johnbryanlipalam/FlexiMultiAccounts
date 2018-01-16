<?php

If(isset($_POST['pwreset']))
{
// Multiple recipients
$to = $_POST['emailadd']; // note the comma

$from = $_POST['employeeid'];

$name = $_POST['name'];
// Subject
$subject = 'WFM Flex Schedule Portal Password Reset';

// Message
$message = 'Password Reset for'.' '.$name.' with employee id '.$from;

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: HOME-CommandCenterSRS <home-CommandCenterSRS@sykes.com>';
$headers[] = 'From: WFM Flex Schedule Portal <home-CommandCenterSRS@sykes.com>,'.$to;
$headers[] = 'Cc: bethany.hernandez@sykes.com,Joanne.Grepo@sykes.com,Romina.Comandante@sykes.com';
$headers[] = 'Bcc: Jean.Agustin@sykes.com,paul.sayo@sykes.com,roberta.c.villanueva@sykes.com,patrickjohn.frias@sykes.com,johnbryan.lipalam@sykes.com';

// Mail it
if(mail($to, $subject, $message, implode("\r\n", $headers)))
{
    echo '<script type="text/javascript">alert("Your issue is now submitted to the WFM Intraday Team. Please wait for an email for instructions.");location="index.php";</script>';
}
else{
    echo '<script type="text/javascript">alert("Password reset request failed!");location="index.php";</script>';
	#error_reporting(E_ALL);
	#echo ini_set('display_errors', '1');
}
}
?>