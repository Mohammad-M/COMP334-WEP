<?php
    if(!isset($_COOKIE["PHPSESSID"]))
    {
      session_start();
    }
    
    include 'pages.inc.php';

$html='<!DOCTYPE html>';
$html.='<html>';
$html.='<head lang="en">';

    $html.='<title>picnics R us | ';
    if(strpos($includedBy,MAIN_PAGE) !== FALSE)
        $html.='Home';
    elseif(strpos($includedBy, PICNICS_PAGE) !== FALSE)
        $html.='Picnics';
    elseif(strpos($includedBy,ACCOUNT_PAGE) !== FALSE)
        $html.='My Account';
    elseif(strpos($includedBy,REGISTER_PAGE) !== FALSE)
        $html.='Register';
    else
        $html.='PRU';
    $html.='</title>';
    $html.='<meta charset="utf-8" />';
    $html.='<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $html.='<link href="css/projectcss.css" rel="stylesheet" type="text/css">';
    $html.='<link href="css/grid.css" rel="stylesheet" type="text/css">';
    $html.='<link href="css/headerfooter.css" rel="stylesheet" type="text/css"> ';
    $html.='<link rel="shortcut icon" href="images/favicon.ico" />';
    $html.='<script type="text/javascript" src="js/javascript.js"></script>';
    $html.='<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
    $html.='<link href="https://fonts.googleapis.com/css?family=Fascinate" rel="stylesheet">';
    $html.='<link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">';
    $html.='</head>';

        $html.='<header class="navbar">';
            $html.='<div>';
                $html.='<h1><a href="'.MAIN_PAGE.'" class="logo">picnics R us</a></h1>';
            $html.='</div>';
            $html.='<div class="right">';
                $html.='<span id="menubutton"><i class="material-icons" onclick="return showSideNav();">menu</i></span>';
                $html.='<ul class="navlist " id="navlistitems">';
                $html.='<li id="closelayout"><a id="close" onclick="return closeSideNav();"></a></li>';

                //Home page button
                if(strpos($includedBy,MAIN_PAGE)  !== FALSE)
                    $html.='<li><a href="#" class="here"';
                else
                    $html.='<li><a href="'.MAIN_PAGE.'"'; 
            
                $html.='><i class="material-icons">home</i>Home</a></li>';

                //Picnics Button
                if(strpos($includedBy,PICNICS_PAGE) !== FALSE )
                    $html.='<li><a href="#" class="here"';
                else
                    $html.='<li><a href="'.PICNICS_PAGE.'"'; 
                
                $html.='><i class="material-icons">card_travel</i>Picnics</a></li>';
            
                if( isset($_SESSION['logged']) && 
                    isset($_SESSION['username']) && 
                    isset($_SESSION['user']) && 
                    $_SESSION['logged'] == 1){
                        //if a manager logged in show him a Manage Picnics button
                        if($_SESSION['user'] === 'm'){
                            if(strpos($includedBy,MANAGE_PAGE) !== FALSE )
                                $html.='<li><a href="#" class="here"';
                            else
                                $html.='<li><a href="'.MANAGE_PAGE.'"';

                        $html.='><i class="material-icons">settings</i>Manage Picnics</a></li>';
                        }
                        //show the user an account page
                        if(strpos($includedBy,ACCOUNT_PAGE) !== FALSE )
                            $html.='<li><a href="#" class="here"';
                        else
                            $html.='<li><a href="'.ACCOUNT_PAGE.'"';

                        $html.='><i class="material-icons">settings</i>Account</a></li>';

                        $html.='<li><a href="'.LOGOUT_PAGE.'"><i class="material-icons">exit_to_app</i>Log out</a></li>';
                }
                else{
                    //if not logged in show a register button
                    if(strpos($includedBy,REGISTER_PAGE) !== FALSE )
                        $html.='<li><a href="#" class="here"';
                    else
                        $html.='<li><a href="'.REGISTER_PAGE.'"';

                    $html.='><i class="material-icons">exit_to_app</i>Register</a></li>';
                }
            $html.='</ul>';
        $html.='</div>';
    $html.='</header>';

    //if not activated
    $html.='<main class="main">';
    if(isset($_SESSION['activated']) && $_SESSION['activated'] === '0'){
        $html.='<div class="row" style="text-align: center; font-size: 200%;">';
            $html.='<div class="col-12">';
                $html.='<p>Please activate your account</p>';
            $html.='</div>';
        $html.='</div>';
    }
    echo $html;
    ?>