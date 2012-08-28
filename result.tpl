 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>WineStore</title>
<meta name="keywords" content="" />
</head>
<body>
<h1>There are {$rowsFound} records found:</h1>
   <a href=search.php>Index Page</a>
      <table border=1 align=\"center\">
	    <tr>
		  <td>Wine Name </td>
 		  <td>Variety </td>
          <td>WineYear </td>
		  <td>WineryName </td>
		  <td>Region </td>
		  <td>cost </td>
		  <td>Availble bottles number </td>
          <td>Total stock sold </td>
		  <td>sales revenue </td>
		</tr>
           {foreach $wines as $wine}
        <tr>
          <td>{$wine[1]}</td>
          <td 
           {$grapeVa[$wine@index]}
          </td>
          <td>{$wine[6]}</td>
          <td>{$wine[7]}</td>
          <td>{$wine[8]}</td>
          <td>${$wine[2]}</td>
          <td>{$wine[3]}</td>
          <td>{$wine[4]}</td>
          <td>${$wine[5]}</td>
        </tr>
            {/foreach}
      </table>
</body>
</html>