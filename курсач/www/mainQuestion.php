<?php require 'login.php'; session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?=$incorrect_login_js ?>
<script type="text/javascript">
    function FormClick () {
            var newComment = $("#add_com").serialize();
            $.post("comentar.php", newComment);
            document.getElementById("comment").value = "";
        }

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<?=$incorrect_login_js ?>
	<meta charset="utf-8">
	<title>Вопрос-ответ</title>
	<meta name="robots" content="index,follow">
	<meta name="keywords" content="">
	<meta name="description" content="ТОВ ТМА Тристан">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="shortcut icon" href="images/logotop.ico">
	<script type="text/javascript" src="script.js"></script>
</head>

<body vlink="#000" alink="#000" link="#000">

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
						<li class="line"><a href="tristan.html">Главная</a></li>
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
		<div class="baner">
        <div class="login">
            <div class="login-in">
                <br>
        <form class="logino" action="" id="form1" method="post">

        <?php if ($_SESSION['ban'] == true): ?>
            Ваш аккаунт заблокированый<br><br>
            <form method="post">
                <input type="hidden" name="action" value="submit">
                <input type="submit" name="submit" value="Выход">
            </form>
        <?php elseif ($_SESSION['name'] == "admin"): ?>
            Привет, администратор!<br><br>
            <form method="post">
                <input type="hidden" name="action" value="submit">
                <input type="submit" name="submit" value="Выход">
                <input type="submit" name="submit" value="Редактирование">
            </form>
        <?php elseif ($_SESSION['name'] != ""): ?>
            Добро пожаловать, <?=$_SESSION['name'] ?><br><br>
            <form method="post">
                <input type="hidden" name="action" value="submit">
                <input type="submit" name="submit" value="Выход">
            </form>
        <?php else: ?>
            <label>Логин:<br/>
                <input type="text" name="logn" required size="20"><br /><br/>
            </label>
            <label>Пароль:<br />
                <input type="password" name="pass" required size="20">
            </label><br /><br/>
            <input class="button" type="submit" name="submit" value="Вход">
	        <a href="registration.php"><input type="button" name="" value="Регистрация" ></a>
        <?php endif; ?>
</form>

                <br>
            </div>
        </div>
         <div class="adm">
 <div id="block1" style="margin-left:3%;">
 <!--<header>
 <p style="font:25pt times new roman; margin-top: 1%; padding:0">   Отзывы о сайте:</p>
 </header>-->
 <fieldset><legend><h2>Отзывы о сайте:</h2></legend>
    <div id="comment-div">
                    <p><tt><b><i> 'Отзывы могут оставлять только зарегистрированные пользователи' </i></b></tt></p>
                    <div id="comments">
                        <?php require 'printComment.php'?>
						
    </div>
   
    </div>
 </fieldset>

 </div>
 </div>


</center>

	<div id ="content_mainque">	
		<div id="text">
		<div class="content">
				<!--<div class="cols">
					<p>Мы заботимся о качестве нашей продукции и всегда прислушиваемся к мнению наших клиентов. Поэтому, если Вас что-то интересует или Вы хотите предложить какие-то изменения, войдите в систему, после чего Вы сможете заполнить форму и мы постараемся как можно быстро ответить на поставленные вопросы и предложения. Ваше мнение очень важно для нас и мы благодарны Вам за потраченное время.<br><br></p>
				</div>


				<!--<form action="" method="POST" name="login" id="form">
				<table>
     				<tr>
        				<td>Ваш Email</td>
        				<td>
          					<input name="logemail" type="text">
        				</td>
      				</tr>
      				<tr>
        				<td>Ваш пароль</td>
        				<td>
          					<input name="logpassword" type="password">
        				</td>
      				</tr>
      			</table>
      			<br>
					<input type="button" onclick="valid(document.getElementById('form'))" name="submit" value="Войти">
					<a href="reg.html"><input type="button" value="Зарегистрироваться"></a>  
				</form>-->

				
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
						<p>Природний помічник Омега 3 рослинна - ТМ "NATURAL HELPER"</p>
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
		<span class="contact"><a href="#contact">Контактируйте нас</a></span>
	</div>
</footer>

<a href="#top" class="up anchor"><span>наверх</span></a>

</div> <!-- id page-->
</body>
</html>