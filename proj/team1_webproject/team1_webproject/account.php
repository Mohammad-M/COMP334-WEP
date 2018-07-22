<?php

session_start();
ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
$main = 'main.php';
include 'conn.inc.php';
$con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
die ('Unable to connect. Check your connection parameters.');

// filter incoming values
$oldPassword = (isset($_POST['oldPassword'])) ? $_POST['oldPassword'] : '';
$newPassword = (isset($_POST['newPassword'])) ? $_POST['newPassword'] : '';
$name = (isset($_POST['name'])) ? trim($_POST['name']) : getName($con, $_SESSION['username']);
$phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : getPhone($con, $_SESSION['username']);
$email = (isset($_POST['email'])) ? trim($_POST['email']) : getEmail($con, $_SESSION['username']);
$address = (isset($_POST['address'])) ? trim($_POST['address']) : getAddress($con, $_SESSION['username']);
$idnumber = (isset($_POST['idnumber'])) ? trim($_POST['idnumber']) : getIdNumber($con, $_SESSION['username']);

$html='';
if (isset($_SESSION['logged']) && isset($_SESSION['user']) && isset($_SESSION['username'])) {
    if(count($_POST) > 0){
        $errors = array();
        // make sure manditory fields have been entered

        if (empty($oldPassword)) {
            $errors[] = 'Old Password cannot be blank.';
        }  
        elseif(checkPassword($con,$_SESSION['username'],$oldPassword) < 1){
            $errors[] = 'Current Password Entry is incorrect';
            $password='';
        }
        if (empty($newPassword)) {
            $errors[] = 'New Password cannot be blank.';
        }
        elseif($oldPassword === $newPassword){
            $errors[]='Password is the same.';
        }
        if (empty($name)) {
            $errors[] = 'name cannot be blank.';
        }
        if (empty($phone)) {
            $errors[] = 'Phone cannot be blank.';
        }
        if (checkPhone($con, $phone) > 0) {
            $errors[] = 'Phone ' . $phone . ' is already in use.';
            $username = '';
        }
        if (empty($email)) {
            $errors[] = 'Email cannot be blank.';
        }
        if (checkEmail($con, $email) > 0) {
            $errors[] = 'Email ' . $email . ' is already registered.';
            $username = '';
        }
        if (empty($address)) {
            $errors[] = 'Address cannot be blank';
        }
        if (empty($idnumber)) {
            $errors[] = 'ID Number cannot be blank';
        }
        if(checkIdNumber($con,$idnumber) > 0){
            $errors[] = 'Id Number ' . $idnumber . ' is already in use.';
            $idnumber = '';
        }
        if(count($errors) == 0){
            $html.='<ul class="success" style="background: green; list-style: none; text-align: center;">';
            $html.='<p>Update Successful</p>';
            $html.='</ul>';
        }
        if (count($errors) > 0) {
            $html.='<ul class="error" style="background: red; list-style: none; text-align: center;">';
            foreach ($errors as $error) {
                $html.='<li> ' . $error . ' </li>';
            }
            $html.='</ul>';

        } else {
            // No errors so enter the information into the database.
            //User entry
            $query = 'UPDATE users SET
            password="'.$_POST['newPassword'].'"'.
            ', name="'.$_POST['name'].'"'.
            ', phone="' . $_POST['phone'].'"'. 
            ', email="' . $_POST['email'].'"'.
            ', address="'.$_POST['address'].'"'.
            ', idnumber="'.$_POST['idnumber'].'"'.
            'WHERE username="'.$_SESSION['username'].'"';
            $result = $con->query($query) or die(mysql_error());

            mysqli_free_result($result);
            $con->close();
            //header('Location: ' . ACCOUNT_PAGE);

            //die();
        }//else no errors
    }//post
}//session if
else {
    //if not logged in and tries to go to account page redirect user to main page
    header('Location: ' . $main);
}

$html.='<section class="row">';
    $html.='<section class="col-12">';
        $html.='<form action="'.ACCOUNT_PAGE.'" method="post" id="regForm">';
            $html.='<fieldset>';
            $html.='<legend>Edit Your Account</legend>';
                $html.='<table>';
                $html.='<tr class="">';
                        $html.='<td><label for="username"> Username: </label></td>';
                        $html.='<td><input type="text" value="' . $_SESSION['username'] . '" disabled/></td>';
                    $html.='</tr>';
                    $html.='<tr class="">';
                        $html.='<td><label for="oldPassword"> Current Password: </label></td>';
                        $html.='<td><input type="password" placeholder="Current Password" name="oldPassword" id="oldPassword" size="20" maxlength="20" value="' . $oldPassword . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="">';
                        $html.='<td><label for="newPassword"> New Password: </label></td>';
                        $html.='<td><input type="password" placeholder="New Password" name="newPassword" id="newPassword" size="20" maxlength="20" value="' . $newPassword . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="info">';
                        $html.='<td><label for="email"> Email: </label></td>';
                        $html.='<td><input type="email" placeholder="email@example.com" name="email" id="email" size="20" maxlength="50" value="' . $email . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="info">';
                        $html.='<td><label for="name"> Name: </label></td>';
                        $html.='<td><input type="text" placeholder="Name..." name="name" id="name" size="20" maxlength="20" value="' . $name . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="info">';
                        $html.='<td><label for="phone"> Phone: </label></td>';
                        $html.='<td><input type="text" placeholder="123456789" name="phone" id="phone" size="20" maxlength="20" value="' . $phone . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="info">';
                        $html.='<td><label for="address"> Address: </label></td>';
                        $html.='<td><input type="text" placeholder="Address..." name="address" id="address" size="20" maxlength="20" value="' . $address . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="info">';
                        $html.='<td><label for="idnumber"> ID Number: </label></td>';
                        $html.='<td><input type="text" placeholder="0000000000" name="idnumber" id="idnumber" size="20" maxlength="10" value="' . $idnumber . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr>';
                        $html.='<td><button type="reset" value="Reset">Reset</button></td>';
                        $html.='<td><input type="submit" name="submitt" value="Update"/></td>';
                    $html.='</tr>';
                $html.='</table>';
            $html.='</fieldset>';
        $html.='</form>';
    $html.='</section>';
$html.='</section>';

echo $html;
include 'headers/footer.html';

function ScopedInclude($file, $params = array())
{
    extract($params);//pass parameter to file included
    include $file;
}

function checkIdNumber($mysql_con, $idnumber)
{
    $query = 'SELECT username FROM users WHERE idnumber = "' . $idnumber . '" AND username!="'.$_SESSION['username'].'"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkPhone($mysql_con, $phone)
{
    $query = 'SELECT username FROM users WHERE phone = "' . $phone . '" AND username!="'.$_SESSION['username'].'"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkEmail($mysql_con, $email)
{
    $query = 'SELECT username FROM users WHERE email = "' . $email . '" AND username!="'.$_SESSION['username'].'"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkPassword($mysql_con, $username, $password)
{
    $query = 'SELECT * FROM users WHERE username="'.$username.'" AND password="'.$password.'"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function getOldPassword($mysql_con, $username)
{
    $query = 'SELECT password FROM users WHERE username="'.$username.'"';
    $result = $mysql_con->query($query); 
    $row = $result->fetch_assoc();
    return $row['password'];
}

function getName($mysql_con, $username)
{
    $query = 'SELECT name FROM users WHERE username="'.$username.'"';
    $result = $mysql_con->query($query); 
    $row = $result->fetch_assoc();
    return $row['name'];
}

function getEmail($mysql_con, $username)
{
    $query = 'SELECT email FROM users WHERE username="'.$username.'"';
    $result = $mysql_con->query($query); 
    $row = $result->fetch_assoc();
    return $row['email'];
}

function getPhone($mysql_con, $username)
{
    $query = 'SELECT phone FROM users WHERE username="'.$username.'"';
    $result = $mysql_con->query($query); 
    $row = $result->fetch_assoc();
    return $row['phone'];
}
function getAddress($mysql_con, $username)
{
    $query = 'SELECT address FROM users WHERE username="'.$username.'"';
    $result = $mysql_con->query($query); 
    $row = $result->fetch_assoc();
    return $row['address'];
}

function getIdNumber($mysql_con, $username)
{
    $query = 'SELECT idnumber FROM users WHERE username="'.$username.'"';
    if($result = $mysql_con->query($query)){
        if($row = $result->fetch_assoc())
        return $row['idnumber'];
    }
    return '';
}
?>