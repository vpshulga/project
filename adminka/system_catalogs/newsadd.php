<?php
  
  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
  require_once("../../utils/utils.resizeimg.php");

  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {

    /*
    echo "<pre>";
    print_r($catalogs);
    echo "</pre>";*/
    
    
    
    $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);
    $hide        = new field_checkbox("hide",
                                      "Отображать",
                                      $_REQUEST['hide']);
    $url         = new field_text("url",
                                      "url",
                                    true,
                                $_POST['url']);

    $form = new form(array(
	                       "name" => $name,
                           "hide" => $hide,
                            "url" => $url),
                     "Добавить",
                     "field");


                     

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
      // Проверяем корректность заполнения HTML-формы
      // и обрабатываем текстовые поля
      $error = $form->check();

      if(empty($error))
      {
      
      if ($form->fields['hide']->value){
      
      $showhide = 'show'; 
      }
      else{
      $showhide = 'hide';
      }



          $query = "INSERT INTO $tbl_catalog VALUES(NULL ,'{$form->fields['name']->value}', '{$form->fields['url']->value}', '$showhide' )";
          $cat= mysql_query($query);
          if (!$cat){
              exit ($query);
          }
      
      
       ?>
		<script>
		document.location.href="index.php";
		</script>
		<?
      }
    }
    // Начало страницы
    $title     = 'Добавление новостного сообщения';
    $pageinfo  = '<p class=help></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");
?>
<div align=left>
<FORM>
<INPUT class="button" TYPE="button" VALUE="На предыдущую страницу" 
onClick="history.back()">
</FORM> 
</div>
<?
    // Выводим сообщения об ошибках, если они имеются
    if(!empty($error))
    {
      foreach($error as $err)
      {
        echo "<span style=\"color:red\">$err</span><br>";
      }
    }
?>
<div class="table_user">
<?
    // Выводим HTML-форму 
    $form->print_form();
?>
</div>
<?php
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>