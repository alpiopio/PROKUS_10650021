<?php
//Author	 : Muhammad Alfiansyah
//NIM		 : 10650021
//University : UIN Sunan Kalijaga

$dir = explode("/",$_SERVER['REQUEST_URI']);
$host = $dir[0];

echo "<html>";
echo "<head>";
echo "<title>Payment Successful</title>";
echo "<link href='projek-khusus.css' rel='stylesheet'>";
echo "</head>";

echo "<body>";
	echo "<div id='body'>";
	echo "<div id='success'>Payment Successful</div>";
	echo "<div id='pesan'><a href='".$host."/paypal/projek-khusus.php'>back to shop page ></a></div>";
	echo "</div>";
echo "</body>";
echo "</html>";
?>