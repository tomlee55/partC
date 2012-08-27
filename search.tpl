<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>WineStore</title>

<style type="text/css">
h1{text-align:center}
</style>
<meta name="keywords" content="" />
</head>
<body>

<h1>Winestore partD</h1>

<form action="result.php" method="GET">
<table border="5" cellspadding="20" align="center">

     <tr>
         <td>Wine Name:</td>
         <td><input type="text" name="winename" /></td>
     </tr>
     <tr>
         <td>Winery Name:</td>
         <td><input type="text" name="wineryname" /></td>
     </tr>
     <tr>
         <td>Region Name:</td>
         <td><select name="regionname">
		 {html_options output=$regionname}</select></td>
     </tr>
	 <tr>
		<td>Grape Variety:</td>
		<td><select name="grapevariety">
		{html_options output=$grapevariety}</select></td>
	</tr>
     <tr>
         <td>Start year:</td>
         <td><select name="startyear">
		 {html_options output=$startyear}</select></td>
     </tr>
     <tr>
         <td>End Year:</td>
         <td><select name="endyear">
		 {html_options output=$endyear}</select></td>
     </tr>
     <tr>
         <td>Minimum Wine In Stock:</td>
         <td><input type="text" name="minimumstock" /></td>
     </tr>
	 <tr>
		<td>Minimum Wine in Ordered:</td>
		<td><input type="text" name="minOrder"></td>
	 </tr>
     <tr>
         <td>Minimum Cost:</td>
         <td><input type="text" name="minimumcost" /></td>
     </tr>
     <tr>
         <td>Maximum Cost:</td>
         <td><input type="text" name="maximumcost" /></td>
     </tr>
     <tr>
         <td><input type="submit" name="submit" value="submit" /></td>
     </tr>

</table></form>
</body>
</html>


