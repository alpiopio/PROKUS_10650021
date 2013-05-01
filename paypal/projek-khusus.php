<?php
//Author	 : Muhammad Alfiansyah
//NIM		 : 10650021
//University : UIN Sunan Kalijaga

require 'db_config.php';
$dir = explode("/",$_SERVER['REQUEST_URI']);
$host = $dir[0];
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
$paypal_id = 'twins._1361875184_biz@gmail.com';
$cancel_url = 'http://localhost/paypal/cancels.php';
$success_url = 'http://localhost/paypal/succes.php';

echo "<head>";
echo "<title>PayPal</title>";
echo "<link href='projek-khusus.css' rel='stylesheet'>";
echo "</head>";

echo "<html>";
echo "<body>";
echo "<div id='body'>";
echo "<div id='success'>Seephylliz Shop</div>";
echo "<div id='pesan'><a href='".$host."/paypal/projek-khusus.php'>Most Wanted Product</a></div>";
$result = mysql_query("SELECT * from product");
while($row = mysql_fetch_array($result)) {
	echo "<div id='product'>";
		echo "<div id='image'><img src='images/".$row['image']."'></div>";
		echo "<div id='name'>".$row['name']." (".$row['price']."$)</div>";
		echo "<div id='button'>";
			echo "<form method='post' name='frmPayPal1' action='".$paypal_url."'>";
				echo "<input type='hidden' name='business' value='".$paypal_id."'>";
				echo "<input type='hidden' name='cmd' value='_xclick'>";
				echo "<input type='hidden' name='item_name' value='".$row['name']."'>";
				echo "<input type='hidden' name='item_number' value='".$row['id']."'>";
				echo "<input type='hidden' name='amount' value='".$row['price']."'>";
				echo "<input type='hidden' name='no_shipping' value='1'>";
				echo "<input type='hidden' name='currency_code' value='USD'>";
				echo "<input type='hidden' name='handling' value='0'>";
				echo "<input type='hidden' name='cancel_return' value='".$cancel_url."'>";
				echo "<input type='hidden' name='return' value='".$success_url."'>";
				echo "<input type='image' src='images/buy.png' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>";
				echo "<img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='0' height='0'>";
			echo "</form>";
		echo "</div>";
	echo "</div>";
}
echo "</div>";
echo "</body>";
echo "</html>";
?>