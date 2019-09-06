<?php
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {
    $useremail = $_SESSION["email"];
	$mylistingsQuery = $conn->prepare("SELECT * FROM `listings` WHERE `event_creator` = '$useremail' ORDER BY `id` DESC");
	//query k under koi b USER value nahi hoy chaye.
    //SIMPLE!!! means query jo k execute se pehle tum banate ho us se pehle .
    //query should be pure of user data. you should implement user data like this see: http://php.net/manual/en/pdostatement.bindparam.php
    $mylistingsQuery->execute();
    $mylistingsCount = $mylistingsQuery->rowCount();
    $mylistingsResult = $mylistingsQuery->setFetchMode(PDO::FETCH_ASSOC); 
    if($mylistingsResult && $mylistingsCount > 0){
    	for($i1=0; $i1<=$mylistingsCount; $i1++) {
			$mylistingsData = $mylistingsQuery->fetch(PDO::FETCH_ASSOC);
			$mylistingId[$i1] = $mylistingsData['id']; //ese NO!!!
            $mylistingEventName[$i1] = $mylistingsData['eventname'];
            $mylistingCreatedAt[$i1] = $mylistingsData['created_at'];
			$mylistingStatus[$i1] = $mylistingsData['status'];
	    }
    } else {
    	echo false;
    }
}
?>