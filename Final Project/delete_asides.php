<?

require_once('site_core.php');
require_once('site_db.php');
require_once('site_forms.php');

// Set the title of the page
$title = "Delete Aside";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
    $result = run_query("SELECT asideid, title FROM mh19baye_asides");
    
    $asides = array();
    while($row = $result->fetch_assoc()){
        $asides[ $row['asideid'] ] = $row['title'];
    }
    
    echo '
        <form method ="get" action="delete_asides.php">'. return_option_select('id',$asides,'Select an aside'). '<input type="submit">
        </form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM mh19baye_asides WHERE asideid='$id'";
	run_query($sql);

	echo '<p><b>'.$id.'</b> was deleted from <b>asides.</b></p>
	<a href="control_panel.php" class="btn btn-primary">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b>?</p>
		<p>
			<a href="delete_asides.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
			<a href="delete_asides.php" class="btn btn-warning">Cancel</a>
		</p>';
}

echo '</div>';

echo_foot();

?>