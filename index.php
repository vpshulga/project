<?php require_once('templates/top.php');

if ($_GET['url']){
$file = $_GET['url'];
}
else{
$file = 'index';
}

$query = "SELECT * FROM $tbl_maintext WHERE url = '$file'";

$cat = mysql_query($query);
	if(!$cat){
	exit($query);
	}
$tbl_text = mysql_fetch_array($cat);
	
	
	
?>
<h2 align=center ><?php echo $tbl_text['name'];?> </h2>	
				
					
<?php echo $tbl_text['body'];?>							 
			
<?php require_once('templates/bottom.php');?>