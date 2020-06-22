<?php require 'login.php'; ?>
<?php require 'buttons.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?=$incorrect_login_js ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<title>ТОВ ТМА Тристан</title>
	<meta name="robots" content="index,follow">
	<meta name="keywords" content="">
	<meta name="description" content="ТОВ ТМА Тристан">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="shortcut icon" href="images/logotop.ico">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>

<script type="text/javascript">
function slowScroll(id){
	var offset = 0;
	$('html,body').animate({
		scrollTop: $(id).offset().top - offset
	},1000);
	return false;
}
</script>

<div id="up"></div>

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
		<center>
			<fieldset><legend><h2>Пользователи:</h2></legend>
			<?php require 'users.php' ?>
			</fieldset>
				<div class="comment-div">
					<fieldset><legend><h2>Новые отзывы:</h2></legend>
						<div id="sas-comments">
							<?php require 'printNewComment.php' ?>
						</div>
						</fieldset>
				</div>
	    	<div class="comment-div">
	    	    <fieldset><legend><h2>Отзывы:</h2></legend>
	        	<div id="comments"><?php require 'printCommentAdm.php' ?>
	        	</div>
	        </fieldset>
	        <p>
	        <a href="mainQuestion.php"><input type="button" name="" value="Назад" ></a>
	        </p>
	        </div>

	    </center>




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

<div id="more">
<a href="javascript://0" onclick="slowScroll('#up')" class="up anchor"><span>наверх</span></a>
</div>

</div> <!-- id page-->
</body>
</html>
