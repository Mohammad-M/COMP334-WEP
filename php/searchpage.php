<html>
<head>
  <title>RemoteDesktop</title>
</head>
<link href="main_style.css" rel="stylesheet" type="text/css" />
<body>
<div class=header>
<? //header codeing 
  require_once("top_nav.php");
  headercode::getCode('Home');
?>
</div>
<div class=content style="background-color: #A7E1F7;padding-top:100px;padding-left:100px;width:150%">
<?
     $q=htmlspecialchars($_POST['query']);
     echo '<h2>Showing result for <i><u><font color=green>'.$q.'</font></u></i></h2>';
     if($q)
     {
         $link = mysql_connect('localhost', 'root', 'root')
                             		 or die('Oops we encounter some error');
         mysql_select_db('crawler') or die('Could not select database');
		 $pieces =explode(" ",$q);
         // For counting
		  /// For Showing search result	 
		 $query = "select distinct count(u.url) as 'count' from url_webpage u,keyword_list k where u.urlhash=k.urlhash ";		
         for($k = 0, $l = count($pieces); $k < $l; ++$k){
		 if($k==0)
		 {$query.= "and k.word like '".$pieces[$k]."%' ";}
		 else
		 {$query.= "  or k.word like  '".$pieces[$k]."%' ";}           
          }
		  $query.="  ;";
		  //echo $query;
		 $result = mysql_query($query) or die('you can not use illegal charecter');		 
		 while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
      	 {	// print_r($line);
      	   echo '<b>'.$line['count'].' result found</b></br></br>';
      		//$ar[$i]=$col_value;		
         }
         // Free resultset
         mysql_free_result($result);
		 
		 
		 
		 
		 
		 
		 /// For Showing search result	 
		 $query = "select distinct u.url as 'url' ,u.title as 'title' 
		,u.backlink,k.per_in_site as 'co' ,k.freq  from url_webpage u,keyword_list k where u.urlhash=k.urlhash ";		
         for($k = 0, $l = count($pieces); $k < $l; ++$k){
		 if($k==0)
		{$query.= "and k.word like '".$pieces[$k]."%' ";}
		 else
		 {$query.= "  or k.word like  '".$pieces[$k]."%' ";}            
          }
		  $query.="  order by k.per_in_site desc,u.backlink desc limit 15;";
		  //echo $query;
		 $result = mysql_query($query) or die('you can not use illegal charecter');		 
		 while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
      	 {	// print_r($line);
      	   if($line['title']){
              echo '<div id=result><a href="'.$line['url'].'">'.$line['title'].'</a></br>'.$line['url']; 			  
			  echo '<br><b>Problity of content :'.$line['co'].'</b>';
			  echo  '<br>Backlink : '.$line['backlink'];
			    echo  '<br>frequency of word : '.$line['freq'];
			  echo '</div>';}
      		  else{echo '<div id=result><a href="'.$line['url'].'">'.$line['url'].'</a></br>';
			  echo '<br><b>Probablity of content :'.$line['co'].'</b>';
			  echo  '<br>Backlink : '.$line['backlink'];
			  echo  '<br>frequency of word : '.$line['freq'];
			  echo '</div>';
			}
      		//$ar[$i]=$col_value;		
         }
         // Free resultset
         mysql_free_result($result);
         
         // Closing connection
         mysql_close($link);
         }
?>
</div>
</body>
</html>