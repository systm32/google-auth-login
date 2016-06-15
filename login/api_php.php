<?php
session_start();
if(!isset($_SESSION['google_data'])){
	header("Location:index.php");
}else
{
	echo json_encode($_SESSION);
}

?>