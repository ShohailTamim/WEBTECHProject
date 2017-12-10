<?php
$success="";
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
	<title>Edit Profile</title>
</head>
<body>
<form method="post">
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
			<tr align="left" >
			<td></td>
			<td colspan="2">
				<nav>
					<button type="button" onclick="location.href='studentDashboard.php'">Home</button>
					<button type="button" onclick="location.href='profile.php'">Profile</button>
					<button type="button" onclick="location.href='uploadproject.php'">Upload Project</button>
					<button type="button" onclick="location.href='topproject.php'">Top Project</button>
					
				</nav>
			</td>
		</tr>
			<td valign="top" width="25%">
				<span>Profile</span>
				<hr width="150" align="left" size="4">
				<ul>
					<li type="square"><a href="loggedin.php">Dashboard</a></li>
					<li type="square"><a href="profile.php">View Profile</a></li>
					<li type="square"><a href="changepp.php">Change Profile Picture</a></li>
					<li type="square"><a href="changepass.php">Change Password</a></li>
					<li type="square"><a href="logout.php">Logout</a></li>
				</ul>
			</td>
			<td valign="top" height="350" align="center">
				<table>
					<tr>
						<span><?php echo $success ?></span>
					</tr>
					<tr>
						<td>
							<fieldset>
								<legend><h3>UPLOAD PROJECT</h3></legend>
								<table >
									<tr>
										<td width="500">
											<span>Project Title</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<input type="text" name="projectTitle">
											<hr>
											<span>Description</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<input type="text" name="description">&nbsp
											<hr>
										
											<span>YouTube Link</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<input type="text" name="youtubeLink">

											
											<hr>
											Upload Prject :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" name="propjectfile">

											
								
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<hr>
										
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<input type="submit" value="Publish" name="submit">
											 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button onclick="document.location.href='../php/home.php'">Cancel</button>
										</td>
									</tr>
								</table>
							</fieldset>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr align="right">
			<td colspan="3">
				<iframe src="../frame/tempFrame2.html" align="center" width="100%" height="30%" frameborder="0" scrolling="no"></iframe>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
