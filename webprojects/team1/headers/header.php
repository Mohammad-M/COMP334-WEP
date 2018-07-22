<?php
    if(!isset($_COOKIE["PHPSESSID"]))
    {
      session_start();
    }

    $mainpage = 'main.php';
    $picnicspage = 'picnics.php';
    $registerpage = 'register.php';
    $accountpage = 'account.php';
    $loginpage = 'register.php';
    $logoutpage = 'logout.php';
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <title>picnics R us | <?php 
    if(strpos($includedBy,$mainpage) !== FALSE) echo 'Home';
    elseif(strpos($includedBy, $picnicspage) !== FALSE) echo 'Picnics';
    elseif(strpos($includedBy,$accountpage) !== FALSE) echo 'My Account';
    elseif(strpos($includedBy,$registerpage) !== FALSE) echo 'Register';
    else echo 'PRU';
    ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/projectcss.css" rel="stylesheet" type="text/css">
    <link href="css/grid.css" rel="stylesheet" type="text/css">
    <link href="css/headerfooter.css" rel="stylesheet" type="text/css"> 
    <link rel="shortcut icon" href="images/favicon.ico" />
    <script type="text/javascript" src="js/javascript.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fascinate" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
</head>
<header class="navbar">
        <div>
            <h1><a href="main.php"" class="logo">picnics R us</a></h1>
        </div>
        <div class="right">
            <span id="menubutton"><i class="material-icons" onclick="return showSideNav();">menu</i></span>
            <ul class="navlist " id="navlistitems">
                <li id="closelayout"><a id="close" onclick="return closeSideNav();"></a></li>
                <li><a 
                <?php 
                    if(strpos($includedBy,$mainpage)  !== FALSE)
                        echo ' href="#" class="here"';
                    else
                        echo ' href="'.$mainpage.'"'; 
                ?>
                ><i class="material-icons">home</i>Home</a></li>
                <li><a 
                <?php
                    if(strpos($includedBy,$picnicspage) !== FALSE )
                        echo 'href="#" class="here"';
                    else
                        echo 'href="'.$picnicspage.'"'; 
                ?>
                ><i class="material-icons">card_travel</i>Picnics</a></li>
                <?php
                if( isset($_SESSION['logged']) && 
                    isset($_SESSION['username']) && 
                    isset($_SESSION['user']) && 
                    $_SESSION['logged'] == 1){
                        $html = '<li><a ';
                        if(strpos($includedBy,$accountpage) !== FALSE )
                            $html .= 'href="#" class="here"';
                        else
                            $html .= 'href="'.$accountpage.'"';

                        $html.='><i class="material-icons">settings</i>Account</a></li>';
                        echo $html;

                        $html =  '<li><a href="'.$logoutpage.'"><i class="material-icons">exit_to_app</i>Log out</a></li>';
                        echo $html;
                }
                else{
                    $html = '<li><a ';
                    if(strpos($includedBy,$registerpage) !== FALSE )
                        $html .= 'href="#" class="here"';
                    else
                        $html .='href="'.$registerpage.'"';

                    $html.='><i class="material-icons">exit_to_app</i>Register</a></li>';
                    echo $html;
                }
                ?>
            </ul>
        </div>
    </header>
    <main class="main">