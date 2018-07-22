<html>
<head>
  <title>RemoteDesktop</title>
</head>
<link href="main_style.css" rel="stylesheet" type="text/css" />
<body>
<div class=header>
<? //header codeing 
  require_once("top_nav.php");
  headercode::getCode('Crawler Status');
?>
</div>
<div class=content style="background-color: #A7E1F7;padding-top:100px;padding-left:100px">
<?
  echo '<h2>Crawler Status :<font color=green>Running</font></h2>';
  
  ?>
  <div class=content style="padding-left:36px">
  <?
  $link = mysql_connect('localhost', 'root', 'root')
    or die('Could not connect: ' . mysql_error());
	

mysql_select_db('crawler') or die('Could not select database');

// Performing SQL query

$query = "SELECT count(*) as 'count' FROM url_webpage where  state  =0 ;";
$result = mysql_query($query) or die('you can not use illegal charecter');


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo '<font size=+3 color=black>'.$line['count'].' </font> url to be crawled.</br>';
}


// Free resultset
mysql_free_result($result);

// Performing SQL query
$query = "SELECT count(*) as 'count' FROM url_webpage where state  =2 ;";
$result = mysql_query($query) or die('you can not use illegal charecter');


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo '<font size=+3 color=black>'.$line['count'].'</font> url have been crawled yet.';
}

// Free resultset
mysql_free_result($result);
echo '<br>';
// Performing SQL query
$query = "SELECT count(*) as 'count' FROM keyword_index ;";
$result = mysql_query($query) or die('you can not use illegal charecter');


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo ''.$line['count'].' keywords in database .';
}

// Free resultset
mysql_free_result($result);


// Free resultset
mysql_free_result($result);
echo '<br>';
// Performing SQL query
$query = "SELECT count(*) as 'count' FROM url_webpage ;";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());


while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo ''.$line['count'].' total url in database  .';
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?></div>
</div>
</body>
</html>