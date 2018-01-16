<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agent View: Contact Us</title>
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
<body>
<?php 
include_once 'Conn.php';
include 'AgentNavigation.php';
?>
<div class="container">
<form method="post" name="sendusfeebback" action="sendquery.php">
<div class="container">
  <br>
  <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">Get in touch!</label>
  <div class="form-group">
    <label style="font-size: 14px;">We'd love to hear from you. You can reach out to us as a whole and one of our awesome team members will get back to you. We love getting emails all day. :)</label>
    <br>
     <label style="font-size: 14px;" class="font-weight-bold">Your Name:</label>
    <input type="text" class="form-control col-sm-6" placeholder="Your Name" name="name" required>
    <br>
    <label style="font-size: 14px;" class="font-weight-bold">Your Email:</label>
    <input type="email" class="form-control col-sm-6" placeholder="Email Address" name="emailaddress" required>
    <br>
    <label style="font-size: 14px;" class="font-weight-bold">What's Up?</label>
    <textarea class="form-control col-sm-10" id="exampleTextarea" rows="3" name="messages" placeholder="Your Inquiry here!" required></textarea>
    <br>
    <button class="btn btn-info" type="submit" name="sendMessage">SEND</button>
  </div>
</div>
</form>
<div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
</div>
</body>
</html>