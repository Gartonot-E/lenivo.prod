<h1>Личный кабинет</h1>
<p>Ваше ФИО: <?=$_SESSION['user_full_name']?></p>

<style>
	
	li.form-group > .form-control {
		width: 100% !important;
		height: 45px !important;
	}
</style>

<!-- <h3>Выбрать тему заднего фона</h3> -->
<div class="card">
<form method="POST">
	<!-- <ul>
		<li class="form-group">
			<img src="assets/img/slide/1.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit1" value="Выбрать">
			<input type="hidden" name="id1" value="1">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/2.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit2" value="Выбрать">
			<input type="hidden" name="id2" value="2">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/3.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit3" value="Выбрать">
			<input type="hidden" name="id3" value="3">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/4.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit4" value="Выбрать">
			<input type="hidden" name="id4" value="4">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/5.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit5" value="Выбрать">
			<input type="hidden" name="id5" value="5">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/6.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit6" value="Выбрать">
			<input type="hidden" name="id6" value="6">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/7.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit7" value="Выбрать">
			<input type="hidden" name="id7" value="7">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/8.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit8" value="Выбрать">
			<input type="hidden" name="id8" value="8">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/9.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit9" value="Выбрать">
			<input type="hidden" name="id9" value="9">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/10.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit10" value="Выбрать">
			<input type="hidden" name="id10" value="10">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/11.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit11" value="Выбрать">
			<input type="hidden" name="id11" value="11">
		</li>
		<li class="form-group">
			<img src="assets/img/slide/12.jpg" alt="" width="256">
			<input type="submit" class="form-control" name="submit12" value="Выбрать">
			<input type="hidden" name="id12" value="12">
		</li>
	</ul> -->
</form>
</div>	
<a href="logout.php">Выйти</a>


<!-- (li.form-group>img[src="assets/img/slide/$.jpg" width="256"]+input.form-control[type="submit"value="Выбрать"])*12 -->
<!-- 
(li.form-group>img[src="assets/img/slide/$.jpg" width="256"]+input.form-control[type="submit"value="Выбрать"+input[type="hidden"]name="id"value="$"])*12 -->