<?php

session_start();
	if($_SESSION['username']=='admin')
	{
		header('location: ../php/loggedin.php');
		exit();
	}
	if(!isset($_SESSION['username']))
	{		
		header('location: ../login.html');
		exit();
	}
	$xml=simplexml_load_file('../xmlDB/log.xml');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logged In</title>
</head>
<body width="1200">
<form method="post" action="uploadpp.php">
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
		<tr>
			<td valign="top" width="25%">
				<span>Dashboard</span>
				<hr width="150" align="left" size="4">
				<ul>
					<li type="square"><a href="studentDashboard.php">Home</a></li>
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
					<td>
						<fieldset>
							<legend><h3>Welcome Oraganization <?php echo $_SESSION['name'] ?></h3></legend>
							
							<table border="1" style="overflow-y: scroll;">
								<tr>
									<th width="200px">Login Date Time</th>
									<th width="200px">Logout Date Time</th>
								</tr>
								<?php foreach ($xml->user as $user) : if($_SESSION['name']==$user->name){?>
							    <tr>
							      <td><?php echo $user->LoginDate; ?></td>
							      <td><?php echo $user->LogoutDate; ?></td>
							    </tr>
								<?php } endforeach; ?>
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
