<?php
session_name('webpeg');
session_start();
if (!isset($_SESSION['username'])) {
	header('Location:../login.php');
}
?>
