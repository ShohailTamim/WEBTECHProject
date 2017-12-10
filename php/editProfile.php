
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

		}
	}

	if(isset($_POST['submit']))
	{
		foreach ($xml->user as $user)
		{
			if($_SESSION['username']==$user->username)
			{
				$user->name=$_POST['name'];
				$user->email=$_POST['email'];
				$user->dob=$_POST['dob'];
				$user->gender=$_POST['gender'];

			}
		}
	
		file_put_contents("../xmlDB/users.xml",$xml->saveXML());
		$success="Profile Updated Successfully";
		header("Refresh:1");
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
								<legend><h3>EDIT PROFILE</h3></legend>
								<table >
									<tr>
										<td width="500">
											<span>Name</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<input type="text" name="name" value="<?php echo $name?>">
											<hr>
											<span>Email</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<input type="text" name="email" value="<?php echo $email ?>">&nbsp
											<hr>
											<span>Gender</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<input type="radio" name="gender" value="Male" <?php if($gender=="Male"){?> checked="checked" <<?php } ?>>Male
											<input type="radio" name="gender" value="Female"<?php if($gender=="Female"){?> checked="checked" <<?php } ?>>Female
											<input type="radio" name="gender" value="Other" <?php if($gender=="Other"){?> checked="checked" <<?php } ?>>Other
											<hr>
											<span>Date Of Birth : </span> &nbsp&nbsp&nbsp&nbsp
											<input type="text" name="dob" value="<?php echo $dob ?>">
											<br>
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:(dd/mm/yyyy)
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<hr>
											<input type="submit" value="submit" name="submit">
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
