<?php
    session_start();

    ScopedInclude('headers/header.php',array('includedBy' => __FILE__));
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
// user is logged in
?>
        <div style="min-height:300px;">
		<p> Thank you for logging into our system, <b> <?php
        echo $_SESSION['username'];?> . </b> </p>
        <p> You may now <a href="user_personal.php"> click here </a> to go to your
        own personal information area and update or remove your information should
        you wish to do so. </p>
		</div>
<?php
    } else{
// user is not logged in
?>
        <div style="min-height:300px;">
		<p> You are currently not logged in to our system. Once you log in,
        you will have access to your personal area along with other user
        information. </p>
        <p> If you have already registered, <a href="login.php"> click
        here </a> to log in. Or if you would like to create an account,
        <a href="register.php"> click here </a> to register. </p>
		


		</div>
		
<?php
    }
	include 'headers/asside.html';
    include 'headers/footer.html';
	
?>



<?php		
function ScopedInclude($file, $params = array())
{
    extract($params);
    include $file;
}
?>