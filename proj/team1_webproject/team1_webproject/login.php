<?php
session_start();
ScopedInclude('headers/header.php', array('includedBy' => __FILE__));
include 'pages.inc.php';
include 'conn.inc.php';
$con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
die ('Unable to connect. Check your connection parameters.');
$html='';

// filter incoming values
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

if (!isset($_SESSION['logged']) && !isset($_SESSION['user']) && !isset($_SESSION['username'])) {
    if(count($_POST) > 0){
        $errors = array();
        // make sure manditory fields have been entered
        if (empty($username)) {
            $errors[] = 'Username is not inserted.';
        }
        // check if username already is registered
        elseif(checkUserName($con, $username) === 0) {
            $errors[] = 'Username ' . $username . ' does not exist';
            $username = '';
            $password='';
        }
        elseif(empty($password)) {
            $errors[] = 'Password cannot be blank.';
        }

        elseif(checkPassword($con,$username,$password) < 1){
            $errors[] = 'Password is incorrect';
            $password='';
        }
        
        if (count($errors) > 0) {
            $html.= '<ul class="error" style="background: red; list-style: none; text-align: center;">';
            foreach ($errors as $error) {
                $html.= '<li>' . $error . '</li>';
            }
            $html .= '</ul>';
        } else {
            // No errors so enter the information into the database.
            //set sessions
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $username;
            if(isManager($con, $username) > 0){
                $_SESSION['user'] = 'm';
            }
            elseif(isEscort($con, $username) > 0){
                $_SESSION['user']='e';
            }
            else{
                $_SESSION['user']='c';
                $_SESSION['activated']=checkActivated($con,$username);
            }
            $con->close();
            header('Location: ' . MAIN_PAGE);

            die();
        }//else no errors
    }//post
}//session if
else {
    //if already logged in redirect user to main page
    header('Location: ' . MAIN_PAGE);
}

$html.='<section class="row">';
    $html.='<section class="col-12">';
        $html.='<form action="'.LOGIN_PAGE.'" method="post" id="loginForm">';
            $html.='<fieldset>';
            $html.='<legend>Something went wrong</legend>';
                $html.='<table>';
                    $html.='<tr class="">';
                        $html.='<td><label for="username"> Username: </label></td>';
                        $html.='<td><input type="text" name="username" id="username" size="20" maxlength="20" value="' . $username . '"/></td>';
                    $html.='</tr>';
                    $html.='<tr class="">';
                        $html.='<td><label for="password"> Password: </label></td>';
                        $html.='<td><input type="password" name="password" id="password" size="20" maxlength="20" value="' . $password . '"/></td>     ';
                        $html.='<td><input type="submit" value="Login" name="Login"/></td>';
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

function checkPassword($mysql_con, $username, $password)
{
    $query = 'SELECT * FROM users WHERE username="'.$username.'" AND password="'.$password.'"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function checkActivated($mysql_con, $username)
{
    $query = 'SELECT activated FROM customers INNER JOIN users ON customers.userid=users.userid WHERE username="' . $username . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    $row = $result->fetch_assoc();
    return $row['activated'];
}

function isManager($mysql_con, $username)
{
    $query ='SELECT * FROM managers INNER JOIN users ON users.userid=managers.userid WHERE username="' . $username . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}

function isEscort($mysql_con, $username)
{
    $query ='SELECT * FROM escorts INNER JOIN users ON escorts.userid=users.userid WHERE username="' . $username . '"';
    $result = $mysql_con->query($query) or die(mysql_error());
    return mysqli_num_rows($result);
}



?>