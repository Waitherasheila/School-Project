<?php

session_start();


	if(!isset($_SESSION['username']))

	{
		header('location:login.php');
	}


	elseif ($_SESSION['usertype']=='student')

	{
		header('location:login.php');
	}


	$host="localhost";
	$user="root";
	$password="";
	$db="frontofficeproject";

	$data=mysqli_connect($host,$user,$password,$db);


	if (isset($_POST['add_course'])) 
	{
		$programme=$_POST['programme'];
		$fee=$_POST['fee'];
		$semester=$_POST['semester'];

		$check="SELECT * FROM course WHERE programme='$programme'";

		$check_course=mysqli_query($data,$check);

		$row_count=mysqli_num_rows($check_course);


		if ($row_count==1) 
		{
			echo "<script type='text/javascript'>

			alert('Course Already Exist. Try Another one'); 
			</script>";
	
			
		}

		else
		{

			$sql="INSERT INTO course(programme,fee,semester) VALUES('$programme','$fee','$semester')";

		$result=mysqli_query($data,$sql);

		if ($result) 
		{
			echo "<script type='text/javascript'>

			alert('Data Upload Success'); 
			</script>";
		}

		else
		{
			echo "Upload Failed";
		}
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

		<style type="text/css">
		
		label
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.div_deg
		{
			background-color: skyblue;
			width: 400px;
			padding-top: 70px;
			padding-bottom: 70px;

		}

	</style>

	<?php

	include 'admin_css.php';

	?>


</head>
<body>

	

	<?php

	include 'admin_sidebar.php';

	?>


<div class="content">

	<center>
		
		<h1>Add Course</h1>

			<div class="div_deg">
			
			<form action="" method="POST">
				
				<div>
					<label>Programme</label>
					<input type="text" name="programme">
				</div>

				<div>
					<label>Fee</label>
					<input type="number" name="fee">
				</div>

				<div>
					<label>Semesters</label>
					<input type="number" name="semester">
				</div>

				<div>
					
					<input type="submit" name="add_course" class="btn btn-primary" value="Add Course">
				</div>

			</form>

		</div>

	</center>	


	</div>



</body>
</html>