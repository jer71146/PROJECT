<?php
require_once 'db.php';
require_once 'functions.php';

if(verify_user($_POST['un'], $_POST['pw']))
{
	echo 'yes';
}
else
{
	echo 'no';
}
?>
