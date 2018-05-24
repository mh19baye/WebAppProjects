<?

require_once('site_core.php');
require_once('site_forms.php');
require_once('site_db.php');

// Set the title of the page
$title = "Update Aside";

// Echo the HTML head with title
echo_head($title);

// Echo Bootstrap container 
echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

// Get the page id and action
$id = $_GET['id'];
$action = $_GET['action'];

// If the id is null/blank
if ($id == '') {
	
	// Get the pageid and title of all pages
	$result = run_query("SELECT asideid, title FROM mh19baye_asides");
	
	// Transform it into an associative array
	$asides = array();
	while ($row = $result->fetch_assoc()) {
		$asides[ $row['asideid'] ] = $row['title'];
	}
	
	// Generate a dropdown menu of all the asides
	echo '
		<form method="get" action="update_aside.php">'.
			return_option_select('id',$asides,'Select an aside').'
			<input type="submit">
			<a href="control_panel.php" class="btn btn-primary">Control Panel</a>
		</form>';
}
// If action is update
else if ($action=='update') {

	// Get the posted form data
	$title = $_POST['title'];
	$content = addslashes($_POST['content']);
	$color = $_POST['color'];
	
	// Form the query
	$sql = "UPDATE mh19baye_asides SET title = '$title', content = '$content', color = '$color' WHERE asideid='$id'";

	// Run the query
	run_query($sql);
	
	// Echo feedback
	echo '
		<p><a href="index.php?asideid='.$id.'">'.$id.'</a> was updated from asides</p>
		<a href="control_panel.php" class="btn btn-primary">Control Panel</a>';
}

// If the id is given but action is not update
else {
	
	// Get all the pages to generate the parent drop down
	$result = run_query("SELECT asideid, title FROM mh19baye_asides");
	$asides = array();
	while ($row = $result->fetch_assoc()) {
		$asides[ $row['asideid'] ] = $row['title'];
	}	
	
	// Get the data for the selected page
	$result = run_query("SELECT * FROM mh19baye_asides WHERE asideid='$id'");
	$values = $result->fetch_assoc();
	
	
	// Ouput the edit form
	echo '
		<form action="update_aside.php?action=update&id='.$id.'" method="post">
			<label>Aside ID: </label> <b>'.$id.'</b><br>'.
			return_input_text('title','Aside Title',$values['title'],true).
			return_textarea('content','Aside Content',$values['content']). 	
			return_input_text('color','Color',$values['color']).'
			<input type="submit" class="btn btn-primary" value="Update">
			<a href="control_panel.php" class="btn btn-secondary">Control Panel</a>
		</form>';	
}

echo '</div>';

echo_foot();

?>