
<?php

include "header.php";
include "navbar.php";
include "navbar-mobile.php";

?>
<html>
<body>

<br>
<br>
<br>
<br>
<br>

<form action="#" name="apply" onsubmit="return(validate());">

<table cellpadding="2" width="40%"  align="center"
	cellspacing="2">

		<tr>
			<td colspan=2>
				<center><font size=6><b>Apply</b></font></center>
			</td>
		</tr>

		<tr>
			<td><font size=5>Student Name</font></td>
			<td><input type=text name=textnames id="textname" size="30"></td>
		</tr>

		<tr>
			<td><font size=5>Parent Name</font></td>
			<td><input type="text" name="parentname" id="parentname"
			size="30"></td>
		</tr>

		<tr>
			<td><font size=5>Student Grade</font></td>
			<td><input type=text name=textgrade id="textgrade" size="30"></td>
		</tr>

		<tr>
			<td><font size=5>Date of Birthday</font></td>
			<td><input type=date name=textrbr id="textrbr" size="30"></td>
		</tr>


		<tr>
			<td><font size=5>Current Address</font></td>
			<td><input type="text" name="caddress" id="caddress" size="30"></td>
		</tr>


		<tr>
			<td><font size=5>Gender</font></td>
			<td><input type="radio" name="Gender" value="male" size="10">Male
			<input type="radio" name="Gender" value="Female" size="10">Female</td>
		</tr>

		<tr>
		
			<td><font size=5>City</font></td>
			<td>
				<select name="City">
				<option value="-1" selected>select..</option>
				<option value="ramallah">Ramallah</option>
				<option value="jenin">Jenin</option>
				<option value="jerusalem">Jerusalem</option>
				<option value="gaza">Gaza</option>
				</select>
			</td>
		</tr>



		<tr>
			<td><font size=5>Email</font></td>
			<td><input type="text" name="emailid" id="emailid" size="30"></td>
		</tr>



		<tr>
			<td><font size=5>Mobile-No</font></td>
			<td><input type="text" name="mobileno" id="mobileno" size="30"></td>
		</tr>
		<tr>

		<tr>
			<td><font size=5>Student Intrests</font></td>
			<td><select name="Student intrests">
				<option value="-1" selected>select..</option>
				<option value="sport">Ramallah</option>
				<option value="acting">Jenin</option>
				<option value="singing">Jerusalem</option>
				<option value="reading">Gaza</option>
				</select>
			</td>
		</tr>

		<tr>
			<td><font size=5>Payment Details</font></td>
			<td>
				<select name="payment details">
					<option value="-1" selected>select..</option>
					<option value="credit card ">Ramallah</option>
					<option value="paypal">Jenin</option>
					<option value="dircet depoist">Jerusalem</option>

				</select>
			</td>
		</tr>
			
		<td></td>
			<td colspan="2"><input type="submit" value="Submit Form" />&emsp;&emsp;<input type="reset"></td>
		</tr>
	</table>
</form>
<!-- PHP -->
<?php

/* Insert only when we have a post request */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    /* Some Validation */
	$requiredFields = [
		'email' => 'Email is required',
		'password' => 'Password is required',
		'confirm_password' => 'Confirm Password is required',
		'username' => 'Username is required'
	];

	foreach($requiredFields as $key => $message) {
		if (!isset($_POST[$key]) || empty($_POST[$key])) {
			die($message);
		}
	}

	if ($_POST['password'] != $_POST['confirm_password']) {
		die('Confirm password should be the same as password');
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  		die('Invalid email format'); 
	}

	$servername = "localhost";
	/*$username = "c45mm_2018";
	$password = "CbzzF!69";*/
	$dbname = "c45new_test";

	// Create connection
	$conn = new mysqli($servername, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

			echo "Connected successfully";

			
	$id = $_POST ['id'];
	$name = $_POST ['name'];
	$grade_id = $_POST ['grade_id'];
	$section_id = $_POST ['section_id'];
	$email = $_POST['email'];
	$confirmationCode = md5(time());
	$insertPassword = md5($_POST['password']);
	$insertUsername = $_POST['username'];
	$created_date = date('Y-m-d H:i:s');
	$lastupdate = date('Y-m-d H:i:s');

	try {
		$stmt = $conn->prepare("INSERT INTO `student`(`id`, `name`, `grade_id`, `section_id`, `email`, `password`,
		`username`, `created_date`, `lastupdate`) 
		VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])");
		$stmt->bind_param( $name, $grade_id, $email, $password, $username);

		/* execute prepared statement */
		$stmt->execute();

		printf("%d Row inserted.\n", $stmt->affected_rows);

		/* close statement and connection */
		$stmt->close();

	}catch(PDOException $e) {
		echo $e->getMessage();
	}	

	$conn->close();
}

?>

<!-- Footer -->
<?php
include "footer.php";
?>
</body>
</html>