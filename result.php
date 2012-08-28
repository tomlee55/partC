<?php
  
  $winename = $_GET['winename'];
  $wineryname = $_GET['wineryname'];
  $regionname = $_GET['regionname'];
  $grapevariety = $_GET['grapevariety'];
  $startyear = $_GET['startyear'];
  $endyear = $_GET['endyear'];
  $minimumstock = $_GET['minimumstock'];
  $minimumInOrder = $_GET['minimumInOrder'];
  $minimumcost = $_GET['minimumcost'];
  $maximumcost = $_GET['maximumcost'];

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
	
	$query = "SELECT DISTINCT wine.wine_id AS wineID,wine.wine_name AS winename,cost,on_hand,SUM(qty) qty,SUM(price) price,
			  wine.year AS wineyear,
              winery.winery_name AS wineryname,
              region.region_name AS regionname
              
              FROM wine,grape_variety,winery,region,wine_variety,inventory,items
              WHERE wine.winery_id = winery.winery_id AND
			  wine_variety.variety_id = grape_variety.variety_id AND
			  wine_variety.wine_id = wine.wine_id AND
			  winery.region_id = region.region_id AND
			  wine.wine_id = items.wine_id AND
			  inventory.wine_id = wine.wine_id "; 

// 
if(isset($winename) && $winename !="")
$query .="AND wine.wine_name like \"%{$winename}%\""; 

if(isset($wineryname) && $wineryname != "") 
$query .= "AND winery.winery_name like \"%{$wineryname}%\""; 

if(isset($regionname) && $regionname != "1") 
$query .= "AND region.region_id = \"{$regionname}\""; 

if(isset($startyear) && $startyear != "") 
$query .= "AND wine.year >= \"{$startyear}\""; 

if(isset($endyear)  && $endyear != "") 
$query .= "AND wine.year <= \"{$endyear}\""; 

if($startyear > $endyear){
   die('Invaild input, start year must less than end year');
  } 

if(isset($minimumstock) && $minimumstock != "") 
$query .= " AND inventory.on_hand >= \"{$minimumstock}\""; 

if($minimumInOrder != 0) {
            $query .= " GROUP BY items.wine_id
                        HAVING qty >=\"{$minimumInOrder}\"
                        ORDER BY wine_name";
        }
        else $query .= ' GROUP BY items.wine_id
                         ORDER BY wine_name';

if(isset($minimumcost) && $minimumcost != "") 
$query .= " AND invertory.cost >= \"{$minimumcost}\""; 

if(isset($maximumcost) && $maximumcost !="") 
$query .=" AND inventory.cost <= \"{$maximumcost}\""; 

if($minimumcost > $maximumcost){
   print "('Invaild input, minimum cost must less than maximum cost')";
   }

      // Run the query on the server 
     $result = @ mysql_query($query, $conn);
	
	    // Find out how many rows are available
	    $rowsFound = @ mysql_num_rows($result);
		
    $wines = array();
	$grapeVa = array();
	$i = 0;
   	while ($row= @ mysql_fetch_array($result)){
	  $query = "SELECT variety FROM wine_variety, grape_variety
                WHERE wine_variety.wine_id = '{$row["wineID"]}' AND
                      wine_variety.variety_id = grape_variety.variety_id
                ORDER BY variety";
      $result1= mysql_query($query, $conn);
 
     $wines[$i] = $row;
     $i++;
   }
   
    $smarty->assign('rowsFound',$rowsFound);
	$smarty->assign('wines',$wines);
    $smarty->display('result.tpl');
   
   
 ?>