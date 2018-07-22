<?php
session_start();
ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
include 'pages.inc.php';
include 'conn.inc.php';
$con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
die ('Unable to connect. Check your connection parameters.');
$html='';

echo $html;
include 'headers/footer.html';

function ScopedInclude($file, $params = array())
{
    extract($params);//pass parameter to file included
    include $file;
}

?>