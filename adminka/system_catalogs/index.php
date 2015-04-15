<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Текстовое наполнение сайта"';
  $pageinfo = '<p class=help>Здесь можно добавить
               новостной блок, отредактировать или
               удалить уже существующий блок.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

try
{
    $page_link = 3; //кол-во ссылок постраничной навигации
    $pnumber = 5; //кол-во позиций на странице


    $obj = new pager_mysql($tbl_catalog, "", "ORDER BY id DESC", $pnumber, $page_link);

    $news = $obj->get_page();

    if (!empty($news)){
        ?>
        <table width = 70% class = 'table' border = 0>
        <tr class ='header' align = 'center'>
            <td>Наименование</td>
            <td>Действия</td>
        </tr>

        <?php
        for ($i = 0;$i<count($news); $i++){

            $url = "?id=".$news[$i]['id']."&page=".$_GET['page'];

            if ($news[$i]['showhide'] =='hide'){
                $showhide = "<a href = 'newsshow.php$url' title = 'отобразить'>
                  <img src ='../utils/img/show.gif'
                    border = 0 align = 'absmiddle'/>
                  отобразить</a>";
            }
            else{
                $showhide = "<a href = 'newshide.php$url' title = 'скрыть'>
                  <img src ='../utils/img/folder_locked.gif'
                    border = 0 align = 'absmiddle'/>
                  скрыть</a>";
            }





            echo "<tr>
            <td>".$news[$i]['name']."</td>
            <td class='menu' valign='top'>".$showhide."
            <a href = 'newsedit.php$url'
            title = 'Редактировать'>
            <img src = '../utils/img/kedit.gif'
            border = 0 align = 'absmiddle'/>
            Редактировать</a>
            <a href = '#' onclick = \"delete_position('newsdel.php$url', 'Вы действительо хотите удалить эту херню?');\"
            title= 'Удалить'>
            <img src = '../utils/img/editdelete.gif'
            align ='absmiddle'/>Удалить</a>
            </td>

            </tr>";

        }


    }

    echo $obj;

    ?>
    <table width=100% border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width=50% class='menu_right'>
                <?
                // Добавить блок
                echo "<a href=newsadd.php?page=$_GET[page]
             title='Добавить вид спорта'>
		<img border=0 src='../utils/img/add.gif' align='absmiddle' />
             Добавить вид спорта</a>";
                ?>
            </td>
            <td width=50%>
            </td>
        </tr>
    </table>
<?php

}
catch(ExceptionMySQL $exc)
{
    require("../utils/exception_mysql.php");
}
  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>