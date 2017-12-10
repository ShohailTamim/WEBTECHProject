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

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
</head>
<body>
	<table width="60%" border="1" align="center">
		<tr align="right">
			<td colspan="3" >
				<iframe src="../frame/tempFrame1.html" align="center" width="100%" height="60%" frameborder="0" scrolling="no" ></iframe>

				<span >
					Logged in as <a href="loggedin.php"><?php echo $_SESSION['username'] ?></a>
					&nbsp&nbsp | &nbsp&nbsp	<a href="logout.php">Logout</a>
				</span> 
			</td>
		</tr>
		<tr>
			<!-- Changes will apply here -->
							<td valign="top" width="25%">
				<span>Upload Project</span>
				<hr width="150" align="left" size="4">
				<ul><li type="square"><a href="studentDashboard.php">Home</a></li>
					<li type="square"><a href="loggedin.php">Your All Projects</a></li>
					<li type="square"><a href="profile.php">Upload a new Project</a></li>
				</ul>
			</td>
			<td valign="top" height="350" align="center">
				<table>
					<tr>
						<td>
							<fieldset>
							
								<table>
									<tr>
										<td width="500">
										
											<h3> Project title:</h3> <!-- Changes will apply here <a> tag will apply here -->
											<span>Rating</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
											<hr>
											<span>upload date</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
											<hr>
											<span>Position</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<hr>
								
										</td>
										
										

										
									</tr>
									<tr>
										
											
										</td>
									</tr>
								</table>
								
								
								<table>
									<tr>
										<td width="500">
										
											<h3> Project title:</h3> <!-- Changes will apply here <a> tag will apply here -->
											<span>Rating</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
											<hr>
											<span>upload date</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 
											<hr>
											<span>Position</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<hr>
								
										</td>
										
										

										
									</tr>
									<tr>
										
											
										</td>
									</tr>
								</table>
							
						</td>
					</tr>
				</table>
			</td>
			<!-- Changes will apply upto here -->
		</tr>
		<tr align="right">
			<td colspan="3">
				<iframe src="../frame/tempFrame2.html" align="center" width="100%" height="30%" frameborder="0" scrolling="no"></iframe>
			</td>
		</tr>
	</table>
</body>
</html>