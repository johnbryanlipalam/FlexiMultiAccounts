<?php

if (!isset($_POST['importIntra'])) {
$get_success = "";
}
else {
$get_success = $_POST['importIntra'];
}

if (!empty($_FILES)) { 

    /* Format the errors and die */
	$account = $_POST['accountInt'];
	
    function get_last_error() {
        $retErrors = sqlsrv_errors(SQLSRV_ERR_ALL);
        $errorMessage = 'No errors found';

        if ($retErrors != null) {
            $errorMessage = '';

            foreach ($retErrors as $arrError) {
                $errorMessage .= "SQLState: ".$arrError['SQLSTATE']."<br>\n";
                $errorMessage .= "Error Code: ".$arrError['code']."<br>\n";
                $errorMessage .= "Message: ".$arrError['message']."<br>\n";
            }
        }

        die ($errorMessage);
    }

    /* connect */
    function connect() {
        if (!function_exists('sqlsrv_num_rows')) { // Insure sqlsrv_1.1 is loaded.
            die ('sqlsrv_1.1 is not available');
        }

        /* Log all Errors */
        sqlsrv_configure("WarningsReturnAsErrors", TRUE);        // BE SURE TO NOT ERROR ON A WARNING
        sqlsrv_configure("LogSubsystems", SQLSRV_LOG_SYSTEM_ALL);
        sqlsrv_configure("LogSeverity", SQLSRV_LOG_SEVERITY_ALL);

        $server_name = "WPHMNLWINL42373\LOCALDBSQL";
        $conn_info = array("Database" => "FlexiMultiAccounts");
    
        $conn = sqlsrv_connect($server_name, $conn_info);

        if ($conn === FALSE) {
            get_last_error();
        }

        return $conn;
    }

    function query($conn, $query) {
        $result = sqlsrv_query($conn, $query);
        if ($result === FALSE) {
            get_last_error();
        }
        return $result;
    }

    /* Prepare a reusable query (prepare/execute) */
	
    function prepare ( $conn, $query, &$params ) {
        $result = sqlsrv_prepare($conn, $query, $params);
        if ($result === FALSE) {
            get_last_error();
        }
        return $result;
    }

    /*
    do the deed. once prepared, execute can be called multiple times
    getting different values from the variable references.
    */
	
    function execute ( $stmt ) {
        $result = sqlsrv_execute($stmt);
        if ($result === FALSE) {
            get_last_error();
        }
        return $result;
    }

    function fetch_array($query) {
        $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        if ($result === FALSE) {
            get_last_error();
        }
        return $result;
    }

    $conn = connect();
	
	//truncate table before insertion
	$trcnt = "truncate table stageIntraday";
	$qq = sqlsrv_query($conn, $trcnt) or die( print_r( sqlsrv_errors(), true) );

    /* prepare the statement */
    $query = "INSERT stageIntraday values ( ? , ? , ?, ?, ?, ?, ? , ? , ?, ?, ?, ?, ?, ?, ?, ? , ?)";
    $param1 = null; // this will hold col1 from the CSV
    $param2 = null; // this will hold col2 from the CSV
	$param3 = null; // this will hold col3 from the CSV
    $param4 = null; // this will hold col4 from the CSV
    $param5 = null; // this will hold col5 from the CSV
    $param6 = null; // this will hold col6 from the CSV
    $param7 = null; // this will hold col7 from the CSV
    $param8 = null; // this will hold col8 from the CSV
    $param9 = null; // this will hold col9 from the CSV
    $param10 = null; // this will hold col10 from the CSV
    $param11 = null; // this will hold col11 from the CSV
    $param12 = null; // this will hold col12 from the CSV
    $param13 = null; // this will hold col13 from the CSV
    $param14 = null; // this will hold col14 from the CSV
    $param15 = null; // this will hold col15 from the CSV
    $param16 = null; // this will hold col16 from the CSV
	$param17 = null; // this will hold col16 from the CSV

    //get the csv file 
	
    $file = $_FILES["csv"]["tmp_name"]; 
  /*
    Here is where you read in and parse your CSV file into an array.
    That may get too large, so you would have to read smaller chunks of rows.
  */
    $csv_array = file($file);
    foreach ($csv_array as $row_num => $row) {
        if($row > 0){
        $row = trim ($row);
        $column = explode ( ',' , $row );
        $param1 = (int)$column[0]; //PRI_INDEX
        $param2 = str_replace('"', " ", $column[1]); //ROUTING_SET
        $param3 = date("Y-m-d H:i:s A", strtotime($column[2])); //START_TIME
        $param4 = date("Y-m-d H:i:s A", strtotime($column[3])); //STOP_TIME
        $param5 = (int)$column[4]; //HOUR
        $param6 = (int)$column[5]; //MINUTE
        $param7 = $column[6]; //Revised Connects
        $param8 = $column[7]; //AHT
        $param9 = $column[8]; //Wrapup
        $param10 = (float)$column[9]; //Req
        $param11 = (float)$column[10]; //Sch
        $param12 = (float)$column[11]; //Schedule Tally Delta
        $param13 = (float)$column[12]; //Net
        $param14 = (float)$column[13]; //SL Calc
        $param15 = (float)$column[14]; //SL Actual
        $param16 = (float)$column[15]; //Delay
		$param17 = $account; //account

        // insert the row
		$params = array( $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10, $param11, $param12, $param13, $param14, $param15, $param16, $param17 );
        $prep = prepare ( $conn, $query, $params );
        $result = execute ( $prep );
        }
    }
	//this is for insertion of FinalSched
	$FinalIntra = "exec insertIntradayFinal_MultiAccounts '$account'";
	$InsertIntraFinal = sqlsrv_query($conn, $FinalIntra) or die( print_r( sqlsrv_errors(), true) );
	if(sqlsrv_rows_affected($InsertIntraFinal) === false){
        die(print_r(sqlsrv_errors(), true));
     }
	 else{
		echo '<script type="text/javascript">alert("You are importing Intraday Staffing. Please click on Confirm to submit or Cancel to go back to Data Import page. Note that once you confirm, the files you submitted will not be available for modification.");location="DataManager.php";</script>';
	 }
	
	
/* Free statement and connection resources. */
sqlsrv_close($conn);
}
?>