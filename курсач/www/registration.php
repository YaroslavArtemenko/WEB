<?php require 'login.php';  session_start(); ?>


<html>
    <head>
    <?=$incorrect_login_js ?>
    <title>ТОВ ТМА Тристан</title>
	<meta name="robots" content="index,follow">
	<meta name="keywords" content="">
	<meta name="description" content="ТОВ ТМА Тристан">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="shortcut icon" href="images/logotop.ico">
</head>
<body>

<div id="page">

		<header id="head">
		<!-- КОНТЕНТ ШАПКИ -->
			<div>
				<h1 id="hh1"><a href="./" title="ТОВ ТМА Тристан"><span>ТОВ ТМА Тристан</span></a></h1>
				<p class="hidden"><a href="#content">ТОВ ТМА Тристан</a></p>
	
				<!-- MENU NAVIGATION -->
				<nav id="menu">
	 		 	<div class="inside">
					<ul class="main">
						<li class="line"><a href="#">Главная</a></li>
						<li class="line"><a href="#">Продукты</a></li>
						<li class="line"><a href="#">О нас</a></li>
						<li class="line"><a href="mainQuestion.php">Вопрос-Ответ</a></li>
						<li class="line"><a href="contacs.html">Контакты</a></li>
					</ul>
			  	</div>
				</nav>
			
			
			</div>

		</header>


		<!-- ГЛАВНАЯ НАДПИСЬ-->

		<div id="ccontainer">
					<div class="descript">Tristan</div>	
		</div>

				<!-- ОСНОВНОЙ КОНТЕНТ-->
	<div id ="content_registr">	
		<div id="text">
		<div class="content">
				<div class="cols">
					<p>Приветствуем Вас на странице регистрации. Для того, чтобы Вы могли оставить отзыв или написать комментарий нужно быть зарегистрированным в нашей системе. Просим Вас заполнить следующую форму. Спасибо за уделённое время.<br><br><br></p> 
				</div>

<div class="str">

		
				
					 <h2 align="center">Регистрация</h2>
		

				
					<section id = "info">
					<div class="article">
	      <p >Поля отмеченые звездочкой - обязательные для заполнения.</p>
	      <form action="registration.php" method="post">
	        <p>
	          <label><font color="red">*</font> Как вас зовут:
	            <input type="text" name="firstname" placeholder="Имя"  required>
	          </label>
	          <input type="text" name="lastname" placeholder="Фамилия" required>
	        </p><p>
	          <label><font color="red">*</font> Введите логин:
	            <input type="text" name="Login" placeholder="Логин" required>
	          </label>
	        </p>
	        <p>
	          <label><font color="red">*</font> Введите свой E-mail:
	            <input type="email" name="email" placeholder="example@mail.com" required>
	          </label>
	        </p>
	        <p>
	          <label><font color="red">*</font> Введите пароль:
	            <input type="password" name="Password" size="15" maxlength="30" required>
	          </label>
	        </p>
	        <p>
	          <label><font color="red">*</font> Подтвердите пароль:
	            <input type="password" name="ConfirmPassword" size="15" maxlength="30" required>
	          </label>
	        </p>
	        <p>
	          <label>Пол:
	            <select name="Sex">
	              <option value="No" selected>&nbsp;</option>
	              <option value="Male">Мужской</option>
	              <option value="Female">Женский</option>
	            </select>
	          </label>
	        </p>
	        <p>
	          <label> Дата рождения:
	            <input type="date" name="calendar" max="2014-10-20" min="1900-01-01">
	          </label>
	        </p>
	        <p>
	          <label> Мобильный номер в формате: +
	            <input type="tel" name="tel" placeholder="380XXХХХХХХХ" pattern="380[0-9]{9}">
	          </label>
	        </p>
	        <p>Нравится ли Вам наш сайт?<label><input name="type" type="radio" value="1">Да</label>
	                         <label><input name="type" type="radio" value="2">Нет</label>
	        </p>
	        <p>
	          <label> Дополнительная информация:<br>
	            <textarea name="sign" cols="60" maxlength="500" rows="5"></textarea>
	          </label>
	        </p>
	        <p>
	            <label><input type="checkbox" name="Rulez" required><font color="red">*</font> Я ознакомился с правилами сайта.</label><br>
	        </article>
	        <section>
	          <input type="submit" value="Готово" name="Go" style="margin-left:5%;">
	          <input type="reset" value="Очистить">
	        <a href="mainQuestion.php"><input type="button" name="" value="Назад" ></a>
	        

			  <?php
					$user_file = "users.txt";
					$uname = htmlspecialchars($_POST['firstname']).' '.htmlspecialchars($_POST['lastname']);
					$ulog = htmlspecialchars($_POST['Login']);
					$upas = htmlspecialchars($_POST['Password']);
					$umail = htmlspecialchars($_POST['email']);

					$handle = fopen("users.txt", at);
					flock($handle, LOCK_SH);
					if($_POST['Login']!=""){
					$string = $ulog."|".$upas."|"."notbanned"."|".$umail."|".$uname."*";
					fwrite($handle, $string);
					flock($handle, LOCK_UN);
					fclose($handle);
					echo "<h3>Вы зарегистрированы! Для того, чтобы войти в систему, вернитесь на предыдущую страницу(нажав на вкладку Вопрос-Ответ).</h3>";}
	?>

	      </section>
	      </form>
	    </div>
			</div>
		</div>
		</div>

				<section id="partners">
		<div class="content">
			<h2>Наши партнеры</h2>
			<hr>
	
			<div id="topgal">
				<a href="http://www.danisco.com/food-beverages/"><img src="./images/part1.jpg" alt="danisco" title="http://www.danisco.com/food-beverages/" /></a>
				<a href="http://www.favor-ama.kiev.ua/"><img src="./images/part2.png" alt="favor-ama" title="http://www.favor-ama.kiev.ua/" /></a>
				<a href="https://farmak.ua/ru/"><img src="./images/part3.jpg" alt="farmak" title="https://farmak.ua/ru/"/></a>
				<a href="http://www.eco-lavca.ua/"><img src="./images/part4.jpg" alt="eco-lavca" title="http://www.eco-lavca.ua/" /></a>
				<a href="http://www.fromatech.com/"><img src="./images/part5.jpg" alt="fromatech" title="http://www.fromatech.com/" /></a>
			</div>
		</div>
		</section>


		<section>
		<div class="content">
		<div id="colls">
					<div id="coll1">
						<h3>ТМА Тристан</h3>
						<p>2016 Copyright</p>
					</div>
					<div id="coll2">
						<h3>OMEGA 3 Vegan</h3>
						<p>Природный помощник Омега 3 растительное - ТМ "NATURAL HELPER"</p>
					</div>
					<div id="coll3">
						<h3>АНТИСЕПТИЧЕСКИЕ и ДЕЗИНФЕЦИРУЮЩИЕ ПРЕПАРАТЫ</h3>
						<p>антисептичексий препарат БАКТРИЛОН дезинфектант БАКТРИЛОН А</p>
					</div>
					<div id="coll4">
						<h3>Мы в Facebook</h3>
						<a href="https://www.facebook.com/natural.caps.salyush/"><img src="images/fb.svg" style="width:40px; height: 40px" alt="Facebook" title="https://www.facebook.com/natural.caps.salyush/"></a>
					</div>
		</div>
		</div>
		</section>

</div>

<footer id="foot">
	<div class="inside">
		<span class="copy">© Все права защищены</span>
		<span class="contact"><a href="contacs.html">Контактируйте нас</a></span>
	</div>
</footer>

<a href="#top" class="up anchor"><span>наверх</span></a>

</div> <!-- id page-->
</body>
</html>
