<?php session_start(); ?>
<?php
include_once 'Conn.php';
if(isset($_POST['AddTolerance'])){
    $TolNum = $_POST['ToleranceNum'];
	$account = $_POST['accountTol'];
    $stat = 1;
    $conn = setConn();
    $query = "update NetStaffing set Tolerance = '$TolNum' where ACCOUNT = '$account'";
    $stmt = sqlsrv_query($conn, $query);
    if(sqlsrv_rows_affected($stmt) === false)
    {
        die(print_r(sqlsrv_errors(), true));
		#echo $account;
    }
    else
    {
        echo '<script type="text/javascript">alert("'.$TolNum.' Staffing Tolerance applied to all interval!");location="DataManager.php";</script>';
    }   
}
?>
