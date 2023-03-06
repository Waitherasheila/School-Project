<?php

session_start();
error_reporting(0);


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

	if($_GET['course_id'])
	{
		$t_id=$_GET['course_id'];

		$sql="SELECT * FROM course WHERE id='$t_id' ";

		$result=mysqli_query($data,$sql);

		$info=$result->fetch_assoc();
	}

	if (isset($_POST['update_course'])) 
	{
	

		$t_programme=$_POST['programme'];

		$t_fee=$_POST['fee'];

		$t_semester=$_POST['semester'];


		$query="UPDATE user SET programme='$t_programme',fee='$t_fee',semester='$t_semester'WHERE id='$t_id'";

		$result2=mysqli_query($data,$query);


		if ($result2) 
		{
			header("location:admin_view_course.php");
		}
		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<?php

	include 'admin_css.php';

	?>


	<style type="text/css">
		
		label
		{
			display: inline-block;
			width: 150px;
			text-align: right;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.div_deg
		{
			background-color: skyblue;
			width: 600px;
			padding-top: 70px;
			padding-bottom: 70px;
		}
	</style>


</head>
<body>

	

	<?php

	include 'admin_sidebar.php';

	?>


<div class="content">

	<center>
		
		<h1>Update Course Data</h1>

		<div class="div_deg">

			<form action="#" method="POST">

			<div>
				<label>Programme</label>
				<input type="text" name="programme" 
				value="<?php echo "{$info['programme']}" ?>">
			</div>

			<div>
				<label>Fee</label>
				<input type="number" name="fee" 
				value="<?php echo "{$info['fee']}" ?>">
			</div>

			<div>
				<label>Semester</label>
				<input type="text" name="semester" 
				value="<?php echo "{$info['semester']}" ?>">
			</div>

			<div>
				
				<input type="submit" name="update_course" class="btn btn-success">
			</div>
		</form>
	</div>
		</center>


	</div>



</body>
</html>