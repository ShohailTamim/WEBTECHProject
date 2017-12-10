<?php
session_start();
$xml=new DOMDocument("1.0","UTF-8");
$xml->load("../xmlDB/log.xml");
$rootTag=$xml->getElementsByTagName("logs")->item(0);
$dataTag=$xml->getElementsByTagName("user")->item(0);

date_default_timezone_set("Asia/Dhaka");
$currentDateTime = date('Y-m-d H:i');
$logoutTag=$xml->createElement("LogoutDate",$currentDateTime);

$dataTag->appendChild($logoutTag);

$rootTag->appendChild($dataTag);
$xml->save("../xmlDB/log.xml");

session_destroy();
header('location: ../login.html')
?>