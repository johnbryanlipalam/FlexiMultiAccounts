<?php
session_start();

If(isset($_POST['sendMessage']))
{
// Multiple recipients
$to = $_POST['emailaddress']; // note the comma

$from = $_POST['name'];
// Subject
$subject = 'WFM Flex Schedule Portal Inquiry';

// Message
$message = $_POST['messages']."<br/><br/>"."Regards, <br/>".$_SESSION['FullName'];

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: HOME-CommandCenterSRS <home-CommandCenterSRS@sykes.com>';
$headers[] = 'From: WFM Flex Schedule Portal <home-CommandCenterSRS@sykes.com>';
$headers[] = 'Cc: bethany.hernandez@sykes.com,Joanne.Grepo@sykes.com,Romina.Comandante@sykes.com';
$headers[] = 'Bcc: Jean.Agustin@sykes.com,paul.sayo@sykes.com,roberta.c.villanueva@sykes.com,patrickjohn.frias@sykes.com,johnbryan.lipalam@sykes.com';
#$headers[] = 'Cc: johnbryan.lipalam@sykes.com';

// Mail it
if(mail($to, $subject, $message, implode("\r\n", $headers)))
{
    echo '<script type="text/javascript">alert("Your message is now submitted to the WFM Intraday Team. Please wait for an email for instructions.");location="AgentHome.php";</script>';
}
else
    echo '<script type="text/javascript">alert("Query message failed!");location="AgentHome.php";</script>';
}
?>