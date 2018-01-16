<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agent View: Flex Enrollment</title>
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
<script type="text/javascript">
     $(function(){
    var s = $('#FlexHours').text();
	if(s == 0){
		$('input[type=checkbox]').not(':checked').attr("disabled",true);
	}

    var fnUpdateCount = function() {
        var generallen = $("#general-content input[name='cbinterval[]']:checked").length;
          console.log(generallen,$("#FlexHours"));
        if (generallen > 0) {
            var flx = generallen / 2;
            var ls = s - flx;
            if(s == flx){
			  $("#FlexHours").text(ls);
			  $('input[type=checkbox]').not(':checked').attr("disabled",true);
			  alert("You have no remaining flex hours for enrollment. If you are done selecting your flex hours, please click on Submit.");
            }
			else{
				$('input[type=checkbox]').not(':checked').attr("disabled",false);
				$("#FlexHours").text(ls);
			}
        } else {
            $("#FlexHours").text(s);
        }
    };

    $("#general-content input:checkbox").on("change", function() {
                fnUpdateCount();
            });
});                     
</script>
</head>
<?php
include_once 'Conn.php';
include 'functions.php';
include 'AgentNavigation.php'
?>
<body>
<!-- This is for the alert part. -->
<div class="container">
<?php if(isset($_GET['FlexEnrolled'])) {?>
	<div class="container alert alert-success" style="margin: 70px 50px 10px 0px;">Flex Schedule Succesfully Submitted. Please go to Schedule Summary page to view your updated schedule.</div>
<?php } ?>
</div>
<!-- End of alert part. -->
<form action="EnrollFlex.php" method="post" onSubmit="if(!confirm('Note that once you confirm, the flex hours you submitted will be final. Please click on cancel to go back to the Flex Enrollment page.')){return false;}">
<!-- Fixed Schedule Container -->
<div class="container">
<br>
<table class="table table-bordered table-responsive">
  <thead>
    <tr>
      <td colspan="4" class="font-weight-bold text-primary" style="font-size: 14px;">BASE SCHEDULES</td>
	  <td colspan="3" class="font-weight-bold text-right text-warning" style="font-size: 14px;">Schedules are in Mountain Time.</td>
    </tr>
  </thead>
  <thead style="background-color:#6e6f72; color:White;">
  	<?php getHeader(); ?>
  </thead>
  <tbody>
	<tr>
		<td class='text-center'>Sunday</td>
		<td class='text-center'>Monday</td>
		<td class='text-center'>Tuesday</td>
		<td class='text-center'>Wednesday</td>
		<td class='text-center'>Thursday</td>
		<td class='text-center'>Friday</td>
		<td class='text-center'>Saturday</td>
	</tr>
	<tr>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Sun'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Mon'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Tue'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Wed'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Thu'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Fri'; getInterval($day); ?>
		  </table>
		</td>
		<td>
		  <table class="table table-hover table-responsive">
			<?php $day = 'Sat'; getInterval($day); ?>
		  </table>
		</td>
	</tr>
  </tbody>
</table>
</div>

<!-- Flexi Schedule Container-->
<div class="container" id="general-content" name="general-content">
<table class="table table-bordered table-responsive" id="tableFlex">
  <thead> 
    <tr>
      <td colspan="4" class="font-weight-bold text-primary" style="font-size: 14px;">
        FLEX SCHEDULE FORM
      </td>
      <td colspan="2" class="font-weight-bold text-right text-warning" style="font-size: 14px;">REMAINING FLEX HOURS:</td>
      <td class="font-weight-bold text-center text-warning" id="FlexHours" name="FlexHours" style="font-size: 20px;" bgcolor="#6e6f72">
		<?php getFlexHours(); ?>
      </td>
    </tr>
  </thead>
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
        <?php $day = 'Sun'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Mon'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Tue'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Wed'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Thu'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Fri'; getIntervalFSSU($day); ?>
      </table>
    </td>
    <td>
      <table class="table table-hover table-responsive">
        <?php $day = 'Sat'; getIntervalFSSU($day); ?>
      </table>
    </td>
  </tbody>
</table>

<table class="table table-bordered table-responsive">
  <thead>
	<tr>
		<td class="font-weight-bold text-primary" colspan="7" style="font-size: 14px;">SCHEDULE SUMMARY <span class="text-secondary">(BASE HRS + FLEX HRS)</span></td>
	</tr>
  </thead>
  <thead style="background-color:#6e6f72; color:White;">
  </thead>
  <tbody class="text-center">
    <tr>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Sun'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Mon'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Tue'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Wed'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Thu'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Fri'; getFlexBaseHours($day);?></td>
      <td class="font-weight-bold text-secondary text-center" style="background-color:#e7e7e7;"><?php $day = 'Sat'; getFlexBaseHours($day);?></td>
    </tr>
  </tbody>
</table>
<div class="form-group">
      <button class="btn btn-info float-left" type="submit" name="EnrollFlex">SUBMIT</button>
</div>
</form>
<div class="row justify-content-flex-end">
  <img src=" Graphics/sykes.png">
</div>
<!-- End of Flexi Schedule Container-->
</div>

</body>
</html>