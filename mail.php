<?php 
	require_once 'connect.php';

	$res = $mysqli->query("SELECT count(*) FROM `users`")->fetch_assoc();


	$events = $mysqli->query("SELECT `signupForEvents`.`event_id`,`signupForEvents`.`date_id`, `signupForEvents`.`time_id`, `mails`.`email` FROM `signupForEvents` JOIN `users` ON `signupForEvents`.`user_id` = `users`.`login` JOIN `mails` ON `mails`.`id` = `users`.`email`");

	$d = date("Y-m-d");
	$t = date("H:i");

	$time = $d.' '.$t;
	$timestamp = strtotime($time);

	$dateTime = [];
	$mails = [];
	$event_id = [];


	while($row = $events->fetch_assoc()){
		// echo "<hr>date: " . $row['date_id'];
		// echo "<br>Time: " . $row['time_id'];
		$event_id[] = $row['event_id'];
		$mails[] = $row['email'];
		$dateTime[] = strtotime($row['date_id'].' '.$row['time_id']);

	}


	$newTime = [];

	for($i = 0; $i < count($dateTime); $i++){
		$newTime[$i] = ($dateTime[$i]-$timestamp)/60;

		if($newTime[$i] < 60){

			$mes = '<div style="border-radius: 4px; background: #333; color: #fff; padding: 10px 20px; font-family: Arial;">
						<h1>Скоро начало!!!</h1>
						<p>Вы были записанны на мероприятие "'.$event_id[$i].'", начало через <span style="text-decoration: underline;">'.($newTime[$i]).' минут</span></p>
						<small>C уважением lenivo.prod</small>	
					</div>';
			$from = "vityusha.viktorov.6220@mail.ru";
			$to = $mails[$i];
			$subject = "Скоро начало мероприятия";
			// $subject = "=?utf-8?B?".base64_encode($subject)."?=";
			$headers = "From: $from\r\nReplay-To: $from\r\nContent-Type: text/html; charset=utf-8\r\n";

			mail($to, $subject, $mes, $headers);
			
		}
	}

?>
