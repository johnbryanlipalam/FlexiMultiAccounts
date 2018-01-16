<?php session_start(); ?>
<?php
include('Conn.php');

if(isset($_POST['EnrollFlex']))
 {
    $user = $_SESSION['username'];
    $cbint = $_POST['cbinterval'];
    $conn = SetConn();
 for($i=0;$i<count($cbint);$i++)
        {
            $exp=explode(',',$cbint[$i]);//Explode date and interval
            $date = date("Y-m-d", strtotime($exp[0]));
            $interval = $exp[1];
            $query = "exec insertEnrolledFlexHours '$date', '$user', '$interval'";
            $enrolFlex = sqlsrv_query($conn, $query);
            if(sqlsrv_rows_affected($enrolFlex) === false){
                 die(print_r(sqlsrv_errors(), true));
               }
            else{
				header('Location: AgentFlexSignUp.php?FlexEnrolled=true');
			}
		}
}

?>

