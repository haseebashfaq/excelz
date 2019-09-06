<?php
include_once("db_connect.php");
$sqlEvents = "SELECT * FROM event where StatusId = 1";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['StartDate']) * 1000;
	$end = strtotime($rows['EndDate']) * 1000;
	$calendar[] = array(
        'id' =>$rows['Id'],
        'title' => $rows['EventName'],
        'url' => 'event_detail?event_id='.$rows['Id'],
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>