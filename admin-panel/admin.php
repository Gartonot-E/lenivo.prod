<?php 

require_once '../connect.php';
$errors = [];
$success = [];


$errorsE = [];
$successE = [];
// Создание мероприятий
if(isset($_POST['done_create_event']) && !empty($_POST['title']) && !empty($_POST['textarea']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['cat'])) {

	$title = $_POST['title'];
	$text = $_POST['textarea'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$cat = $_POST['cat'];
	// $file_name = $_FILES['photo']['name'];
	// $file_size = $_FILES['photo']['size'];
	// $file_tmp = $_FILES['photo']['tmp_name'];
	// $file_type = $_FILES['photo']['type'];
	// $file_ext = strtolower(end(explode('.', $_FILES['photo']['name'] )));

	// $expensions = array("jpeg", "jpg", "png");

	// if ($file_size > 2097152) {
	// 	$errorsE[] = 'Файл должен быть 2 мб';
	// }

	// if (empty($errorsE)) {
	// 	move_uploaded_file($file_tmp, "../assets/img/" . $file_name);
	// } else {
	// 	$errorsE[] = 'Не удалось загрузить файл';
	// }

	$res = $mysqli->query("INSERT INTO `events` (`title`, `text`, `date`, `time`, `cat_1`, `img`) VALUES('$title', '$text', '$date', '$time', '$cat', '$file_name')");

	if($res){
		$successE[] = "Мероприятие с названем \"".$title."\" успешно созданно";
	} else {
		$errorsE[] = "Ошибка с БД";
	}
}


// Выдача прав
if(isset($_POST['done_permission']) && !empty($_POST['loginA']) && !empty($_POST['selectTypeA'])){

	$loginPer = $_POST['loginA'];
	$typePer = $_POST['selectTypeA'];

	$res = $mysqli->query("UPDATE `users` SET `type` = '$typePer' WHERE `users`.`id` = '$loginPer'");

	$row = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$loginPer'")->fetch_assoc();

	if($res){
		$success[] = "Изменены права для пользователя ".$row['login'];
	} else {
		$errors[] = "Ошибка БД";
	}
}



// Добавление нового админа
if(isset($_POST['done_create_admin']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['selectType'])){

	$login = $_POST['login'];
	$password = $_POST['password'];
	$type = $_POST['selectType'];

	$getAdmin = $mysqli->query("SELECT * FROM `admins` WHERE `login` = '$login'")->fetch_assoc();

	if(empty($getAdmin)){
		$res = $mysqli->query("INSERT INTO `admins` (`login`, `password`, `type`) VALUES ('$login', '".password_hash($password, PASSWORD_DEFAULT)."', '$type');");
		if($res){
			$success[] = "Админ успешно был добавлен<br>Логин: ".$login."<br>Пароль: ".$password;
		} else {
			$errors[] = "Ошибка с бд";
		}
	} else {
		$errors[] = "Такой админ уже есть";
	}

}

if(isset($_SESSION['admin_type'])){
	$type = $_SESSION['admin_type'];
} else {
	$type = 2;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админка</title>
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cuprum:ital,wght@0,600;0,700;1,400&family=Open+Sans&display=swap" rel="stylesheet">
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- My Style -->

	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container-fluid">
	<div class="row header">
		<div class="col-md-12 bg-dark p-3">
			<ul>
				<li><a class="text-white" href="../"><h5>На сайт</h5></a></li>
			</ul>
		</div>
	</div>
	<div class="row" style="height: 92vh;">
		<div class="col-md-2 pt-4 bg-light">
		  	<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

		       <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Создать мероприятие</a>
		      
		  	<?php if($type == 1){?>
		      <a class="nav-link" id="v-pills-addAdmin-tab" data-toggle="pill" href="#v-pills-addAdmin" role="tab" aria-controls="v-pills-addAdmin" aria-selected="false">Добавить администратора</a>
		  	<?php }?>
			</div>
		</div>
		<div class="col-md-10 pt-4 tab-content" id="v-pills-tabContent">
		   
			<!-- Добавить мероприятие -->
		   	 <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
		   	<form class="w-50" method="POST" ENCTYPE="multipart/form-data">
		   	<?php 
				if(!empty($errorsE) && isset($errorsE)) { 
					echo "<div class='alert-error'>".array_shift($errorsE)."</div>";
				}
				if(!empty($successE) && isset($successE)) { 
					echo "<div class='alert-success'>".array_shift($successE)."</div>";
				}
			?>
			<style>
				.form-control {
					height: 40px;
				}

				.block-flex {
					width: 92%;
				}
			</style>
				<h4>Создание мероприятия</h4>
			  <div class="form-group">
			    <label for="title">Название</label>
			    <input type="text" name="title" class="form-control" id="title" required>
			  </div>
			  <div class="form-group">
			    <label for="textarea">Текст</label>
			    <textarea name="textarea" id="textarea" cols="30" rows="2" maxlength="140" class="form-control"></textarea>
			  </div>
			<div class="form-group">
				<label for="category">Добавить категорию</label>
				<select name="cat" id="cat" class="form-control">
					<?php 

					$result = $mysqli->query("SELECT * FROM `category`");
					while ($row = $result->fetch_assoc()) {
						echo "<option value='".$row['cat']."'>".$row['cat']."</option>";
					}

					?>
				</select>
			</div>
			 <div class="block-flex">
			   <div class="form-group">
			    <label for="photo">Фотография</label>
			    <input type="file" name="photo" class="form-control" id="photo" required disabled>
			  </div>
			  <div class="form-group">
			    <label for="date">Дата</label>
			    <input type="date" name="date" class="form-control" id="date" required>
			  </div>
			  <div class="form-group">
			    <label for="time">Время</label>
			    <input type="time" name="time" id="time" class="form-control" required>
			  </div>
			  </div>
			  <input type="submit" name="done_create_event" class="form-control text-white btn bg-primary" value="Создать мероприятие">
			</form>
		   	 </div>

		    <!-- Добавить админа -->
			<?php if($type == 1){?>
			<div class="tab-pane fade" id="v-pills-addAdmin" role="tabpanel" aria-labelledby="v-pills-addAdmin-tab">
				
			<form class="w-25" method="POST">
				<h4>Создание администратора</h4>
			  <div class="form-group">
			    <label for="login">Логин для администратора</label>
			    <input type="text" name="login" class="form-control" id="login" required>
			  </div>
			  <div class="form-group">
			    <label for="password">Пароль для администратора</label>
			    <input type="password" name="password" class="form-control" id="password" required>
			  </div>
			  <div class="form-group">
			    <label for="selectType">Выберите тип администратора</label>
			    <select name="selectType" id="selectType" class="form-control" required>
			    	<option value="2">Право создавать только мероприятия</option>
			    	<option value="1">Все права(Воможность создавать админов)</option>
			    </select>
			  </div>
			  <input type="submit" name="done_create_admin" class="form-control text-white btn bg-primary" value="Создать">
			</form>
			<hr>
			<?php 
				if(!empty($errors) && isset($errors)) { echo "<div class='alert-error'>".array_shift($errors)."</div>";}
				if(!empty($success) && isset($success)) { echo "<div class='alert-success'>".array_shift($success)."</div>";}
			}
			?>
			<hr>
			<form class="w-25" method="POST">
			  <h4>Выдать права</h4>
			  <div class="form-group">
			    <label for="loginA">Логин для администратора</label>
			      <select name="loginA" id="loginA" class="form-control" required>
			    	<?php 
			    	$res = $mysqli->query("SELECT * FROM `users`");
			    	while($row = $res->fetch_assoc()){
			    		echo "<option value=".$row['id'].">".$row['login']."</option>";
			    	}
			    	?>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="selectTypeA">Выберите тип администратора</label>
			    <select name="selectTypeA" id="selectTypeA" class="form-control" required>
			    	<option value="2">Может создавать мероприятия</option>
			    	<option value="3">Обычный пользователь</option>
			    	<option value="1">Имеет все права</option>
			    </select>
			  </div>
			  <input type="submit" name="done_permission" class="form-control text-white btn bg-primary" value="Выдать">
			</form>
			</div>
		</div>
	</div>
</div>


<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>