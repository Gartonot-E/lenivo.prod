<?php 

$res = $mysqli->query("SELECT *, `category`.`color`, `category`.`id` FROM `events` JOIN `category` ON `events`.`cat_1` = `category`.`cat`");
$result = $mysqli->query("SELECT * FROM `category`");

?>


<h1>Все мероприятия</h1>
<div class="filter block-flex">
	<button class="filter-btn" id="all" style="background: lightgrey">Все</button>
	<?php
		while($rows = $result->fetch_assoc()){
			echo '<button class="filter-btn" id="' . $rows['id'] . '" style="background:' . $rows['color'] . '">' . $rows['cat'] . '</button>';
		}
	?>
</div>
<br><hr><br>
<div class="card-list">
<?php 
	while($row = $res->fetch_assoc()){
		echo "<div class='event " . $row['id'] . "'>
		<div class='event-header'>
			<h2>".$row['title']."</h2>
			<button class='event-btn'>Участвовать</button>
		</div>
		<div class='event-body'>
			<p>".$row['text']."</p>
		</div>
		<div class='event-footer'>
			<ul>
				<li><span style='background:".$row['color']."'></span>".$row['cat_1']."</li>
			</ul>
			<p>Дата: ".$row['date']."</p>
		</div>
	</div>";
	}
?>
</div>