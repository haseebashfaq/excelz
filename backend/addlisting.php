
<?php
session_start();
include 'db.php';
if(isset($_POST["submit"])){
$is_email_eligible=0; 
$eventname = $_POST['eventname'];
$eventcategory = $_POST['eventcategory'];
$eventtype = $_POST['eventtype'];
$location_venue = $_POST['location_venue'];
$street_address = $_POST['street_address'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$country_location = $_POST['country_location'];
$size = $_POST['size'];
$speaker1 = $_POST['speaker1'];
$speaker2 = $_POST['speaker2'];
$speaker3 = $_POST['speaker3'];
$speaker4 = $_POST['speaker4'];
$contactperson_details_name = $_POST['contactperson_details_name'];
$contactperson_details_email = $_POST['contactperson_details_email'];
$contactperson_details_phone = $_POST['contactperson_details_phone'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$registration_time = $_POST['registration_time'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$ticket_price = $_POST['ticket_price'];
$additional_information = $_POST['additional_information'];
$upload_photo = 'upload/'.$_FILES['upload_photo']['name'];
$registration_url = $_POST['registration_url'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$status = 'pending';
$event_creator = $_SESSION["email"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$deleted_at = date("Y-m-d H:i:s");


$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES['upload_photo']['name']);
move_uploaded_file($_FILES['upload_photo']['tmp_name'], $uploadfile);

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename('speaker1'.$_FILES['upload_speaker1']['name']);
move_uploaded_file($_FILES['upload_speaker1']['tmp_name'], $uploadfile);

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename('speaker2'.$_FILES['upload_speaker2']['name']);
move_uploaded_file($_FILES['upload_speaker2']['tmp_name'], $uploadfile);

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename('speaker3'.$_FILES['upload_speaker3']['name']);
move_uploaded_file($_FILES['upload_speaker3']['tmp_name'], $uploadfile);

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename('speaker4'.$_FILES['upload_speaker4']['name']);
move_uploaded_file($_FILES['upload_speaker4']['tmp_name'], $uploadfile);


if($conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)) {
    $addlistingQuery = "INSERT INTO event (EventName, eventcategory, eventtype, Venue, StreetAddress, State, City, ZipCode, Country, EventSize, speaker1, speaker2, speaker3, speaker4, contactperson_details_name, contactperson_details_email, contactperson_details_phone, start_date, end_date, registration_time, start_time, end_time, ticket_price, additional_information, upload_photo, registration_url, fullname, email, status, event_creator, created_at, updated_at, deleted_at) VALUES ('$eventname', '$eventcategory', '$eventtype', '$location_venue', '$street_address', '$state', '$city', '$zip_code', '$country_location', '$size', '$speaker1', '$speaker2', '$speaker3', '$speaker4', '$contactperson_details_name', '$contactperson_details_email', '$contactperson_details_phone', '$start_date', '$end_date', '$registration_time', '$start_time', '$end_time', '$ticket_price', '$additional_information', '$upload_photo', '$registration_url', '$fullname', '$email', '$status', '$event_creator', '$created_at', '$updated_at', '$deleted_at')";
	//error_log(print_r($addlistingQuery, true));
	 if($conn->exec($addlistingQuery)){
    	$is_email_eligible = 1;
        echo true;
		 //echo "<script> window.location.href = '../dashboard.php';  </script>";
    } else {
        echo false;
    }
}

if($is_email_eligible==1) {
	 require_once 'PHPMailer/class.smtp.php';
        //require 'PHPMailer/PHPMailerAutoload.php';
         require 'PHPMailer/class.phpmailer.php';
	//PHPMailer Object
	$mail = new PHPMailer;

	//From email address and name
	$mail->From = "arthur.zablocki@gmail.com";
	$mail->FromName = "Excelz Contact Form";

	//To address and name
	$mail->addAddress("wajahatdayala@gmail.com", "Arthur");
	// $mail->addAddress("info@traseno.com", "Traseno Admin"); //Recipient name is optional

	//Address to which recipient will reply
	$mail->addReplyTo($email, $name);

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Excelz New Listing Received";
	 $mailContent =  "Hello Excelz Admin,<br><br>You have got a new listing request from Excelz. Please have a look at the details:<br><br><b>Event Name</b>: ".$eventname."<br><b>Event Category</b>: ".$eventcategory."<br><b>Event Type</b>: ".$eventtype."<br><b>Location Venue</b>: ".$location_venue."<br><b>Street</b>: ".$street_address."<br><b>State</b>: ".$state."<br><b>City</b>: ".$city."<br><b>Zip Code</b>: ".$zip_code."<br><b>Country</b>: ".$country_location."<br><b>Event Size</b>: ".$size."<br><b>Speaker1</b>: ".$speaker1."<br><b>Speaker2</b>: ".$speaker2."<br><b>Speaker3</b>: ".$speaker3."<br><b>Speaker4</b>: ".$speaker4."<br><b>Contact Person's Name</b>: ".$contactperson_details_name."<br><b>Contact Person's Email</b>: ".$contactperson_details_email."<br><b>Contact Person's Phone</b>: ".$contactperson_details_phone."<br><b>Start Date</b>: ".$start_date."<br><b>End Date</b>: ".$end_date."<br><b>Registration Time</b>: ".$registration_time."<br><b>Start Time</b>: ".$start_time."<br><b>End Date</b>: ".$end_time."<br><b>Ticket Price</b>: ".$ticket_price."<br><b>Additional Information</b>: ".$additional_information."<br><b>Registration URL</b>: ".$registration_url."<br><b>Full Name</b>: ".$fullname."<br><b>Email</b>: ".$email."<br><b>Request Time</b>: ".$created_at;
	// $mail->AltBody = "This is the plain text version of the email content";


// for send an attatchment    
    $path       = "upload/";
    $file_name  = $_FILES['upload_photo']['name'];
	$mail->Body = $mailContent;
    $mail->addAttachment($path.$file_name);
	
	 $path       = "upload/";
    $file_name  = $_FILES['upload_photo']['name'];
	$mail->Body = $mailContent;
    $mail->addAttachment($path.$file_name);

//speaker 1
    $path       = "upload/";
    $file_name  = 'speaker1'.$_FILES['upload_speaker1']['name'];
    $mail->addAttachment($path.$file_name);
   
      $mail->SMTPOptions = array(
		'ssl' => array(

			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true

		)

	);
	
	if(!$mail->send()) 
	{
	   echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	   echo "sent";
           echo "<script> window.location.href = '../dashboard.php';  </script>";
	}
} else {
	return false;
}
}
?>

