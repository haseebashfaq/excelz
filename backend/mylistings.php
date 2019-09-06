<?php
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {

    $user_id = $_SESSION["user_id"];
	$mylistingsQuery = $conn->prepare("SELECT * FROM `event` WHERE `EventCreator_UserId` = '$user_id' ORDER BY `id` DESC");

    $mylistingsQuery->execute();
    $mylistingsCount = $mylistingsQuery->rowCount();
    $mylistingsResult = $mylistingsQuery->setFetchMode(PDO::FETCH_ASSOC);

    if($mylistingsResult && $mylistingsCount > 0){
    	for($i1=0; $i1<=$mylistingsCount; $i1++) {
			$mylistingsData = $mylistingsQuery->fetch(PDO::FETCH_ASSOC);
			$mylistingId[$i1] = $mylistingsData['Id'];
            $mylistingEventName[$i1] = $mylistingsData['EventName'];
            $mylistingCreatedAt[$i1] = $mylistingsData['CreatedAt'];
			$mylistingStatus[$i1] = $mylistingsData['StatusId'];
	    }
    } else {
    	echo false;
    }
}
?>