<?php
session_start();
$main = 'main.php';
include 'cust.inc.php';
$con = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
die ('Unable to connect. Check your connection parameters.');


// filter incoming values
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
$phone = (isset($_POST['phone'])) ? trim($_POST['phone']) : '';
$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
$address = (isset($_POST['address'])) ? trim($_POST['address']) : '';
$idnumber = (isset($_POST['idnumber'])) ? trim($_POST['idnumber']) : '';
if (!isset($_SESSION['logged']) && !isset($_SESSION['user']) && !isset($_SESSION['username'])) {
    if (isset($_POST['submit']) && $_POST['submit'] == 'Register') {
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
        //mysqli_free_result($result);
        if (empty($password)) {
            $errors[] = 'Password cannot be blank.';
        }
        if (empty($name)) {
            $errors[] = 'name cannot be blank.';
        }
        if (empty($phone)) {
            $errors[] = 'Phone cannot be blank.';
        }
        if (empty($email)) {
            $errors[] = 'Email cannot be blank.';
        }
        if (empty($address)) {
            $errors[] = 'Address cannot be blank';
        }
        if (empty($idnumber)) {
            $errors[] = 'ID Number cannot be blank';
        }
        if (count($errors) > 0) {
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li class="errors" style="display: none;"> ' . $error . ' </li>';
            }
            echo '</ul>';
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
            //Sessions
            $_SESSION['logged'] = 1;
            $_SESSION['username'] = $username;
            $_SESSION['user'] = 'c';
            echo 'all sessions entered';
            header('Refresh: 5; URL=' . $main);
            ?>
            <html>
            <head>
                <title> Register </title>
            </head>
            <body>
            <p>
                <strong>Thank you <?php echo $name; ?> for registering! </strong></p>
            <p> Your registration is complete! You are being sent to the page you
                requested. If your browser doesn't redirect properly after 5 seconds,
                <a href="<?php $main ?>"> click here </a>.</p>
            </body>
            </html>
            <?php
            die();
        }//else
    }//post if
}//session if
else {
    //if already logged in and tries to go to register page redirect user to main page
    header('Location: ' . $main);
}
?>
<?php ScopedInclude('headers/header.php', array('includedBy' => __FILE__)); ?>
<section class="row">
    <section class="col-12">
        <form action="register.php" method="post" id="regForm" name="reg">
            <fieldset>
                <legend>Register Now</legend>
                <table>
                    <tr class="eaccount">
                        <td><label for="username"> Username: </label></td>
                        <td><input type="text" name="username" id="username" size="20"
                                   maxlength="20" value="<?php echo $username; ?>"/></td>
                    </tr>
                    <tr class="eaccount">
                        <td><label for="password"> Password: </label></td>
                        <td><input type="password" name="password" id="password" size="20"
                                   maxlength="20" value="<?php echo $password; ?>"/></td>
                    </tr>
                    <tr class="info">
                        <td><label for="email"> Email: </label></td>
                        <td><input type="text" name="email" id="email" size="20" maxlength="50"
                                   value="<?php echo $email; ?>"/></td>
                    </tr>
                    <tr class="info">
                        <td><label for="name"> Name: </label></td>
                        <td><input type="text" name="name" id="name" size="20"
                                   maxlength="20" value="<?php echo $name; ?>"/></td>
                    </tr>
                    <tr class="info">
                        <td><label for="phone"> Phone: </label></td>
                        <td><input type="text" name="phone" id="phone" size="20"
                                   maxlength="20" value="<?php echo $phone; ?>"/></td>
                    </tr>
                    <tr class="info">
                        <td><label for="address"> Address: </label></td>
                        <td><input type="text" name="address" id="address" size="20" maxlength="20"
                                   value="<?php echo $address; ?>"/></td>
                    </tr>
                    <tr class="info">
                        <td><label for="idnumber"> ID Number: </label></td>
                        <td><input type="text" name="idnumber" id="idnumber" size="20" maxlength="10"
                                   value="<?php echo $idnumber; ?>"/></td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" value="Next" class="info">Next</button>
                        </td>
                        <td>
                            <button type="reset" value="Reset">Reset</button>
                        </td>
                        <td><input type="submit" name="submit" value="Register" class="eaccount"/></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </section>
    <!--section class="col-6">
        <?php //include 'login.php' ?>
    </section-->
</section>

<?php
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

?>