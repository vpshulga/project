<?php 
  require_once('templates/top.php');
    if ($_SESSION['id_user_position'])
    {
      $query = "SELECT * FROM $tbl_enter WHERE id = ".$_SESSION['id_user_position'];
      
      $usr = mysql_query($query);
      if (!$usr)
      {
        exit ($query);
      }
      
      $tbl_enter = mysql_fetch_array($usr);
      
      
	  ?>
	  <h2 <span style = "color:red" align=center /span> Личный кабинет</h2>
	  <?php
	  
      echo "<div class='log'><strong>Login:</strong>  ".$tbl_enter['login']."
      <br><strong>Email:</strong> ".$tbl_enter['email']."
      <br><strong>Дата Регистрации:</strong> ".$tbl_enter['datereg']."
      <br><strong>Последний вход:</strong> ".$tbl_enter['lastvisit']."</div>";

	  
	  ?>
	  <div class = 'prem'>
	  <a href = 'cabinet.php'>Премиум аккаунт</a>
	  <a href = 'cabinet.php'>Пополнить счёт</a>
	  </div>
	  <?php
	  
	                                    
    
    }
    else
    {
    echo 'Ошибка входа';
    }
  
  
  require_once('templates/bottom.php');