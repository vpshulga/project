<?php
session_start();
require_once('config/config.php');
require_once('config/class.config.php');
require_once('utils/utils.users.php');
?>

<!Doctype html>
<html>
	<head><!--Название страницы -->
		<meta charset= 'utf-8'>
		<title>Проект</title>
		<meta name = 'description' content = '1-2'>
		<meta name = 'keywords'	content = '...'>
		<link type = 'text/css' rel = 'stylesheet' href = 'media/bootstrap/css/bootstrap.min.css'>
		<link type = 'text/css' rel = 'stylesheet' href = 'media/css/style.css'>
    <script src = '/media/js/jquery.min.js'>
    </script>
    
    <script>
    $(function(){
      selector(0,'url(media/img/fon_maintext.jpg)');
      selector(1,'url(media/img/fon_maintext.jpg)');
      selector(2,'url(media/img/fon_maintext.jpg)');
      selector(3,'url(media/img/fon_maintext.jpg)');
      selector(4,'url(media/img/fon_maintext.jpg)');
      selector(5,'url(media/img/fon_maintext.jpg)');
      selector(6,'url(media/img/fon_maintext.jpg)');
      function selector(num, path){
      $('.topmenu a:eq('+num+')').bind('mouseover', function(){
        
        $('#header').css({
          'background': path
        
          });
      
      });
      
      $('.topmenu').bind('mouseout', function(){
        $('#header').css({
          'background': 'url(media/img/fontop.jpg)'
        });
        
      });
    };
      
    });
    </script>
    
	</head>
	<body>
		<div id = 'header'><!--Верхний блок-->
		
			<div id = 'logo'>
				<img src ='media/img/logotip.png'>
			</div>
			
			<div id = 'headlinks'>
      <?php if ($_SESSION['id_user_position'])
      {
          $query = "SELECT * FROM $tbl_enter WHERE id = ".$_SESSION['id_user_position'];
          $usr = mysql_query($query);
          if (!$usr)
          {
              exit ($query);
          }
          $login = mysql_fetch_array($usr);

          echo "<div class='nametop'>Вы вошли как:".$login['login']."</div>";


      ?>		
				<a href = 'cabinet.php' class = 'btn btn-danger'>Премиум аккаунт</a>
				<a href = 'logout.php' class = 'btn btn-primary'>Выход</a>
				<a href = 'cabinet.php' class = 'btn btn-primary'>Кабинет</a>
				
      <?php
	  
      }
      else
      {
      ?>
				<a href = 'login.php' class = 'btn btn-primary'>Вход</a>
				<a href = 'reg.php' class = 'btn btn-primary'>Регистрация</a>
      <?php
      }
      ?>
      
      

			</div>
      		
		</div>	
		
		<div class = 'topmenu'><!--Топ меню-->
			<a href = 'index.php?url=index'> Главная</a>
			<a href = 'index.php?url=results'> Результаты</a>
			<a href = 'index.php?url=live'> LIVE</a>
			<a href = 'index.php?url=league'> Лига чемпионов</a>
			<a href = 'index.php?url=timing'> Расписание</a>
			<a href = 'index.php?url=contact'> Контакты</a>
            <?php if ($_SESSION['id_user_position'])
            {
                echo "<a href = 'otsivy.php'>Отзывы</a>";
            }

            ?>

			
		</div>
		
 
			
			<div class = 'col-md-2'><!--Кнопки слева-->
				<div class = 'menu'>
				<h2 <span style = "color:red" align=center /span> Спорт</h2>		
				
				<?php
				$query = "SELECT * FROM $tbl_catalog WHERE showhide = 'show'";
				
				$cat = mysql_query($query);
				if (!$cat){
				exit($query);
				}
				while($category = mysql_fetch_array($cat)){
				
					echo "<a href = 'cat.php?url=".$category['url']."&id=".$category['id']."' class = 'btn btn-primary' >".$category['name']."</a>";
				
				}
				
				?>
		
			<!--<a href = '#' class = 'btn btn-success'>Футбол</a>
				<a href = '#' class = 'btn btn-info'>Теннис</a>
				<a href = '#' class = 'btn btn-warning'>Баскетбол</a>
				<a href = '#' class = 'btn btn-primary'>Зимние виды</a>
				<a href = '#' class = 'btn btn-default'>Прочее</a>		-->		
				</div>
			</div>
			
			<!--<div class = 'col-md-2'>	<!--Результаты-->
			<!--	<div class = 'results'>
				<h2 align=center ><i>Результаты</i></h2>
				
				
				<ul id = 'footres'>
					<li><a href="#">Футбол</a>
						<ul>
                        <li><a href="#">Франция 2:0 Дания</a></li>
                        <li><a href="#">Франция 2:0 Дания</a></li>
						<li><a href="#">...Все матчи</a></li>
						</ul>
					</li>        
				</ul>
				
				
				
				<ul id = 'tenres'>
					<li><a href="#">Теннис</a>
						<ul>
                        <li><a href="#">Франция 2:0 Дания</a></li>
                        <li><a href="#">Франция 2:0 Дания</a></li>
						<li><a href="#">...Все матчи</a></li>
						</ul>
					</li>        
				</ul>
				
				<ul id = 'basres'>
					<li><a href="#">Баскетбол</a>
						<ul>
                        <li><a href="#">Франция 2:0 Дания</a></li>
                        <li><a href="#">Франция 2:0 Дания</a></li>
						<li><a href="#">...Все матчи</a></li>
						</ul>
					</li>        
				</ul>-->
									
								
				</div>
 
		
			<div class = 'col-md-8'><!--Текст-->
			
	