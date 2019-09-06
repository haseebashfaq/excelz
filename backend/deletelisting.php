<?php
//session_start();
include 'db.php';
error_reporting(E_ERROR | E_PARSE);
if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {
    $user_id = $_SESSION["user_id"];
    $delete_id = $_POST['delete_id'];
    
    $deletelistingQuery = "DELETE FROM `event` WHERE `id`='$delete_id' AND `EventCreator_UserId` = '$user_id'";
    if($conn->exec($deletelistingQuery)){
        echo "deleted";
    } else {
        echo false;
    }
} else {
    echo false;
}
	// $mylistingsQuery = $conn->prepare("SELECT * FROM `listings` WHERE `event_creator` = '$useremail' ORDER BY `id` DESC"); 
 //    $mylistingsQuery->execute();
 //    $mylistingsCount = $mylistingsQuery->rowCount();
 //    $mylistingsResult = $mylistingsQuery->setFetchMode(PDO::FETCH_ASSOC); 
 //    if($mylistingsResult && $mylistingsCount > 0){
 //    	for($i1=0; $i1<=$mylistingsCount; $i1++) {
	// 		$mylistingsData = $mylistingsQuery->fetch(PDO::FETCH_ASSOC);
	// 		$mylistingId[$i1] = $mylistingsData['id'];
 //            $mylistingEventName[$i1] = $mylistingsData['eventname'];
 //            $mylistingCreatedAt[$i1] = $mylistingsData['created_at'];
	// 		$mylistingStatus[$i1] = $mylistingsData['status'];
	//     }
 //    } else {
 //    	echo false;
 //    }
?>