<?php		
	if(isset($_POST["signup_btn"]))
	{

		$user_name=$_POST["user_name"];
	    $password=$_POST["password"];
		$sn="";
		$uid="";
		//$password=md5($password);   // 2nd            //note add ' as password    //and  id as '-0||' pass as 1   //and 'or'1'='1
		
			//$con=mysqli_connect("localhost","root","","automation2");
			//mysqli_select_db($con,"automation2");
			 try
			{
			$db=new PDO("mysql:host=localhost;dbname=automation2;","root","");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e)
			{
				
			}
			$stmt = $db->prepare("select * from login where login_id=? and password=?");
			$stmt->bind_param('ss',$user_name,$password);
		    $stmt->execute(); 
			// $stmt->close();
			
		
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
	<form class="myform" action="test.php" method="post">
		<label><b>Username:</b></label><br>
		<input type="text" class="inputvalues" id='username'  name='user_name' placeholder="Type Your Username" required/><br>
		<label><b>Password:<b></label><br>
		<input type="text"class="inputvalues" id="password"   name="password" placeholder="Type your Password" required/><br>
		
		<input type="submit" id="signup_btn" name="signup_btn" value="Submit"/><br><br>
	</form>
	</div>
</body>