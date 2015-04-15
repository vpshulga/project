<?php
	$dblocation = 'localhost';
	$dbname = 'project';
	$dbuser = 'root';
	$dbpassword = '';
	$tbl_maintext = 'maintexts'; //Таблица
	$tbl_enter='enter';
         $tbl_catalog = 'catalogs';
	$tbl_ots = 'ots';
  $tbl_chemps = 'chemps';
  $tbl_accounts = 'system_accounts';
	$dbcnx = mysql_connect($dblocation, $dbuser, $dbpassword);
	
	if (!$dbcnx){
	exit('no connect to server MySQL');
	}
	
	$dbuse = mysql_select_db($dbname, $dbcnx);
	if(!$dbuse){
	exit('no DB');	
	}
	
	@ mysql_query("SET NAMES 'utf8'");
	
	
