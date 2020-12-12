<?php 
require_once '../connect.php';

$errors = [];
if(isset($_POST['done_admin_login']) && !empty($_POST['login']) && !empty($_POST['password'])){

	$login = $_POST['login'];
	$password = $_POST['password'];

	$row = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login' AND `type` <= 2")->fetch_assoc();
	
	if(!empty($row)){
		if(password_verify($password, $row['password'])){
		 	$_SESSION['admin_type'] = $row['type']; 
		 	header("Location: admin.php");
		} else {
			$errors[] = "Пароль не верный";
		}
	} else {
		$errors[] = "Такого администратора не найдено";
	}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход в админ панель</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- My Style -->
	<link rel="stylesheet" href="../assets/css/admin-style.css">
</head>
<body class="bg-dark">

<div class="container text-white rounded">
<form method="POST">
	<h4>Вход в админ-панель</h4>
	<?php if(!empty($errors)){echo "<div class='alert alert-danger'>".array_shift($errors)."</div>";} ?>
  <div class="form-group">
    <label for="login">Логин</label>
    <input type="text" class="form-control" name="login" id="login">
  </div>
  <div class="form-group">
    <label for="password">Пароль</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <input type="submit" class="btn btn-primary" name="done_admin_login" value="Войти">
</form>
</div>
</body>
</html>

