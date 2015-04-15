<?php require_once('templates/top.php');
$bodyots = new field_textarea('name','Ваш отзыв',true,$_POST['name']);

$form = new form(array('bodyots'=>$bodyots),'Отправить','field');


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
        $query = "INSERT INTO $tbl_ots VALUES(NULL, '".$login['login']."', '', '{$form->fields['bodyots']->value}' , NOW() ,'show')";
        $cat = mysql_query($query);
        if (!$cat){
            exit ($query);
        }
    }

    if($error) {
        foreach ($error as $err) {
            echo "<span style='color:red'>";
            echo $err;
            echo "</span><br/>";
        }
    }
    else {

        ?>
        <script>
            document.location.href = 'otsivy.php';
        </script>
    <?php
    }


}
if ($_SESSION['id_user_position']) {
    $query = "SELECT login, bodyots, otsdate FROM $tbl_ots WHERE bodyots != '' ";
    $usr = mysql_query($query);
    if (!$usr) {
        exit ($query);
    }
    $page_link = 3; //кол-во ссылок постраничной навигации
    $pnumber = 5; //кол-во позиций на странице


    $obj = new pager_mysql($tbl_ots, "", "ORDER BY id DESC", $pnumber, $page_link);

    $news = $obj->get_page();

    if (!empty($news)) {
        echo $obj;
        for ($i = 0;$i<count($news); $i++) {

            $url = "?id=" . $news[$i]['id'] . "&page=" . $_GET['page'];
            while ($login = mysql_fetch_array($usr)) {
                echo "<table class='otsivy_table' align='center'>
                 <tr class='otsivy_name'>
                 <td>Отзыв оставил: " . $login['login'] . "</td></tr>
                 <tr class = 'otsivy_body'>
                 <td>" . $login['bodyots'] . " </td></tr>
                 <tr class = 'otsivy_date'>
                 <td>Дата отзыва: " . $login['otsdate'] . "</div></td><br>";
            }
        }
    }

}
$form-> print_form();
require_once('templates/bottom.php');?>