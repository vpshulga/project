<?php require_once('templates/top.php');
$body = new field_textarea('name','Сообщение об ошибке',true,$_POST['name']);

$form = new form(array('body'=>$body),'Отправить','field');

if ($_POST){
	$error = $form->check();
	
	$query1 = "SELECT * FROM $tbl_enter WHERE id = ".$_SESSION['id_user_position'];
	
	$usr = mysql_query($query1);
	if (!$usr)
     {
       exit ($query);
     }
	$login = mysql_fetch_array($usr);
	if (!$error){
	$query = "INSERT INTO $tbl_ots VALUES(NULL, '".$_SESSION['id_user_position']."', '{$form->fields['body']->value}', '' , NOW() ,'show')";
	$cat = mysql_query($query);
	if (!$cat){
	exit ($query);
	}
	?>
		<script>
		document.location.href='index.php';
		</script>
		<?php
	}
	
	foreach ($error as $err)
	{
		echo "<span style='color:red'>";
		echo $err;
		echo "</span><br/>";
	}
}
$form-> print_form();
require_once('templates/bottom.php');?>