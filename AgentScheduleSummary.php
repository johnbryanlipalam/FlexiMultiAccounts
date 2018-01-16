<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agent View: Schedule Summary</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<?php
include_once 'Conn.php';
include 'functions.php';
include 'AgentNavigation.php';
?>
<body>
<!-- Flexi + Base Schedule Container-->
<br />
<div class="container">
<table class="table table-bordered table-responsive">
  <thead><tr>
			<td class="font-weight-bold text-primary" colspan="5" style="font-size: 14px;">SCHEDULE SUMMARY <span class="text-secondary">(BASE HRS + FLEX HRS)</span></td>
			<td colspan="2" class="font-weight-bold text-right text-warning" style="font-size: 14px;">Schedules are in Mountain Time.</td>
  </tr></thead>
  <thead style="background-color:#6e6f72; color:White;">
  	<?php getHeaderFSSU(); ?>
    <tr>
		<th class='text-center'>Sunday</th>
		<th class='text-center'>Monday</th>
		<th class='text-center'>Tuesday</th>
		<th class='text-center'>Wednesday</th>
		<th class='text-center'>Thursday</th>
		<th class='text-center'>Friday</th>
		<th class='text-center'>Saturday</th>
	</tr>
  </thead>
  <tbody>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Sun'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Mon'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Tue'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Wed'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Thu'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Fri'; getScheduleSummary($day);?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Sat'; getScheduleSummary($day);?>
      </table>
    </td>
  </tbody>
</table>
</div>
<div class="container">
<table class="table table-bordered table-responsive">
  <thead><tr>
			<td class="font-weight-bold text-primary" colspan="7" style="font-size: 14px;">SCHEDULE SUMMARY <span class="text-secondary">(BASE HRS + FLEX HRS)</span></td>
  </tr></thead>
  <thead style="background-color:#6e6f72; color:White;">
  </thead>
  <tbody class="text-center">
    <tr>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Sun'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Mon'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Tue'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Wed'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Thu'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Fri'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary" style="background-color:#e7e7e7;"><?php $day = 'Sat'; getFlexBaseHours($day);?></td>
    </tr>
	<tr>
		<td colspan="7" class="font-weight-bold text-left text-warning" style="font-size: 14px;">* Please refer to WFO for your break and lunch schedules. Click <a href="#" class="text-primary" onClick="window.open('https://wfo.sykes.com/wfo', '_blank')" rel="noopener noreferrer">here</a> to visit the site.</td>
	</tr>
  </tbody>
</table>
<div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
</div>
</body>
</html>