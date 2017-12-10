
<?php
$notmatch="";
$wrongCurrentpass="";
$success="";
session_start();
if(!isset($_SESSION['username']))
{		
	header('location: ../login.html');
	exit();
}

if(isset($_POST['submit']))
{
	$xml=simplexml_load_file('../xmlDB/users.xml');
	
	foreach ($xml->user as $user) 
	{
	
		if($_SESSION['username']==$user->username)
		{
			if($user->password==$_POST['Currentp'])
			{
				if($_POST['newpass']==$_POST['confirmNewpass'])
				{
					$user->password=$_POST['newpass'];
					file_put_contents("../xmlDB/users.xml",$xml->saveXML());
					$success="Password Changed Successfully";
					header("Refresh:2");
				}
				else {
					$notmatch= "password do not match";
					header("Refresh:1");
					
				}				
			}
			else 
			{
				$wrongCurrentpass= "password do not match";
				header("Refresh:1");
			}
		}
		
	}
}
	
?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
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
				<span>Change Password</span>
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
						<td width="500">
							<fieldset>
								<legend><h3>CHANGE PASSWORD</h3></legend>
								<table >
									<tr>
										<td>
											<span>Current Password</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<input type="text" name="Currentp">											
											<br>
											<span ><?php echo $wrongCurrentpass ?></span>
											<hr>
											<span>New Password</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<input type="text" name="newpass">
											<br><br>
											<span>Confirm Password</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:
											<input type="text" name="confirmNewpass">
											<br>
											<span><?php echo $notmatch ?></span>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<hr>
											<input type="submit" name="submit" value="Confirm Change">
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
