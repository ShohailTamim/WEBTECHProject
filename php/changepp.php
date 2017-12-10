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
	<title>Edit Profile</title>
</head>
<body>
<form method="POST" action="uploadpp.php" enctype="multipart/form-data">
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
			<td valign="top" width="25%">
				<span>Change Profile Picture</span>
				<hr width="150" align="left" size="4">
				<ul><li type="square"><a href="studentDashboard.php">Home</a></li>
					<li type="square"><a href="loggedin.php">Dashboard</a></li>
					<li type="square"><a href="profile.php">View Profile</a></li>
					<li type="square"><a href="changepp.php">Change Profile Picture</a></li>
					<li type="square"><a href="changepass.php">Change Password</a></li>
					<li type="square"><a href="logout.php">Logout</a></li>
				</ul>
			</td>
			<td valign="top" height="350">
				<table>
					<tr>
						<td width="500">
							<fieldset>
								<legend><h3>PROFILE PICTURE</h3></legend>
								<table >
									<tr>
										<td align="center">
											<img src=<?php echo $image ?> alt=<?php echo $_SESSION['name'] ?> width="150" height="200">
											<br><br>
											<input type="file" name="file">
										</td>
										</td>
									</tr>
									<tr>
										<td >
											<hr>
											<button type="submit" name="submit">Upload</button>
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
