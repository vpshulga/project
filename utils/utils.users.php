<?php function enter($name, $pass){
  global $tbl_enter;
  
  $query = "SELECT * FROM $tbl_enter WHERE login = '$name' AND 
                                     password = '$pass' AND 
                                     blockunblock = 'unblock' LIMIT  1";
                                     
  $usr = mysql_query($query);
  if(!$usr)
  {
   exit ($query);
  }
  
  if (mysql_num_rows($usr))
  {
    $log = mysql_fetch_array($usr);
    $_SESSION['id_user_position'] = $log['id'];
    
    $query = "UPDATE $tbl_enter SET lastvisit = NOW()
              WHERE id = ".$log['id'];
    
    $cat = mysql_query($query);
    if (!$cat){
      exit($query);
    }
  
    return true;
  }
  else
  {
    return false;
  }
  
}
?>