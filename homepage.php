<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>


		<center><h3>Welcome <?php
					$query = "select * from stud_details where S_ID IN (select S_ID from login where uname='".$_SESSION['username']."' and pword='".$_SESSION['password']."')";
					$query_run = mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($query_run)){
						echo "".$row["Name"]."";
					}
				?> 
				</h3></center>
				<form action="index.php" method="post">

			<div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
<h2 align="center">STUDENT DETAILS</h2>
<h4><center><?php
$query_run = mysqli_query($con,$query);
while ($row=mysqli_fetch_array($query_run)){

						echo "<table><tr><td>Name:<td>".$row["Name"]."</tr>";
						echo "<tr><td>Address:<td>".$row["Address"]."</tr>";
						echo "<tr><td>Date of Birth:<td>".$row["DOB"]."</tr>";
						echo "<tr><td>Email:<td>".$row["Email"]."</tr>";
						echo "<tr><td>Dept:<td>".$row["Dept"]."</tr>";
						echo "<tr><td>Mobile No:<td>".$row["Contact_No"]."</tr></table>";
					}?> </center></h4>

			</div>
	
			<div class="inner_container">

				<button class="logout_button" type="submit">Log Out</button>
				
	
			</div>
		</form>
	</div>
</body>
</html>
