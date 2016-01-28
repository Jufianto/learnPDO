<?php
if(isset($_POST['action'])){
  session_name('webpeg');
  session_start();
  require_once 'config.php';
  $username = $_REQUEST['username'];
  $password= $_REQUEST['password'];
  $sql = "select * from admin where username='$username' && password='$password'";
  $stmt = $conn->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_OBJ);
  $stmt->execute();
  $obj = $stmt->fetch();
  if ($obj) {
	$_SESSION['username'] = $obj->username;
	header('Location:index.php');
} else {
	header('Location:login.php');
}
}
 ?>
<html>
    <head>

        <link type="text/css" rel="stylesheet" href="css/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="css/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="css/js/materialize.js"></script>

        <title>Login</title>
    </head>
<div class="container">
            <h2>Login</h2>

            <div class="row">
                <form class="col s6" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" class="validate" name="username">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pass" type="password" class="validate" name="password">
                            <label for="pass">Password</label>
                        </div>
                        <i>*Login Menggunakan username = admin , password = admin</i>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Login</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
</body>
</html>
