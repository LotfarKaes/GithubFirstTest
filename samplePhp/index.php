<?php
	include 'conn.php';
	session_start();   //A session is started with the session_start() function.

	if(isset($_SESSION['userID'])){

		header('location:home.php');
	}

	if(isset($_POST['log'])){

		$user = $_POST['username'];
		$pass =  $_POST['pass'];

		$sql = "SELECT * FROM user_tbl where username = '$user' and password = '$pass'";
		$result = $conn->query($sql);

		if($result-> num_rows > 0){    //determine number of rows result set 
			while($row= $result->fetch_assoc()){ //Fetch a result row as an associative array
				$_SESSION['userID'] = $row['userID'];
				$_SESSION['username'] = $row['username'];	

		
			}
			?>
			<script> alert('Welcome <?php echo $_SESSION['username']?>'); </script>
<!--                        i create a user name and password in database as a kayes so when i login its create a new session user!!!! -->
			<script>window.location='home.php';</script>
<!--                        //The window.location object can be used to get the current page address (URL) and to redirect the browser to a new page-->
			<?php

		
			}else{
				echo "<center><p style=color:red;>Invalid username or password</p></center>";

		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<form action="index.php" method="POST">
<html>
	<center><p>"admin" as username and "admin" as password</p></ceter>
	<table align="center">
		<tr>
			<td>
				Username:<input type="text" name="username" required>
			</td>
		</tr>

		<tr>
			<td>
				Password:<input type="password" name="pass" required>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="login" name="log">
			</td>
		</tr>
	</table>
</html>
</form>