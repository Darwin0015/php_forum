<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
		<form action="register.php" method="POST">
		 Username: <input type="text" name="username">
		 <br>Password: <input type="password" name="password">
		 <br>Confirm Passsword: <input type="password" name="password2">
		<br>Email: <input type="text" name="email">
		<br><input type="submit" name="submit" value="Register"> or <a href="login.php">Login</a>
		</form>
</body>
</html>

<?php
require("connect.php");
$username = @$_POST['username'];
$password = @$_POST['password'];
$password2 =@$_POST['password2'];
$email = @$_POST['email'];



if(isset($_POST['submit'])){
	if ($username && $password && $password2 && $email) {
		if(strlen ($username) >= 5 && strlen ($username) < 25 && strlen ($password) >= 6){
			if($password2 == $password){

			if($query = mysql_query("INSERT INTO users (`id`,`username`,`password`,`email`)VALUES ('','".$username."', '".$password."', '".$email."')"))
				echo "You have sucessfully  registered as $username, Click <a href='login.php'>here</a to login";

			}else{
				echo "Password do not match";
			}

		}else{
			if(strlen ($username) < 5 || strlen ($username) > 25){
				echo "Useranme must be between 5 and 25 characters";
			}
			if(strlen ($password) <6 ){
				echo "<br>Password must be longer than 5 character";
			}
		}

	}else{
		echo "<br>Please fill all blank";
	}







	






}

?>