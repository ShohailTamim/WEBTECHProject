<?php 
$success="";
if(isset($_REQUEST['Reg'])){
	$xml=new DOMDocument("1.0","UTF-8");
	
	if(!(file_exists("../xmlDB/users.xml")) )
	{
	   	$users = $xml->createElement("users");
	   	$users = $xml->appendChild($users);

	   	$xml->FormatOutput =true;
	   	$string_value=$xml->saveXML();
	   	$xml->save("../xmlDB/users.xml");
	} 
	$xml->load("../xmlDB/users.xml");
	$rootTag=$xml->getElementsByTagName("users")->item(0);
	$dataTag=$xml->createElement("user");

	if((strtolower($_REQUEST['username'])=="admin") && (strtolower($_REQUEST['name'])!="tamim"))
	{
			$success="Cant not register as admin";
			header("Refresh:4");
	}
	elseif( $_REQUEST['password'] !=$_REQUEST['cpassword'])
	{
		$success="Passwords do not match";
		header("Refresh:4");
	}
	else
	{
		$nameTag=$xml->createElement("name",$_REQUEST['name']);
		$emailTag=$xml->createElement("email",$_REQUEST['email']);
		$usernameTag=$xml->createElement("username",$_REQUEST['username']);
		$passwordTag=$xml->createElement("password",$_REQUEST['password']);
		$genderTag=$xml->createElement("gender",$_REQUEST['gen']);
		$imageTag=$xml->createElement("image","");

	    $day=$_REQUEST['day'];
	    $month=$_REQUEST['month'];
	    $year=$_REQUEST['year'];

	    $dob=$day."/".$month."/".$year;

	    $dobTag=$xml->createElement("dob",$dob);

	    $dataTag->appendChild($nameTag);
	    $dataTag->appendChild($emailTag);
	    $dataTag->appendChild($usernameTag);
	    $dataTag->appendChild($passwordTag);
	    $dataTag->appendChild($genderTag);
	    $dataTag->appendChild($dobTag);
	    $dataTag->appendChild($imageTag);

	    $rootTag->appendChild($dataTag);
	    $xml->save("../xmlDB/users.xml");

	    $success="Registered successfully";
	    header("Refresh:4");
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
<form method="post">
	<table width="60%" border="1" align="center">
		<tr align="right">
			<td colspan="3" >
				<iframe src="../frame/tempFrame1.html" align="center" width="100%" height="60%" frameborder="0" scrolling="no" ></iframe>

				<span >
					&nbsp&nbsp&nbsp	<a href="../index.html">Home  </a>&nbsp &nbsp 
					|| &nbsp&nbsp&nbsp <a href="../login.html">Login</a> &nbsp 
				</span> 
			</td>
		</tr>
		<tr>
			<td height="350"  align="center" >
				<table border="0">
					<tr>
						<span><?php echo $success ?></span>
					</tr>
					<tr> 
						<td width="450">
							<fieldset>
								<legend><h3>REGISTRATION</h3></legend>
								<table>
									<tr>
										<td width="150">
											<span>Name</span>
										</td>
										<td>
											:&nbsp<input type="text" name="name">
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="150">
											<span>Email</span>
										</td>
										<td>
											:&nbsp<input type="text" name="email">
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="150">
											<span>User Name</span>
										</td>
										<td>
											:&nbsp<input type="text" name="username">
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="150">
											<span>Password</span>
										</td>
										<td>
											:&nbsp<input type="Password" name="password">
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="150">
											<span>Confirm Password</span>
										</td>
										<td>
											:&nbsp<input type="Password" name="cpassword">
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="450">
											<fieldset>
												<legend>Gender</legend>
												<input type="radio" name="gen" value="Male">Male
												<input type="radio" name="gen" value="Female">Female
												<input type="radio" name="gen" value="Other">Other
											</fieldset>
										</td>
									</tr>
								</table>
								<hr>
								<table>
									<tr>
										<td width="450">
											<fieldset>
												<legend>Date of Birth</legend>
												<table>
													<tr>
														<td >
															<input type="text" name="day" placeholder="Day" size="7"> /
														</td>
														<td>
															<input type="text" name="month" placeholder="Month" size="7"> /
														</td>
														<td>
															<input type="text" name="year" placeholder="Year" size="7">
														</td>
														<td>
															&nbsp(dd/mm/yyyy)
														</td>
													</tr>
												</table>
											</fieldset>
										</td>
									</tr>

								</table>
								<hr>
								<input type="submit" name="Reg" value="Register">
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