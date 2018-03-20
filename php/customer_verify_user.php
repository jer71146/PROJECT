<?php
require_once 'db.php';
require_once 'functions.php';

if(customer_verify_user($_POST['un'], $_POST['pw']))
{
	echo 'yes';
}
else
{
	echo 'no';
}
?>
