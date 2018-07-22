<?

$term=htmlspecialchars($_GET["q"]) ;
if ($term ){
$pieces =explode(" ",$term);
// Connecting, selecting database
$intialterm="";
$len= count($pieces);
for($k = 0, $l = count($pieces)-1; $k < $l; ++$k){
$intialterm.= $pieces[$k]." ";
}
$link = mysql_connect('localhost', 'root', 'root')
    or die('Could not connect: ' . mysql_error());
	

mysql_select_db('crawler') or die('Could not select database');
//echo $len;
if($len<=1){
// Performing SQL query
$query = "SELECT word FROM keyword_index where word  like  '$term%'  limit 7;";
$result = mysql_query($query) or die('you can not use illegal charecter');

// Printing results in HTML
echo '<table id=st >';
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo '<tr id=sr >';
    foreach ($line as $col_value) {
        ?>

		<td onclick="chg('<? echo $col_value ?>')"><p > 	
		<? echo $col_value ?> 
		</p></td>
		<?
    }
    echo "</tr>";
}
echo "</table>";}
else{
  // echo $intialterm;
 //echo '<u>'.   $pieces[$len-1];
$query = "SELECT word FROM keyword_index where word  like  '".$pieces[$len-1]."%' order by freq desc limit 7;";
$result = mysql_query($query) or die('you can not use illegal charecter');

// Printing results in HTML
echo '<table id=st >';
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo '<tr id=sr >';
    foreach ($line as $col_value) {
		  ?>

		<td onclick="chg('<? echo $intialterm.' '.$col_value ?>')"><p > 	
		<? echo '<b>'.$intialterm.'</b> '.$col_value ?> 
		</p> </td>
		<?
    }
    echo "</tr>";
}
echo "</table>";}



// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
}

?>