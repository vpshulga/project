<?php require_once('templates/top.php');
$name = new field_text('name','Логин',true,$_POST['name']);
$pass = new field_password('pass','Пароль',true,$_POST['pass']);
$passr = new field_password('passr','Повторите пароль',true,$_POST['passr']);
$email = new field_text_email('email','E_mail',true,$_POST['email']);
$form = new form(array('name'=>$name,'pass'=>$pass,'passr'=>$passr, 'email'=>$email),'регистрация','field');
if ($_POST){
$error=$form->check();
if ($form->fields['pass']->value != $form->fields['passr']->value){
$error[]='пароли не совпадают';
}
$query = "SELECT COUNT(*) FROM $tbl_enter WHERE login='{$form->fields['name']->value}'";
$cat = mysql_query($query);
if (!$cat){
exit ($query);
}
if (mysql_result($cat,0)){
$error[] = 'Имя занято';
}
if (!$error){
$query = "INSERT INTO $tbl_enter VALUES(NULL,'{$form->fields['name']->value}',
'{$form->fields['email']->value}','{$form->fields['pass']->value}','unblock',NOW(),NOW())";
$cat= mysql_query($query);
if (!$cat){
exit ($query);
}
?>
<script>
document.location.href='login.php';
</script>
<?php
}

if ($error){
foreach ($error as $err){
echo "<span style='color:red'>";
echo $err;
echo "</span><br/>";
}
}
}
$form-> print_form();
 require_once('templates/bottom.php');?>		