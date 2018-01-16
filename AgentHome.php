<?php session_start(); ?>
<?php  if(isset($_SESSION['username'])) 
	{	
	} 
	else 
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>WFM Flex Schedule: Agent Homepage</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
<div class="navbar navbar-static-top" style="background-color:#039be5;">
  <label></label>
  <center>
  <label class="font-weight-bold text-center" style="font-family:Calibri; font-size: 20px; color:White;">WFM FLEX SCHEDULE PORTAL
  &nbsp &nbsp &nbsp<i class="fa fa-calendar-check-o fa-2x"></i></label>
  </center>
  <label></label>
</div>

<div class="container">

  <div class="container">
  <br>
	<center>
    <div class="row justify-content-center">
        <span class="input-group-addon text-light">
        <img src=" Graphics/edit-profile.png">
        </span>
        <br />
    </div>
    <div class="row justify-content-center">
        <label style="font-family:Calibri; font-size: 30px; color:#039be5;">
        <?php echo "<b>".$_SESSION['FullName']."</b>";?>
        </label>
    </div>
	</center>
  </div>
  
  <div class="container" style="background-color:#e7e7e7;">
  <br>
	<center>
    <div class="row justify-content-center">
      <a class="btn btn-light btn-lg" role="button" href="AgentFlexSignUp.php">
        <img src=" Graphics/check.png">&nbsp Flex Schedule Enrollment
      </a>
    </div>
	</center>
  <br>
    <div class="row justify-content-center">
      <center>
      <a class="btn btn-light btn-lg" role="button" aria-pressed="true" href="AgentScheduleSummary.php">
        <img src=" Graphics/icon.png">&nbsp Schedule Summary &nbsp &nbsp &nbsp &nbsp &nbsp
      </a>
      </center>
    </div>
  <br>
    <div class="row justify-content-center">
      <center>
      <a class="btn btn-light btn-lg" role="button" aria-pressed="true" href="ContactUs.php">
        <img src=" Graphics/email.png">&nbsp &nbsp Contact Us  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
      </a>
      </center>
    </div>
    <br>
  </div>
</div>
<div class="container">
<br>
  <center>
  <div class="row justify-content-center">
	<a href="Logout.php" aria-pressed="true" role="button" class="btn btn-info btn-lg">
	LOG OUT
	</a>
  </div>
  </center>
<div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
</html>