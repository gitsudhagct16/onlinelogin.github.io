<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b><br />Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b><br />Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<label><b><br />StudentID</b></label>
				<input type="text" placeholder="Enter Student ID" name="sid" required>				
				<label><b><br />Name</b></label>
				<input type="text" placeholder="Enter Name" name="name" required>
				<label><b><br />Address</b></label>
				<input type="text"  placeholder="Enter Address" name="address" required>
				<label><b><br />Date of Birth(yyyy-mm-dd)</b></label>
				<input type="text"  placeholder="Enter Date of Birth" name="dob" required>
				<label><b><br />Email</b></label>
				<input type="text"  placeholder="Enter Email Address" name="email" required>
				<label><br /><b>Dept</b></label>				
				<select name="dept" required>
					<option>select any one</option>
  					<option value="IT">IT</option>
					<option value="CSE">CSE</option>
					<option value="ECE">ECE</option>
					<option value="EEE">EEE</option>
				</select>			
				<label><b><br /><br />Contact No</b></label>
				<input type="text" placeholder="Enter Mobile Number" name="cn" required>

<label><br /></label>

				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				<a href="index.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				@$sid=$_POST['sid'];
				@$name=$_POST['name'];
				@$address=$_POST['address'];
				@$dob=$_POST['dob'];
				@$email=$_POST['email'];
				@$dept=$_POST['dept'];
				@$mobile=$_POST['cn'];

				if($password==$cpassword)
				{
					$query = "select * from login where S_ID='$sid'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
				$query = "insert into stud_details values('$sid','$name','$address','$dob','$email','$dept','$mobile')";
				$query1 = "insert into login values('$sid','$username','$password')";
			$query_run = mysqli_query($con,$query);
			$query_run1 = mysqli_query($con,$query1);
							if($query_run && $query_run1)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: homepage.php");
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>
