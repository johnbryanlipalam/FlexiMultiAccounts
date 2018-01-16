<?php
error_reporting(-1);
ini_set('display_errors', 1);

//set connection to database
function SetConn()
{
    $server_name = "WPHMNLWINL42373\LOCALDBSQL";
    $conn_info = array("Database" => "FlexiMultiAccounts");
    
    $conn = sqlsrv_connect($server_name, $conn_info);

    if ($conn === false)
    {
        #echo "Unable to connect.</br>";
		die(print_r(sqlsrv_errors(), true));
    }
     return $conn;
}
?>
 