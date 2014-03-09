<?php

//echo base64_encode('http://www.edrants.com/wp-content/uploads/2009/09/placeholder.jpg');
//echo "<br>";
//echo base64_encode(file_get_contents('http://www.edrants.com/wp-content/uploads/2009/09/placeholder.jpg'));
$url =$_GET["url"];
if(preg_match('/base64/',$url))
	echo '<img src="'.str_replace(" ", "+", $url).'"><br>';
else
	echo '<img src="data:image/jpeg;base64,'.base64_encode(file_get_contents($url)).'"><br>';

?>