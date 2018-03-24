<?php		
	if(isset($_POST["signup_btn"]))
	{

		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "automation2";
		//$password=md5($password);   // 2nd            //note add ' as password    //and  id as '-0||' pass as 1   //and 'or'1'='1
		
			//$con=mysqli_connect("localhost","root","","automation2");
			//mysqli_select_db($con,"automation2");
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$user_name=$_POST["user_name"];
			$password=$_POST["password"];
			$stmt = $conn->prepare("update login set active='1' where login_id=? and password=? and active='0' ");
			$stmt->bind_param("ss",$user_name,$password);
		    $stmt->execute();
			//if ($stmt->num_rows > 0) {
				// output data of each row
				//while($row = $stmt->fetch_assoc()) {
			//		echo "id: " . $row["user_id"]. " - Name: " . $row["login_id"]."<br>";
			//	}
			//} else {
			//	echo "0 results";
			//}
			
			$stmt->close();
			$conn->close();
			
		
	}
?>
<html>
	<head>
		<title>
		   Registration Page
		</title>
		<link rel="stylesheet" href="css/style.css" >
	</head>
<body style="background-color:orange">
	<div id="main-wrapper">
		<center><h2><b>Registration FORM</b></h2>
			<img src ="imgs/avatar.png" class="avatar"/> 
		</center>
	<form class="myform" action="update.php" method="post">
		<label><b>Username:</b></label><br>
		<input type="text" class="inputvalues" id='username'  name='user_name' placeholder="Type Your Username" required/><br>
		<label><b>Password:<b></label><br>
		<input type="text"class="inputvalues" id="password"   name="password" placeholder="Type your Password" required/><br>
		
		<input type="submit" id="signup_btn" name="signup_btn" value="Submit"/><br><br>
	</form>
	</div>
</body>