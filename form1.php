<!DOCTYPE html>
<html>
<head>
	<title>form 1 </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		
		
			
			<div class="form-box">
				<?php
				session_start();
				if(isset($_SESSION['errors'])){
					foreach ($_SESSION['errors'] as $key => $value){
						echo "<div> {$value} </div>";
					}
					unset($_SESSION['errors']);
				}
				?>
				<h1> sign up for a job </h1>
				<form action="process1.php" method="">
			<div class="left">
				<label>First Name : </label><br>
				<input type="text" name="first_name"><br>
				<label>last Name : </label><br>
				<input type="text" name="last_name"><br>
				<label>E-mail : </label><br>
				<input type="text" name="email"><br>
				<label>password : </label><br>
				<input type="password" name="password"><br>
				<label>role : </label><br>
				<input type="text" name="role"><br>
				<label>phone : </label><br>
				<input type="text" name="phone"><br>
				<label> country :</label><br>
				<input type="text" name="country">
			</div>
			<div class="right">
				<label>Date of Birth : </label><br>
				<input type="date" name="dob"><br>
				<label>About : </label><br>
				<input type="text" name="about"><br>
				<label>salary : </label><br>
				<input type="text" name="salary"><br>
				<label>Experience  : </label><br>
				<input type="text" name="experience"><br>
				<label>current_position : </label><br>
				<input type="text" name="current_position"><br>
				<label>Gender : </label><br>
				<input type="text" name="gender"><br>
				<label> upload image:</label><br>
				<input type="file" name="image"><br>
				<input type="submit" id="button" name="send" value="sign up">
				


			</div>
			
		</form>
			
		</div>
		

	</div>
</body>
</html>