<?php require_once('templates/top.php');
      require_once('utils/utils.users.php');
$name = new field_text('name','Логин',true,$_POST['name']);
$pass = new field_password('pass','Пароль',true,$_POST['pass']);

$form = new form(array('name'=>$name,'pass'=>$pass),'Вход','field');
	  if ($_POST){
      $error = $form->check();
	  
	  $query = "SELECT COUNT(*) FROM $tbl_enter 
                WHERE login = '{$form->fields['name']->value}' AND password = '{$form->fields['pass']->value}' ";
      $usr = mysql_query($query);
      if(!$usr) 
      {
        exit($query);
      }
      if(!mysql_result($usr, 0))
      {
        $error[] = "Неверное имя пользователя или пароль";
      }
	  
	 	         
	  if(!$error){
		
	          enter($form->fields['name']->value,
					$form->fields['pass']->value);
			  
          ?>
          <script>
            document.location.href='cabinet.php';
          </script>
          <?php
			}
		  
		else{
			echo "Неверное имя пользователя или пароль";
		}
			
	}
		  
	  


$form-> print_form();
 require_once('templates/bottom.php');?>		