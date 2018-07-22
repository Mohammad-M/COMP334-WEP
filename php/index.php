
<html>
<head>
  <title>RemoteDesktop</title>
</head>
<link href="main_style.css" rel="stylesheet" type="text/css" />
<body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
<script>

function showResult(term)
{
  $("#search_suggestion").animate({top:'250px',opacity:'0.0'},'fast');
  $.get("suggest.php",
  {
    q:term
  },
  function(data,status){
	document.getElementById("search_suggestion").innerHTML=data;
	 $("#search_suggestion").animate({top:'267px',opacity:'1.0' },'fast');
  });
}
function chg(str)
{
    $("#sbox").val(str);
}
</script>
<div class=header>
<? //header codeing 
  require_once("top_nav.php");
  headercode::getCode('Home');
?>
</div>



<div class=content style="background-color: #A7E1F7;padding-top:100px;padding-left:100px">

<h1>Search</h1></br><form method="post" action="searchpage.php" name="registerform">
<input type=text id="sbox" name=query onkeyup="showResult(this.value)"  autocomplete="off" style="width:80%"></input><input type=submit value=Search></form>
<div id="search_suggestion" style="width: 82%;background-color: #E7F7FF;-webkit-box-shadow: #4A4775 0px 0px 4px;margin-top: 4px;opacity: 1;top: 236px;position: absolute;">
</div>
</div>




</body>
</html>