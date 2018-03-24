
<html>
	<head>
		<title>
		   Registration Page
		</title>
		<link rel="stylesheet" href="css/style.css" >
		<style>
	    th {
			border: 1px solid black;
			background-color:cyan;
		}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		<script>
			$(document).ready(function(){
				$("#username,#password").focus(function(){
					$('#table').hide();
					$(this).css({"border-color": "lightgreen", 
					 "border-weight":"1px", 
					 "border-style":"solid"});
				});
				$("#username,#password").blur(function(){
					var user=$('#username').val();
					var pass=$('#password').val();
					if(user=="" )
					{
						$('#username').css({"border-color": "red", 
						 "border-weight":"1px", 
						 "border-style":"solid"});
					}
					if(pass=="" )
					{
						$('#password').css({"border-color": "red", 
						 "border-weight":"1px", 
						 "border-style":"solid"});
					}
				});
				$("#signup_btn").click(function(){
					$('#table').show();
				});
			});
		</script>
	</head>
	
<body style="background-color:orange">
	<div id="main-wrapper">
		<center><h2><b>Login FORM</b></h2>
			<img src ="imgs/avatar.png" class="avatar"/> 
		</center>
	<form class="myform" action="test2.php" method="post">
		<label><b>Username:</b></label><br>
		<input type="text" class="inputvalues" id='username'  name='user_name' placeholder="Type Your Username" required/><br>
		<label><b>Password:<b></label><br>
		<input type="password"class="inputvalues" id="password"   name="password" placeholder="Type your Password" required/><br>
		
		<input type="submit" id="signup_btn" name="signup_btn" value="Submit"/><br><br>
	</form>
	</div>
</body>
<br><br><br><br>
<?php		
	if(isset($_POST["signup_btn"]))
	{

		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "automation2";
		$id="";
		//$password=md5($password);   // 2nd            //note add ' as password    //and  id as '-0||' pass as 1   //and 'or'1'='1
		
			//$con=mysqli_connect("localhost","root","","automation2");
			//mysqli_select_db($con,"automation2");
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$user_name=$_POST["user_name"];
			$password=$_POST["password"];
			$stmt = $conn->prepare("select user_id,login_id from login where login_id=? and password=? and active='1'");
			$stmt->bind_param("ss",$user_name,$password);
		    $stmt->execute();
			$stmt->bind_result($user_id,$login_id);
			if($row = $stmt->fetch())
			{
				if($user_id!=null)
				{	
					echo "<center><table border='1' id='table' width='20%' style='border-color:red;text-align:center;color:black'>";
					echo "<th>User Id</th><th>User Name</th>";
					 do { 
					    echo "<tr><td>" .$user_id. "</td><td>"  .$login_id. '</td></tr>';
					 }while($stmt->fetch());
					echo "</table></center>";
				} 
			}else 
			{
				echo "<center><span style=color:red>0 results</span></senter>";
			}
		
			$stmt->close();
			$conn->close();
			
		
	}
?>