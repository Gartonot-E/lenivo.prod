<?php 

$login = 'admin';
$password = 'admin';

if($login == $_POST['login'] && $password == $_POST['password']){
	header("Location: admin.php");
} else {
	$error = "Неверный Логин или Пароль";
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
	<?php if(!empty($error)){echo "<div class='alert alert-danger'>".$error."</div>";} ?>
  <div class="form-group">
    <label for="login">Логин</label>
    <input type="text" class="form-control" name="login" id="login">
  </div>
  <div class="form-group">
    <label for="password">Пароль</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>
</div>
</body>
</html>

