<?
session_start();

require_once('site_core.php');
require_once('site_db.php');

echo_head("Control Panel");
if (!$_SESSION['authenticated']) {
  echo '
    <div class="alert alert-info">You Must Log In</div>
    <a href="login.php" class="btn btn-primary">Login</a>';
}
else {
echo '
    <div>
        <a href= "index.php" class="btn btn-sm btn-info">View Site</a>
        <a href= "logout.php" class="btn btn-sm btn-danger">Logout</a>
	</div>
    <h2>Control Panel</h2>
    <h3>Show Table</h3>
    <ul>
        <li><a href="show_table.php?table=mh19baye_pages">Pages</a></li>
        <li><a href="show_table.php?table=mh19baye_asides">Asides</a></li>
        <li><a href="show_table.php?table=mh19baye_has_aside">Has_Aside</a></li>
        <li><a href="show_table.php?table=mh19baye_users">Users</a></li>
    </ul>
    <h3>Create</h3>
    <ul>
        <li><a href="insert_page.php">Create New Page</a></li>
        <li><a href="insert_aside.php">Create New Aside</a></li>
        <li><a href="insert_has_aside.php">Create New Aside Relationship</a></li>
        <li><a href="insert_user.php">Create New User</a></li>
    </ul>
    <h3>Update</h3>
    <ul>
        <li><a href="basic_update.php">Update Page</a></li>
        <li><a href="update_aside.php">Update Aside</a></li>
        <li><a href="update_has_aside.php">Update Aside Relationship</a></li>
        <li><a href="update_user.php">Update User</a></li>
    </ul>
    <h3>Delete</h3>
    <ul>
        <li><a href="basic_delete.php">Delete Page</a></li>
        <li><a href="delete_asides.php">Delete Aside</a></li>
        <li><a href="delete_has_aside.php">Delete Aside Relationship</a></li>
        <li><a href="delete_user.php">Delete User</a></li>
    </ul>';    
 }   
 
?>