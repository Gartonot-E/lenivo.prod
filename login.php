<?php 

$errors = [];
$success = [];



if(isset($_POST['done_login']) && !empty($_POST['login']) && !empty($_POST['password'])){

	$login = trim(htmlspecialchars($_POST['login']));
	$password = trim($_POST['password']);

	$res = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");

	while($row = $res->fetch_assoc()){
		$g_login = $row['login'];
		$g_full_name = $row['full_name'];
		$g_password = $row['password'];
	}

	if(!empty($g_login)){
		if(password_verify($password, $g_password)){
			$_SESSION['user_login'] = $g_login;
			$_SESSION['user_full_name'] = $g_full_name;
			header('Location: /login');
		} else {
			$errors[] = "Пароль не верный";
		}
	} else {
		$errors[] = "Такого пользователя не существует";
	}


}

if(isset($_SESSION['user_login'])){
	require_once 'lk.php';
} else {
?>


<h1>Авторизация</h1>
<div class="login">
	<div class="row">
	<form method="POST">
		<?php 
		if(!empty($errors) && isset($errors)) { echo "<div class='alert-error'>".array_shift($errors)."</div>";}
		if(!empty($success) && isset($success)) { echo "<div class='alert-success'>".array_shift($success)."</div>";}
		if(!empty($_GET['message'])){ echo "<div class='alert-success'>".$_GET['message']."</div>";}
		?>
		<div class="form-group">
			<label for="login">Ваш логин</label>
			<input type="text" id="login" class="form-control" name="login" placeholder="Логин" required>
		</div>
		<div class="form-group">
			<label for="password">Ваш пароль</label>
			<input type="password" id="password" class="form-control" name="password" placeholder="Пароль" required>
		</div>
		<div class="form-group">
			<input type="checkbox" id="checkbox" checked>
			<label for="checkbox"><small>Согласен с <a href="polit.docx" download>политикой обработки персональных данных</a></small></label>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-login" name="done_login" value="Войти">
		</div>
		<p>Ещё нет аккаунта?<br><a href="signup">Зарегистрироваться</a></p>
	</form>

	<img src="assets/img/group.svg" class="user-group" alt="Группа пользователей">
	</div>
</div>
<?php 
}
?>