<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		$user = userConnection($db, $_POST['email'], $_POST['password']);

		if($user == true){
			header('Location: dashboard.php');
		} else {
			header('Location: login.php');
		}

	// 	// Force user connection to access dashboard
	// 	userConnection($db, 'git@initiation.com', 'password');
		
	// 	header('Location: dashboard.php');

	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';