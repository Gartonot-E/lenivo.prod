<?php 

	$mysqli = new mysqli('localhost', 'lenivo_lenivo', 'tYPiwH7&', 'lenivo_lenivo');


	$events_id = $_GET['events_id'];
	$user_id = $_GET['user_id'];
	$date_id = $_GET['date_id'];
	$time_id = $_GET['time_id'];

	$res = $mysqli->query("INSERT INTO `signupForEvents`(`event_id`, `user_id`, `date_id`, `time_id`) VALUES ('$events_id', '$user_id', '$date_id', '$time_id')");

?>

<script>
	
	document.location.href = "/all";

</script>