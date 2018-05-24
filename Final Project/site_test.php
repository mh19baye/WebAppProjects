<?
 require_once('site_core.php');
 echo_head('Site Test');
 echo '
  <div class="container">
	<div class="alert alert-primary" role="alert">
		This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-secondary" role="alert">
		This is a secondary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-success" role="alert">
		This is a success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-danger" role="alert">
		This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-warning" role="alert">
		This is a warning alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-info" role="alert">
		This is a info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-light" role="alert">
		This is a light alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<div class="alert alert-dark" role="alert">
		This is a dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
	</div>
	<button type="button" class="btn btn-primary">Primary</button>
	<button type="button" class="btn btn-secondary">Secondary</button>
	<button type="button" class="btn btn-success">Success</button>
	<button type="button" class="btn btn-danger">Danger</button>
	<button type="button" class="btn btn-warning">Warning</button>
	<button type="button" class="btn btn-info">Info</button>
	<button type="button" class="btn btn-light">Light</button>
	<button type="button" class="btn btn-dark">Dark</button>

	<button type="button" class="btn btn-link">Link</button>
  <div>';
 echo_foot();
?>