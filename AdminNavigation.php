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
    <title>Flexi Sched</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
<div class="navbar navbar-static-top" style="background-color:#039be5;">
  <a href="Logout.php"><label style="font-family:Calibri; font-size: 20px; color:White;"><img src=" Graphics/window-back-button.png"></label></a>
  <label class="font-weight-bold" style="font-family:Calibri; font-size: 20px; color:White;">WFM FLEX SCHEDULE PORTAL
  &nbsp &nbsp<i class="fa fa-calendar-check-o fa-2x"></i></label>
  <label style="font-family:Calibri; font-size: 20px; color:White;">
    <?php echo $_SESSION['FullName']; ?>&nbsp<i class="fa fa-user fa-2x"></i>
  </label>
</div>
</html>