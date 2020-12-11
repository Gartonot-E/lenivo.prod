<?php 

$errors = [];
$success = [];

if(isset($_POST['done_signup']) && !empty($_POST['full_name']) && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){

	$full_name = trim(htmlspecialchars($_POST['full_name']));
	$login = trim(htmlspecialchars($_POST['login']));
	$email = trim(htmlspecialchars($_POST['email']));
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


	$res = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
	$row = $res->fetch_assoc();

	if($row['login'] == $login){
		$errors[] = "Пользователь с таким логином уже существует";
	} else {
		$res = $mysqli->query("INSERT INTO `users`(`full_name`, `login`, `email`, `password`) VALUES ('$full_name', '$login', '$email', '$password')");

		if($res){
			$success[] = "Вы успешно зарегистрированы, <a href='/login'>авторизоваться</a>";
		} else {
			$errors[] = "Ошибка базы данных";
		}
	}

}


?>

<h1>Регистрация</h1>
<div class="signup">
	<div class="row">
	<form method="POST">
		<?php 
		if(!empty($errors) && isset($errors)) { echo "<div class='alert-error'>".array_shift($errors)."</div>";}
		if(!empty($success) && isset($success)) { echo "<div class='alert-success'>".array_shift($success)."</div>";}
		?>
		<div class="form-group">
			<label for="full_name">Введите ФИО</label>
			<input type="text" id="full_name" class="form-control" name="full_name" placeholder="ФИО" required>
		</div>
		<div class="form-group">
			<label for="login">Введите логин</label>
			<input type="text" id="login" class="form-control" name="login" placeholder="Логин" required>
		</div>
		<div class="form-group">
			<label for="email">Введите вашу почту</label>
			<input type="email" id="email" class="form-control" name="email" placeholder="Почта" required>
		</div>
		<div class="form-group">
			<label for="password">Введите пароль</label>
			<input type="password" id="password" class="form-control" name="password" placeholder="Пароль" required>
		</div>
		<div class="form-group">
			<input type="submit" class="form-control btn btn-login" name="done_signup" value="Зарегистрироваться">
		</div>
		<p>Есть аккаунт?<br><a href="login">Войти в аккаунт</a></p>
	</form>

	<img src="assets/img/signup.svg" class="user-group" alt="Группа пользователей">
	</div>
</div>