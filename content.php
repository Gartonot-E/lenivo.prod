<h1>
<?php
if(isset($_SESSION['user_login'])) {
	echo "Мои мероприятия";
	$cards = true;
} else { 
	echo "Общая информация";
	$paragraph = "Для того. чтобы увидеть мероприятия, требуется <a href='/login'>авторизоваться</a>";
} 
?>
</h1>


<?php
$user = $_SESSION['user_login']; 
$res = $mysqli->query("SELECT *, `category`.`color` FROM `signupForEvents` JOIN `events` ON `signupForEvents`.`event_id` = `events`.`title` JOIN `category` ON `events`.`cat_1` = `category`.`cat` WHERE `signupForEvents`.`user_id` = '$user'");


if($cards != true){
	echo "<p class='text-white'>".$paragraph."</p>";
}  else {
	echo "<div class='card-list'>";
		while($row = $res->fetch_assoc()){
			echo "<div class='event'>
					<div class='event-header'>
						<h2>".$row['title']."</h2>
					</div>
					<div class='event-body'>
						<p>".$row['text']."</p>
					</div>
					<div class='event-footer'>
						<ul>
							<li><span style='background:".$row['color']."'></span>".$row['cat_1']."</li>
						</ul>
						<p style='display: flex; align-items:center;'>Дата: ".$row['date']."</p>
					</div>
				  </div>";
				}
	echo "</div>";
}
?>


