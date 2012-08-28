<?php
    /*
        Connect to the database
    */
    include("/home/stud/s3262421/php/Smarty-3.1.11/libs/Smarty.class.php");
    include('db.php');
    $smarty = new Smarty;
    $smarty->setTemplateDir('./smarty/templates');
    $smarty->setCompileDir('./smarty/templates_c');
    $smarty->setCacheDir('./smarty/cache');
    $smarty->setConfigDir('./smarty/configs');
	
    @ $conn = mysql_connect(DB_HOST, DB_USER, DB_PW);
    if(!$conn) exit;
    mysql_select_db(DB_NAME, $conn);

	  $query = 'SELECT * FROM region ORDER BY region_name';
	  $idRegion = array();
	  $regionname = array();
	  $result = @ mysql_query ($query, $conn);
	  $i=0;
      while ($row = @ mysql_fetch_row($result)){
	       $idRegion[$i] = $row[0];
	       $regionname[$i] = $row[1];
		   $i++;
	}
	
	$smarty->assign('idRegion',$idRegion);
	$smarty->assign('regionname',$regionname);
			
	  
	  
	 $smarty->display('search.tpl');
	 
?>
	  
	  
	  
	  
	  
	  
	  
	  