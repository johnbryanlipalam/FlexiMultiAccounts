<!DOCTYPE html>
<html lang="en">
<head>
    <title>WFM Flex Schedule Portal: Notification</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<?php
include_once 'Conn.php';
?>
<body>
<?php include 'AdminNavigation.php';?>
<div class="container">
  <br>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link text-primary font-weight-bold" href="DataManager.php">DATA MANAGER</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active font-weight-bold" href="SendNotification.php">NOTIFICATION</a>
    </li>
  </ul>
  <br>
  <p>
<form method="post" name="myemailform" action="sendemail.php">
<div class="container" style="background-color: #e7e7e7;">
  <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">Send Email Notification</label>
  <div class="form-group">
    <label style="font-size: 14px;">Use this area to send an email message to all employees for flex schedule sign-up.</label>
    <textarea class="form-control" id="exampleTextarea" rows="" name="emailbody" placeholder=""></textarea>
    <br>
    <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">Recipients</label><br>
    <label style="font-size: 14px;">Use comma (,) to separate email addresses.</label>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="recipients" placeholder="Email address here"></textarea>
    <br>
    <button class="btn btn-info" type="submit" name="sendEmail">SEND</button>
    <button class="btn btn-default" type="reset">CANCEL</button>
  </div>
</div>
</form>
  </p>
  <div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
</div>

</body>
</html>