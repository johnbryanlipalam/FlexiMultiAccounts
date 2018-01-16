<?php

#This Function is for Fixed Schedule Header
function getHeader(){
  $uname = $_SESSION['username'];
  $topics = "select distinct cast(START_MOMENT as date) Date, datename(dw, START_MOMENT) DayName from schedule where START_MOMENT is not null order by 1";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true));
  $dt = sqlsrv_fetch_array($q);
  echo "<tr>";
  do{
  echo "<th class='text-center'>".$dt[0]->format('m-d-Y')."</th>";
  } while($dt = sqlsrv_fetch_array($q));
  echo "</tr>";
}

#This Function is for Fixed Schedule Shift
function getInterval($day){
  $uname = $_SESSION['username'];
  $topics = "select distinct EMP_ID, NOM_DATE, DOW, START_MOMENT, STOP_MOMENT from empFixedSched where replace(EMP_ID, ' ', '') = '$uname' and REPLACE(DOW, ' ', '') = '$day'order by 2";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true) );
  $i = sqlsrv_fetch_array($q);
  do{
    if(!empty($i)){
    echo '<tr>';
    echo "<td class='text-center'>".$i[3]." - ".$i[4]."</td>";
    echo '</tr>';
    }
    else
    {
      echo '<tr>';
      echo "<td class='text-center'>"."&nbspRest Day&nbsp"."</td>";
      echo '</tr>';
    }
  } while($i = sqlsrv_fetch_array($q));
  unset($day);
}

#############################################Flex Schedule Sign UP

#This Function is for Flex Schedule Sign Up
function getHeaderFSSU(){
  $uname = $_SESSION['username'];
  $topics = "select distinct cast(START_MOMENT as date) Date, datename(dw, START_MOMENT) DayName from schedule where START_MOMENT is not null order by 1";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true) );
  $dt = sqlsrv_fetch_array($q);
  
  echo "<tr>";
  do{
      echo "<th class='text-center' style='height: 30px;'>".$dt[0]->format('m-d-Y')."</th>";
  } while($dt = sqlsrv_fetch_array($q));
  echo "</tr>";
}

#This Function is for Flex Schedule Sign Up
function getDayFSSU(){
  $uname = $_SESSION['username'];
  $topics = "select distinct cast(START_MOMENT as date) Date, datename(dw, START_MOMENT) DayName from schedule where START_MOMENT is not null order by 1";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true) );
  $dy= sqlsrv_fetch_array($q);
  
  echo "<tr>";
  do{
      echo "<th class='text-center'>".$dy[1]."</th>";
  } while($dy = sqlsrv_fetch_array($q));
  echo "</tr>";
}

####this function calls the based schedule of the agent per interval
function getScheduleSummary($day){
  $uname = $_SESSION['username'];
  $schedSum = "With FlxHrs as(
select REPLACE(fixedS.EMP_ID, ' ', '') EMP_ID, NOM_DATE,
min(cast(fixedS.START_MOMENT as time)) START_MOMENT, 
max(cast(fixedS.STOP_MOMENT as time)) STOP_MOMENT
from empFixedSched fixedS
where replace(fixedS.EMP_ID, ' ', '') = '$uname' 
and REPLACE(DOW, ' ', '') = '$day'
GROUP BY fixedS.EMP_ID, NOM_DATE
union all
select EMP_ID, NOM_DATE,
dateadd(MI, 30, START_MOMENT) , 
STOP_MOMENT
from FlxHrs
WHERE START_MOMENT < STOP_MOMENT
)
select EMP_ID, NOM_DATE AS Date, convert(varchar(10),START_MOMENT,100) as Interval, 1 as Base, START_MOMENT from FlxHrs
union all
select distinct REPLACE(a.EMP_ID, ' ', '') EMP_ID, Date, convert(varchar(10),cast(Interval as time),100) Interval, 2 as Base,cast(Interval as time) START_MOMENT
from AgentFlexSched a
join schedule s on a.Date = cast(s.NOM_DATE as date)
where left(datename(dw,Date), 3) = '$day' and REPLACE(a.EMP_ID, ' ', '') = '$uname'
order by 5";
  $c = setConn();
  $q = sqlsrv_query($c, $schedSum) or die( print_r( sqlsrv_errors(), true) );
  $interval = sqlsrv_fetch_array($q);
  do{
	  if($interval[3] == 2){
		  echo '<tr>';
		  echo "<td class='text-center table-warning'>";
		  echo $interval[2];
		  echo '</td></tr>';
	  }
	  else if($interval[3] == 1){
		echo '<tr>';
		echo "<td class='text-center table-info'>";
		echo $interval[2];
		echo '</td></tr>';
	  }
    } while ($interval = sqlsrv_fetch_array($q));  
  unset($day);
}

#This Function is for Flex Schedule Sign Up
function getIntervalFSSU($day){
$uname = $_SESSION['username'];
$topics = "select distinct n.Date, 
convert(varchar(10),cast(N.Interval as time), 100) Interval,
cast(N.Interval as time) Interval2
from empFixedSched s 
join NetStaffing n on s.NOM_DATE = n.Date
where left(datename(dw,cast(n.Date as date)), 3) = '$day'
and REPLACE(s.EMP_ID, ' ', '') = '$uname'
and cast(N.Interval as time) not between cast(START_MOMENT as time) and cast(STOP_MOMENT as time)
and n.SignUpNet < n.OrigNet + n.Tolerance
and checksum(cast(n.Date as date)) + checksum(cast(n.Interval as time)) not in 
(SELECT checksum(cast(Date as date)) + checksum(cast(Interval as time)) gt FROM AgentFlexSched a WHERE n.Date = a.Date and cast(n.Interval as time) = cast(a.Interval as time)
and replace(a.EMP_ID, ' ','') = '$uname')
order by 1,3";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true) );
  $i = sqlsrv_fetch_array($q);
  do{
    if(!empty($i)){
    echo '<tr>';
    echo "<td class='text-center'>";
    echo $i[1];
    echo "</td><td>";
    echo "<span>";
    echo '<input type="checkbox" id="sub" name="cbinterval[]" value="'.$i[0]->format('Y-m-d').','.$i[1].'">';
    echo "</span></td>";
    echo '</tr>';
    }
	else
	{
		getIntervalFSSURD($day);
	}
  } while($i = sqlsrv_fetch_array($q));
  unset($day);
}

#get Flex Hours available for signup
function getFlexHours(){
  $uname = $_SESSION['username'];
  $topics = "select distinct fixedS.EMP_ID, 20 as TimeWork,
  12 as FLexHours,
  (select count(distinct checksum(x.Date) + checksum(x.Interval)) / 2.00 FlexSignUp
  from AgentFlexSched x join schedule ef on x.Date = cast(ef.NOM_DATE as date) where replace(x.EMP_ID, ' ', '') = '$uname') FlexSignUp
  from empFixedSched fixedS
  where replace(fixedS.EMP_ID, ' ', '') = '$uname'
  group by fixedS.EMP_ID";
  $c = setConn();
  $q = sqlsrv_query($c, $topics) or die( print_r( sqlsrv_errors(), true));
  $f = sqlsrv_fetch_array($q);
  echo (float)$f[2] - (float)$f[3];
}

#get Flex Hours plus base hours
function getFlexBaseHours($day){
  $uname = $_SESSION['username'];
  $baseflex = "select distinct fixedS.EMP_ID, sum(DATEDIFF(MINUTE, cast(fixedS.START_MOMENT as time), cast(fixedS.STOP_MOMENT as time)) / 60) TimeWork,
                12 as FLexHours,
                (select count(distinct checksum(x.Date) + checksum(x.Interval)) / 2.00 FlexSignUp
                from AgentFlexSched x join schedule ef on x.Date = cast(ef.NOM_DATE as date) where replace(x.EMP_ID, ' ', '') = '$uname' and left(datename(dw,Date), 3) = '$day') FlexSignUp
                from empFixedSched fixedS
                where replace(fixedS.EMP_ID, ' ', '') = '$uname'
				and REPLACE(DOW, ' ', '') = '$day'
                group by fixedS.EMP_ID";
  $c = setConn();
  $q = sqlsrv_query($c, $baseflex) or die( print_r( sqlsrv_errors(), true));
  $f = sqlsrv_fetch_array($q);
  if(!empty($f)){
	  echo (float)$f[1] + (float)$f[3];
  }
  else{
		$baseflexRD = "select count(distinct checksum(x.Date) + checksum(x.Interval)) / 2.00 FlexSignUp
from AgentFlexSched x join schedule ef on x.Date = cast(ef.NOM_DATE as date) where replace(x.EMP_ID, ' ', '') = '$uname' 
and left(datename(dw,Date), 3) = '$day'";
		$cRD = setConn();
		$qRD = sqlsrv_query($cRD, $baseflexRD) or die( print_r( sqlsrv_errors(), true));
		$fRD = sqlsrv_fetch_array($qRD);
		
		echo (float)$fRD[0];
  }
  
}

function getIntervalFSSURD($day){
$uname = $_SESSION['username'];
$rd = "select distinct n.Date, 
convert(varchar(10),cast(N.Interval as time), 100) Interval,
cast(N.Interval as time) Interval2
from NetStaffing n
where left(datename(dw,cast(n.Date as date)), 3) = '$day'
and n.SignUpNet < n.OrigNet + n.Tolerance
and checksum(cast(n.Date as date)) + checksum(cast(n.Interval as time)) not in 
(SELECT checksum(cast(Date as date)) + checksum(cast(Interval as time)) gt FROM AgentFlexSched a WHERE n.Date = a.Date and cast(n.Interval as time) = cast(a.Interval as time)
and replace(a.EMP_ID, ' ','') = '$uname')
order by 1,3";
$c1 = setConn();
$q1 = sqlsrv_query($c1, $rd) or die( print_r( sqlsrv_errors(), true) );
$i1 = sqlsrv_fetch_array($q1);
do{
	if(!empty($i1)){
    echo '<tr>';
    echo "<td class='text-center'>";
    echo $i1[1];
    echo "</td><td>";
    echo "<span>";
    echo '<input type="checkbox" id="sub" onclick="subst();" name="cbinterval[]" value="'.$i1[0]->format('Y-m-d').','.$i1[1].'">';
    echo "</span></td>";
    echo '</tr>';
	}
} while($i1 = sqlsrv_fetch_array($q1));
 unset($day);
}
?>