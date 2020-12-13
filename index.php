<?php 
	
require_once 'connect.php';


if( $_SERVER['REQUEST_URI'] == "/"){
	$title = "Главая страница";
	require_once 'header.php';
	require_once 'content.php';
}

if ($_SERVER['REQUEST_URI'] == "/admin-panel/"){
	require_once 'admin-panel/index.php';
}

if ($_SERVER['REQUEST_URI'] == "/create"){
	$title = "Создать мероприятие";
	require_once 'header.php';
	require_once 'createEvents.php';
}

if ($_SERVER['REQUEST_URI'] == "/all"){
	$title = "Все меропрития";
	require_once 'header.php';
	require_once 'allEvents.php';
}

if ($_SERVER['REQUEST_URI'] == "/login"){
	$title = "Авторизация";
	$style = "loginlogin";
	require_once 'header.php';
	require_once 'login.php';
}

if ($_SERVER['REQUEST_URI'] == "/signup"){
	$title = "Регистрация";
	$style = "signupsignup";
	require_once 'header.php';
	require_once 'signup.php';
}

if ($_SERVER['REQUEST_URI'] == "/lk"){
	$title = "Личный кабинет";
	require_once 'header.php';
	require_once 'lk.php';
}

require_once 'mail.php';
require_once 'footer.php';
?>