<?
session_start();
	
require_once('site_core.php');
require_once('site_db.php');



if ($_SESSION['authenticated']) {
  header("Location: control_panel.php");
}
else {
  // Add the login code, i.e., if statement to check the key matches, otherwise print the form
    if ($_POST[user] != null) {
        $result=run_query("SELECT passwd FROM mh19baye_users WHERE userid = '$_POST[user]'");
        $row = $result -> fetch_assoc();
        $hashed_password = $row[passwd];
        if (password_verify($_POST[passwd], $hashed_password)) {
            $_SESSION['authenticated'] = true;
            header("Location: control_panel.php");
        } else {
            header("Location: login.php");
        }
    }
    else {
				echo_head("Login");
				echo '<div class="container">';
				
				echo '
				<form action="login.php" method="post">
				<label>Username: <input type="text" class="form-control" name="user"></label>
				<label>Password: <input type="password" class="form-control" name="passwd"></label>
				<input type="submit" class="btn btn-primary">	
				</form>';
				echo '</div>';
				echo_foot();	        
        
    }
}	




?>