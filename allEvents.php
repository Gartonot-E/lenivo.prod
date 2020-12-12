<?php 

$res = $mysqli->query("SELECT * FROM `events`");

?>

<h1>Все мероприятия</h1>

<div class="card-list">
<?php 
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
				<li><span></span>Собраине</li>
				<li><span></span>Программирование</li>
			</ul>
			<p>Дата: ".$row['date']."</p>
		</div>
	</div>";
	}
?>
</div>