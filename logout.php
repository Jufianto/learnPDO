<?php
session_name('webpeg');
session_start();
session_destroy();
header('Location:index.php');
 ?>
