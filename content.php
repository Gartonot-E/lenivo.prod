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

if($cards != true){
	echo "<p>".$paragraph."</p>";
}  else {
	echo "<p>У вас нет мероприятий</p>";
}

?>
