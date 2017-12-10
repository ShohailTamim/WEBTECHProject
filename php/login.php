<?php 

$error=false;

session_start();
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$xml=simplexml_load_file('../xmlDB/users.xml');
	$i=0;
	$len=count($xml->user);
	foreach ($xml->user as $user) 
	{
		$i++;
		if($username==$user->username)
		{
			if($password == $user->password)
			{
				//session_start();

				$_SESSION['name'] = (string)$user->name;
				$_SESSION['username'] = $username;
				//Login history
				$xml=new DOMDocument("1.0","UTF-8");
				if(!(file_exists("../xmlDB/log.xml")) )
				{
				   	$logs = $xml->createElement("logs");
				   	$logs = $xml->appendChild($logs);

				   	$xml->FormatOutput =true;
				   	$string_value=$xml->saveXML();
				   	$xml->save("../xmlDB/log.xml");
				} 
				$xml->load("../xmlDB/log.xml");
				$rootTag=$xml->getElementsByTagName("logs")->item(0);
				//
				$dataTag=$xml->createElement("user");

				date_default_timezone_set("Asia/Dhaka");
				$currentDateTime = date('Y-m-d H:i');
				$loginTag=$xml->createElement("LoginDate",$currentDateTime);
				$nameTag=$xml->createElement("name",$_SESSION['name']);

				$dataTag->appendChild($nameTag);
			    $dataTag->appendChild($loginTag);

			    $rootTag->appendChild($dataTag);
			    $xml->save("../xmlDB/log.xml");

				
				//end of login history
				header('location: loggedin.php');

				exit();
			}
			else
			{

				header('location: ../login.html');
				exit();
			}			
		}	
		if($username!=$user->username && $i==$len)
		{ 
		    header('location: ../login.html');
			exit();
		}		
	}

	$error=true;	
}
?>