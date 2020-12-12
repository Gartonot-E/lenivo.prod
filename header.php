<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title;?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,600;0,700;1,400&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="wrapper">
<header class="header">
	<div class="container">
		<nav class="nav-bar">
			<a href="/" class="logo">Lanivo.Prod</a>
			<ul>
				<li><a href="all">Все мероприятия</a></li>
				<li><a href="admin-panel/">Админка</a></li>
				<li><a href="login"><?php
				if(isset($_SESSION['user_login'])){
					echo $_SESSION['user_login'];
				} else {
					echo "Войти";
				}
				?></a></li>
			</ul>
		</nav>
	</div>
</header>
<main>
<div class="container">
	<div class="content">
