<?php
    session_start();

    ScopedInclude('headers/header.php',array('includedBy' => __FILE__));
    include 'pages.inc.php';
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1 && isset($_SESSION['username']) && isset($_SESSION['user'])) {
// user is logged in
        $html.='<div class="row">';
            $html.='<div class="col-12">';
                $html.='<h2>Welcome, ' . $_SESSION['username'] . '!</h2>';
                $html.='<p><strong>We\'re glad you\'re giving us a visit</strong></p>';
            $html.='</div>';
        $html.='</div>';
        echo $html;

    } else{
// user is not logged in
        
$html.='<section class="row">';
    $html.='<section class="col-12">';
        $html.='<form action="' . LOGIN_PAGE . '" method="post" id="loginForm">';
            $html.='<fieldset>';
            $html.='<legend>Already registered ? Login now</legend>';
                $html.='<table>';
                    $html.='<tr class="">';
                        $html.='<td><label for="username"> Username: </label></td>';
                        $html.='<td><input type="text" name="username" id="username" size="20" maxlength="20" value="' . $username . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="">';
                        $html.='<td><label for="password"> Password: </label></td>';
                        $html.='<td><input type="password" name="password" id="password" size="20" maxlength="20" value="' . $password . '"/></td>     ';
                    $html.='<td>';
                        $html.='<input type="submit" value="Login" name="Login"/>';
                    $html.='</td>';
                    $html.='</tr>';
                $html.='</table>';
            $html.='</fieldset>';
        $html.='</form>';
    $html.='</section>';
$html.='</section>';

$html.='<div class="row">';
    $html.='<div class="col-12">';
    $html.='<h2>Welcome, Stranger!</h2>';
    $html.='<p><strong>We\'re glad you\'re giving us a visit</strong></p>';
    $html.='<p>Why don\'t you just <a href="' . REGISTER_PAGE . '">Create an account</a> right now and start booking your picnics to your favorite places with the best prices ?';
    $html.='<br>or you could just log in start roaming around</p>';
    $html.='</div>';
$html.='</div>';

echo $html;
    }//else

    include 'headers/footer.html';
    include 'headers/asside.html';


function ScopedInclude($file, $params = array())
{
    extract($params);
    include $file;
}
?>