<?php session_start(); ?>
<?php
include_once 'Conn.php';
if(isset($_POST['ExportFlex'])){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
	$account = $_POST['accountExp'];
    $conn = setConn();
    
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=FlexSchedule.csv');  
    $output = fopen("php://output", "w");  
    #fputcsv($output, array());
    #'REC_TYPE', 'EMP_ID', 'SEG_CODE', 'NOM_DATE', 'START_DATE', 'START_TIME', 'DURATION','SEG_MEMO'
    $query = "select distinct '00' as REC_TYPE, a.EMP_ID, 'CTR: Flexible Scheduling' as SEG_CODE, a.Date, 
		a.Date as START_DATE, FORMAT(cast(a.Interval as time), N'hhmm') as START_TIME, '0030' as DURATION, '' as SEG_MEMO
		from AgentFlexSched a
		join schedule s on a.Emp_ID = replace(s.EMP_ID, ' ', '')
        where a.Date between '$startDate' and '$endDate' and s.ACCOUNT = '$account'
union all
		select distinct '00' as REC_TYPE, a.EMP_ID, a.SEG_CODE, a.Date, 
		a.Date as START_DATE, FORMAT(cast(a.Interval as time), N'hhmm') as START_TIME, '0030' as DURATION, '' as SEG_MEMO
		from AgentFlexSched a
		join schedule s on a.Emp_ID = replace(s.EMP_ID, ' ', '')
		where a.Date between '$startDate' and '$endDate' and s.ACCOUNT = '$account'";  
    $result = sqlsrv_query($conn, $query);
    while($row = sqlsrv_fetch_array($result))  
    {
        $column = $row;
        $param1 = $column[0]; //REC_TYPE
        $param2 = $column[1]; //EMP_ID
        $param3 = $column[2]; //SEG_CODE
        $param4 = $column[3]->format('m/d/Y'); //NOM_DATE
        $param5 = $column[4]->format('m/d/y'); //START_DATE
        $param6 = $column[5]; //START_TIME
        $param7 = (string)$column[6]; //DURATION
        $param8 = $column[7]; //SEG_MEMO

        // insert the row to csv
		$params = array($param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8);
        fputcsv($output, $params);
      }  
      fclose($output);  
}
?>