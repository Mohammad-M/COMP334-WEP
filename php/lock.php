<?
// check is url is in db
$lnk =htmlspecialchars( $_POST['link']);

 $link = mysql_connect('localhost', 'root', 'root')
    or die('Could not connect: ' . mysql_error());
	

mysql_select_db('crawler') or die('oops! seems like we have encounter some problem');

$query = "SELECT count(*) as 'count' ,state  FROM url_webpage where url like'".($lnk)."%' ;";
$result = mysql_query($query) or die('you can not use illegal charecter');


$line = mysql_fetch_array($result, MYSQL_ASSOC);
 $count=$line['count'];
 if ($count>0) 
    {
    if($line['state']==0)
	  { echo 'we have your site in our database and will be crawled very soon</br> your site priority hav been moved to the highest.';	  }
	elseif($line['state']==1)
	  {echo 'we are crawling currently your site';}
	elseif($line['state']==2)
	  {echo 'You site have already been crawled';}
	}
 else
 { mysql_free_result($result); 
 $query = "insert into url_webpage values('".md5($lnk)."','".$lnk."',0,null,0,4,' ');";
// echo $query;
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
echo 'Thank you for adding your site we will soon crawl your site.';
 }
 
// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);



?>
