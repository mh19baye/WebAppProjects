<?
session_start();
	
require_once('site_core.php');

echo_head("Admin Login");
echo '<div class="container">';

if ($_SESSION['authenticated']) {
  echo '
    <div class="alert alert-info">Already logged in</div>
    <a href="admin_logout.php" class="btn btn-primary">Logout</a>
    <a href="insert_user.php" class="btn btn-secondary">Create New User</a>';
}
else {
  // Add the login code, i.e., if statement to check the key matches, otherwise print the form
    if ($_POST[key] == "pwd") {
        $_SESSION['authenticated'] = true;
        echo '<div class="alert alert-success">Admin Login Successful</div>
        <a href="admin_logout.php" class="btn btn-primary">Logout</a>
        <a href="insert_user.php" class="btn btn-secondary">Create New User</a>';
    }
    else {
        echo '
        <form action="admin_login.php" method="post">
        <label>Key: <input type="text" class="form-control" name="key"></label>
        <input type="submit" class="btn btn-primary">	
        </form>';
    }
}	



echo '</div>';
echo_foot();	
?>