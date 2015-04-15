<?php
require_once('templates/top.php');

$query = "SELECT * FROM $tbl_catalog WHERE id= ".$_GET['id'];
$cat = mysql_query($query);
if (!$cat){
exit($query);
}

$category = mysql_fetch_array($cat);

echo "<h2>".$category['name']."</h2>";

$query = "SELECT * FROM $tbl_chemps WHERE cat_id =".$_GET['id'];

$ch = mysql_query($query);
if (!$ch){
exit($query);
}

while($chemp = mysql_fetch_array($ch)){
  
  if($chemp['picturesmall']){
    $picture = "<a href = '#' data = ".$chemp['id']." class = 'picture'>
    <img src= 'media/images/".$chemp['picturesmall']."'/></a>";
        
  }
  else{
    $picture = "-";
    }
  
  


  echo "<div class = 'chemp'>";
  echo $picture."</br>";
  echo $chemp['name'];
  echo "</div>";
  
}



require_once('templates/bottom_cat.php'); ?>				