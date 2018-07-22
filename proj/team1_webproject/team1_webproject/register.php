<?php
session_start();
ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
include 'conn.inc.php';
$con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
die ('Unable to connect. Check your connection parameters.');

$html='';

// filter incoming values
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
$phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
$address = (isset($_POST['address'])) ? trim($_POST['address']) : '';
$idnumber = (isset($_POST['idnumber'])) ? trim($_POST['idnumber']) : '';

if (!isset($_SESSION['logged']) && !isset($_SESSION['user']) && !isset($_SESSION['username'])) {
    if(count($_POST) > 0){
        $errors = array();
        // make sure manditory fields have been entered
        if (empty($username)) {
            $errors[] = 'Username cannot be blank.';
        }
        // check if username already is registered
        if (checkUserName($con, $username) > 0) {
            $errors[] = 'Username ' . $username . ' is already registered.';
            $username = '';
        }
        if (empty($password)) {
            $errors[] = 'Password cannot be blank.';
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
        if (count($errors) > 0) {
            $html.='<ul class="error" style="background: red; list-style: none; text-align: center;">';
            foreach ($errors as $error) {
                $html.='<li> ' . $error . ' </li>';
            }
            $html.='</ul>';
        } else {
            // No errors so enter the information into the database.
            //User entry
            $query = 'INSERT INTO users
        (username, password, name, phone, email, address, idnumber)
        VALUES
        ("' . mysqli_real_escape_string($con, $username) . '", ' .
                '"' . mysqli_real_escape_string($con, $password) . '", ' .
                '"' . mysqli_real_escape_string($con, $name) . '", ' .
                '"' . mysqli_real_escape_string($con, $phone) . '", ' .
                '"' . mysqli_real_escape_string($con, $email) . '", ' .
                '"' . mysqli_real_escape_string($con, $address) . '", ' .
                '"' . mysqli_real_escape_string($con, $idnumber) .
                '")';
            $result = $con->query($query) or die(mysql_error());
            //Customer entry
            $last_id = mysqli_insert_id($con);
            $query = 'INSERT INTO customers (userid) 
        VALUES 
        (' . mysqli_real_escape_string($con, $last_id) . ')';

            $result = $con->query($query) or die(mysql_error());
            mysqli_free_result($result);
            $con->close();
            //Sessions
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $username;
            $_SESSION['user'] = 'c';
            
            header('Refresh: 5; URL=' . MAIN_PAGE);

            $html.='<h1>Thank you ' . $name . ' for registering! </h1>';
            $html.='<p>Your registration is complete! You are being sent to the page you';
            $html.='requested. If your browser doesn\'t redirect properly after 5 seconds,';
            $html.='<a href="' . MAIN_PAGE . '"> click here </a>.</p>';
            echo $html;
            die();
        }//else no errors
    }//post
}//session if
else {
    //if already logged in and tries to go to register page redirect user to main page
    header('Location: ' . MAIN_PAGE);
}

$html.='<section class="row">';
    $html.='<section class="col-12">';
        $html.='<form action="'.REGISTER_PAGE.'" method="post" id="regForm">';
            $html.='<fieldset>';
            $html.='<legend>Register Now</legend>';
                $html.='<table>';
                $html.='<tr class="">';
                        $html.='<td><label for="username"> Username: </label></td>';
                        $html.='<td><input type="text" placeholder="Username Desired..." name="username" id="username" size="20" maxlength="20" value="' . $username . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="">';
                        $html.='<td><label for="password"> Password: </label></td>';
                        $html.='<td><input type="password" placeholder="Password" name="password" id="password" size="20" maxlength="20" value="' . $password . '"/></td>';
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
                    $html.='<td><button type="button" value="Next" class="info">Next</button></td>';
                        $html.='<td><button type="reset" value="Reset">Reset</button></td>';
                        $html.='<td><input type="submit" name="submitt" value="Register"/></td>';
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

function checkUserName($mysql_con, $username)
{
    $query = 'SELECT username FROM users WHERE username = "' . $username . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkIdNumber($mysql_con, $idnumber)
{
    $query = 'SELECT username FROM users WHERE idnumber = "' . $idnumber . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkPhone($mysql_con, $phone)
{
    $query = 'SELECT username FROM users WHERE phone = "' . $phone . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkEmail($mysql_con, $email)
{
    $query = 'SELECT username FROM users WHERE email = "' . $email . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

?>