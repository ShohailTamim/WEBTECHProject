<?php
session_start();
if(!isset($_SESSION['username']))
{		
	header('location: ../login.html');
	exit();
}
$xml=simplexml_load_file('../xmlDB/users.xml');

foreach ($xml->user as $user) 
{
	
	if($_SESSION['username']==$user->username)
	{

		$name=(string)$user->name;
		$username=(string)$user->username;
		$email=(string)$user->email;
		$dob=(string)$user->dob;
		$gender=(string)$user->gender;
		$image=(string)$user->image;

	}
}	
if(isset($_POST['submit']))
{
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = $_SESSION['name'].".".$fileActualExt;
				$fileDestination = '../img/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				foreach ($xml->user as $user)
						{
							if($_SESSION['username']==$user->username)
							{
								$user->image=$fileDestination;

							}
						}
	
				file_put_contents("../xmlDB/users.xml",$xml->saveXML());
				header('location: changepp.php');
				header("Refresh:0");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else {
		echo "You cannot upload files of this type!";
	}
}
?>