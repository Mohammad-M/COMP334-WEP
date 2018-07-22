 <html>
<head>
  <title>RemoteDesktop</title>
</head>
<link href="main_style.css" rel="stylesheet" type="text/css" />
<body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<div class=header>
<? //header codeing 
  require_once("top_nav.php");
  headercode::getCode('Add your website to  be crawled');
?>
</div>
<script>
function add(){
	var url = $('#url').val();
	$.post('lock.php', {link:url}, function(data){			
		$('#feedback').html(data);
	});
}

</script>
<div class=content style="background-color: #A7E1F7;padding-top:100px;padding-left:100px">

	<h2>Url of your web site:</h2> <input id="url" type=text name=url value="http://" style="width:20%"></input>
	 <input type=submit value=Add onclick="add()">
	<div id="feedback" style=""padding-top: 20;font-size: 30;color: gray;></div>
</div>

</div>

</body>
</html>