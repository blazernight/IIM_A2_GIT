<?php session_start();
require('config/config.php');
require('model/functions.fn.php');


if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) 
&& !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) 
{

	userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']);
	header('Location: login.php');

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}


