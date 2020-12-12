<?php  
$login = $_SESSION['user_login'];

$row = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'")->fetch_assoc();


	if(isset($_POST['submit1'])){
		$_SESSION['id_src'] = $_POST['id1'];
	}
	if(isset($_POST['submit2'])){
		$_SESSION['id_src'] = $_POST['id2'];
	}
	if(isset($_POST['submit3'])){
		$_SESSION['id_src'] = $_POST['id3'];
	}
	if(isset($_POST['submit4'])){
		$_SESSION['id_src'] = $_POST['id4'];
	}
	if(isset($_POST['submit5'])){
		$_SESSION['id_src'] = $_POST['id5'];
	}
	if(isset($_POST['submit6'])){
		$_SESSION['id_src'] = $_POST['id6'];
	}
	if(isset($_POST['submit7'])){
		$_SESSION['id_src'] = $_POST['id7'];
	}
	if(isset($_POST['submit8'])){
		$_SESSION['id_src'] = $_POST['id8'];
	}
	if(isset($_POST['submit9'])){
		$_SESSION['id_src'] = $_POST['id9'];
	}
	if(isset($_POST['submit10'])){
		$_SESSION['id_src'] = $_POST['id10'];
	}
	if(isset($_POST['submit11'])){
		$_SESSION['id_src'] = $_POST['id11'];
	}
	if(isset($_POST['submit12'])){
		$_SESSION['id_src'] = $_POST['id12'];
	}

if(isset($_SESSION['id_src'])){
	$img_src = $_SESSION['id_src'].'.jpg';
} else {
	$img_src = '1.jpg';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title;?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,600;0,700;1,400&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">

	<style>
		.wrapper {
			background: url('assets/img/slide/<?=$img_src?>') no-repeat center top / cover;
	
		}
	</style>
</head>
<body>

<div class="wrapper">
<header class="header">
	<div class="container">
		<nav class="nav-bar">
			<a href="/" class="logo">Lanivo.Prod</a>
			<ul>
				<li><a href="all">Все мероприятия</a></li>
				<?php if($row['type'] == 2 || $row['type'] == 1) {?>
				<li><a href="admin-panel/">Админка</a></li>
				<?php } ?>
				<li><a href="login"><?php
				if(isset($login)){
					echo $login;
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
