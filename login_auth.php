<?php
session_start();
include_once 'Conn.php';

if ((isset($_POST['nt_user'])) && (isset($_POST['nt_pass'])))
{
    //protect from mssql injection attacks
    $username = trim($_POST['nt_user']);
    $password = trim($_POST['nt_pass']);
    $user = "select distinct u.Employee_ID as username, u.password as password, FullName, usertype from FlexUsers u where Employee_ID = '$username' and password COLLATE SQL_Latin1_General_CP1_CS_AS = '$password'";
    $c = setConn();
    $q = sqlsrv_query($c, $user) or die( print_r( sqlsrv_errors(), true));
    #$i = sqlsrv_fetch_array($q);
    if($i = sqlsrv_fetch_array($q))
    {
        if($i[3] == 'Admin')
        {
            $_SESSION['username'] = $i[0];
            $_SESSION['FullName'] = $i[2];
            header("Location:DataManager.php");
        }
        #else if($i[3] == 'Agent' && (date('D') == Mon or date('D') == Tue or date('D' == Sat)))
        #{
         #   echo '<script type="text/javascript">alert("The WFM Flex Schedule Portal is not yet open for Flex Enrollment. Please wait for an announcement from your WFM Intraday Team.");location="index.php";</script>';
        #}
        else
        {
            $_SESSION['username'] = $i[0];
            $_SESSION['FullName'] = $i[2];
            header("Location:AgentHome.php");   
        }
    }
    else
    {
        echo '<script type="text/javascript">alert("The credentials you entered are invalid. Please try again.");location="index.php";</script>';
        session_destroy();
    }
}
?>