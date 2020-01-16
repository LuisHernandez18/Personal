<?php
	//Part 1
	// File name: simplemail.php
	/*$sendtoemail = "thedaydreamer894@gmail.com";
	$mysubject = "Test";
	$mymessage = "This is a test email message";
	$myheaders = "From: thedaydreamer894@gmail.com";
	mail($sendtoemail,$mysubject,$mymessage,$myheaders);
	echo "Mail sent";
*/

	// Part 2
	// Variables to capture what was sent in the form
	$useremail = $_POST['useremail'];
	$sendtoemail = "thedaydreamer894@gmail.com, $useremail";
	$usersubject = $_POST['mylist'];
	$username = $_POST['username'];
	$usermessage = $_POST['usermessage'];	
	$theheaders = 'From: ' . $username . $useremail;
	mail($sendtoemail,$usersubject,$usermessage,$theheaders);
	echo 'Mail sent<br><br>'; 
	echo 'User email: ' . $useremail . '<br>';
	echo 'User name: ' . $username . '<br>';
	echo 'User subject: ' . $usersubject . '<br>';
	echo 'Message sent: ' . $usermessage .'<br>';

	//Part 3
	$servername = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "mail";

	// Create connection
	$conn = mysqli_connect($servername, $dbuser, $dbpass, $db);
	if (!$conn) {
		die("CONNECTION FAILED: " . mysqli_connect_error());
	}
	echo "CONNECTION SUCCESSFULL <br>";

	$sql = "INSERT INTO clients (id, email, name, subject, message) VALUES ('', '$useremail', '$username', '$usersubject', '$usermessage')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
