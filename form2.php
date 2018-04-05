<!DOCTYPE html>
<html>
<head>
	<title>form 2 </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		
		
			
			<div class="form-box">
				<?php
				session_start();
					if(isset($_SESSION['errors2'])){
						foreach($_SESSION['errors2'] as $key => $value){
							echo "<div> {$value} </div>";
						}
						unset($_SESSION['errors2']);
						
					}
				?>
				<h1 style="width:400px"> continue you info for a job </h1>
				<form action="process2.php" method="">
			<div class="left">
				<label>Name : </label><br>
				<input type="text" name="name"><br>
				<label>title : </label><br>
				<input type="text" name="title"><br>
				<label>description : </label><br>
				<input type="text" name="description"><br>
				<label>country : </label><br>
				<input type="text" name="country"><br>
				<label>Approved : </label><br>
				<input type="text" name="approved"><br>
				<label>available : </label><br>
				<input type="text" name="available">
				
			</div>
			<div class="right">
				<label>gender : </label><br>
				<input type="text" name="gender"><br>
				<label>education  : </label><br>
				<input type="text" name="education"><br>
				<label>salary : </label><br>
				<input type="text" name="salary"><br>
				<label>Experience  : </label><br>
				<input type="text" name="experience"><br>
				<label>more_info : </label><br>
				<input type="text" name="more_info"><br>
				<input type="submit" id="button" name="sign up"">
				


			</div>
			
		</form>
			
		</div>
		

	</div>
</body>
</html>