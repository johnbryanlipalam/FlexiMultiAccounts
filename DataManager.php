<!DOCTYPE html>
<html lang="en">
<head>
    <title>WFM Flex Schedule Portal: Data Manager</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
      <a class="nav-link active font-weight-bold" href="DataManager.php">DATA MANAGER</a>
    </li>
    <li class="nav-item">
      <a class="nav-link font-weight-bold" href="SendNotification.php">NOTIFICATION</a>
    </li>
  </ul>
  <br>
  <p>
  <div class="container">
  <div class="row">
    <div class="col" style="background-color: #e7e7e7;">
        <div class="form-group">
          <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">IMPORT</label>
          <?php if (!empty($get_success)) { echo "<script type='text/javascript'>alert('Intraday Staffing successfully imported!')</script>"; } //generic success notice ?>
          <form action="importIntraday.php" method="post" enctype="multipart/form-data">
          <label class="col-form-label font-weight-bold text-primary">Intraday Staffing</label>
            <label style="font-size: 14px;">Use this area to import the intraday staffing and the schedules to be opened for flexi sign-up.</label>
			<label>Account</label>
	        <select name="accountInt" class="form-control col-sm-5">
                <option SELECTED>SELECT ACCOUNT</option>
				<option value="Abercrombie">ABERCROMBIE</option>
				<option value="HealthNet">HEALTHNET</option>
				<option value="Pearson">PEARSON</option>
	        </select>
			<br>
            <input name="csv" type="file" id="csv" />
            <br><br>
            <button class="btn btn-info float-center" type="submit" name="importIntra">IMPORT</button>
            <button class="btn btn-default" type="reset">CANCEL</button>
          </form> 
        </div>
    </div>
    
    <div class="col" style="background-color: #e7e7e7;">
      <form method="post" name="tolerancePage" action="AddTolerance.php">
          <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">STAFFING TOLERANCE</label><br />
          <label style="font-size: 14px;">Use this area to set the staffing tolerances (number) that will be applied to all intervals.</label>
		  <label>Account</label>
	      <select name="accountTol" class="form-control col-sm-5">
               <option SELECTED>SELECT ACCOUNT</option>
				<option value="Abercrombie">ABERCROMBIE</option>
				<option value="HealthNet">HEALTHNET</option>
				<option value="Pearson">PEARSON</option>
	  </select>
	  <br>
      <input class="form-control col-sm-2" type="number" value="" name="ToleranceNum" required="">
          <br>
          <button type="submit" class="btn btn-info" value="Add" name="AddTolerance">ADD</button>
      </form>
    </div>
    
    <div class="w-100"><br></div>
    
    <div class="col" style="background-color: #e7e7e7;">
      <div class="form-group">
       <label class="font-weight-bold text-primary" style="font-size: 14px;">Agent Schedules</label>
      <?php if (!empty($get_success)) { echo "<script type='text/javascript'>alert('Agent Schedule successfully imported!')</script>"; } //generic success notice ?> 
      <form action="importSchedule.php" method="post" enctype="multipart/form-data">
        <label style="font-size: 14px;">Use this area to import the schedules to be opened for flexi sign-up.</label>
		<br>
	  <label>Account</label>
	  <select name="accountSched" class="form-control col-sm-5">
            <option SELECTED>SELECT ACCOUNT</option>
			<option value="Abercrombie">ABERCROMBIE</option>
			<option value="HealthNet">HEALTHNET</option>
			<option value="Pearson">PEARSON</option>
	  </select>
		<br>
        <input name="csv" type="file" id="csv" value="Browse"/>
        <br /><br>
        <button class="btn btn-info" type="submit" name="importSched">IMPORT</button>
        <button class="btn btn-default" type="reset">CANCEL</button>
      </form>
      </div>
    </div>
    
    <div class="col" style="background-color: #e7e7e7;">
    <form method="post" name="exportFlexHours" action="ExportFlexHours.php">
      <label class="col-form-label font-weight-bold text-primary" style="font-size: 14px;">EXPORT</label><br>
      <label style="font-size: 14px;">Use this area to export the flex schedules to the ftp server.</label><br />
	  <label>Account</label>
	  <select name="accountExp" class="form-control col-sm-5">
            <option SELECTED>SELECT ACCOUNT</option>
			<option value="Abercrombie">ABERCROMBIE</option>
			<option value="HealthNet">HEALTHNET</option>
			<option value="Pearson">PEARSON</option>
	  </select>
      <label for="example-date-input" class="col-form-label">Start Date</label>
      <input class="form-control col-sm-4" type="date" value="" id="example-date-input" name="startDate">
      <label for="example-date-input" class="col-form-label">End Date</label>
      <input class="form-control col-sm-4" type="date" value="" id="example-date-input" name="endDate">
      <br>
      <button type="submit" class="btn btn-info" value="Add" name="ExportFlex">EXPORT</button>
    </form>
    </div>
    
  </div>
</div>
  </p>
<div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
</div>
</body>
</html>