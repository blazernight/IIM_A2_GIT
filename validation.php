<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	$isEmailAvailable = isEmailAvailable($db, $_POST['email']);
	$isUsernameAvailable = isUsernameAvailable($db, $_POST['username']);
	if($isEmailAvailable == true && $isUsernameAvailable == true){
		$userRegistration = userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']);
		header('Location: login.php');
	}
	elseif($isEmailAvailable == false && $isUsernameAvailable == true){
		$_SESSION['message'] = 'Erreur : Email non disponible';
		header('Location: register.php');
	}
	elseif($isEmailAvailable == true && $isUsernameAvailable == false){
		$_SESSION['message'] = 'Erreur : Username non disponible';
		header('Location: register.php');
	}


}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}