<?php 

if($_SESSION["dil"] == "tr")
{
	 require 'vendor/lang/tr.php';
}
elseif($_SESSION["dil"] == "en")
{
	 require 'vendor/lang/en.php';
} 
else{
	 $_SESSION["dil"] = "tr";
	 require 'vendor/lang/tr.php';
}
?>