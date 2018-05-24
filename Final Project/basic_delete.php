<?

require_once('site_core.php');
require_once('site_db.php');
require_once('site_forms.php');

// Set the title of the page
$title = "Delete Page";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
    $result = run_query("SELECT pageid, title FROM mh19baye_pages");
    
    $pages = array();
    while($row = $result->fetch_assoc()){
        $pages[ $row['pageid'] ] = $row['title'];
    }
    
    echo '
        <form method ="get" action="basic_delete.php">'. return_option_select('id',$pages,'Select a page'). '<input type="submit">
        </form>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM mh19baye_pages WHERE pageid='$id'";
	run_query($sql);

	// $sql = "DELETE FROM asides WHERE asideid='$id'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$id.'</b> was deleted from <b>pages.</b></p>
	<a href="control_panel.php" class="btn btn-primary">Control Panel</a>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b>?</p>
		<p>
			<a href="basic_delete.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
			<a href="basic_delete.php" class="btn btn-warning">Cancel</a>
		</p>';
}

echo '</div>';

echo_foot();

?>