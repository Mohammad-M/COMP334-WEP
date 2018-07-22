<?php
$username = $_GET['username'];
$query = 'SELECT username FROM users WHERE username = "' .$username.'"';
        $result = $con->query($query) or die(mysql_error());
        if (mysqli_num_rows($result)> 0) {
            return $result;
        }
?>