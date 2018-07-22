<?php

include "header.php";
include "navbar.php";
include "navbar-mobile.php";

?>
<style>
input, select, textarea {
	font-size: 150%;
	}
</style>
	
		<body>
			<div class="container content center padding-64" style="max-width:800px" id="band">
				<form>
					<div>
						<input type="text" name="username" placeholder="Username"><br>
						<input type="password" name="password" placeholder="Password">
					</div>
					<div>
						<button size="30">
							<font size=5>Sign In</font>
						</button>
					</div>
				</form>

			</div>
		</body>
<?php
include "footer.php";
?>