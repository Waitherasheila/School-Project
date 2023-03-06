<?php

error_reporting(0);
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

	$sql="SELECT * FROM course";

	$result=mysqli_query($data,$sql);

	if ($_GET['course_id']) 
	{
		$t_id=$_GET['course_id'];

		$sql2="DELETE FROM course WHERE id='$t_id' ";

		$result2=mysqli_query($data,$sql2);

		if ($result2)
		{
			header('location:admin_view_course.php');
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
		
		.table_th
		{
			padding: 20px;
			font-size: 20px;
		}

		
		.table_td

		{
			padding: 20px;
			background-color: skyblue;
		}

		
	</style>


</head>
<body>

	

	<?php

	include 'admin_sidebar.php';

	?>


<div class="content">
	
	<center>
		
		<h1>View Courses</h1>

	
		<br><br>


		<table border="1px">
			<tr>
				<th class="table_th">Programme</th>
				<th class="table_th">Fee</th>
				<th class="table_th">Semesters</th>
				<th class="table_th">Delete</th>
				<th class="table_th">Update</th>
			</tr>


			<?php

			while($info=$result-> fetch_assoc())

			{

			?>


			<tr>
				
				<td class="table_td"> 
					<?php echo "{$info['programme']}"; ?> 
				</td>

				<td class="table_td"> 
					<?php echo "{$info['fee']}"; ?> 
				</td>

				<td class="table_td"> 
					<?php echo "{$info['semester']}"; ?> 
				</td>

				<td class="table_td"> 

					<?php

					echo "<a onClick=\" javascript:return confirm('Are You Sure to Delete this');\" class='btn btn-danger' href='delete.php?course_id={$info['id']}'> Delete </a>"; 

					?>

				</td>

				<td class="table_td"> 
					<?php echo "<a class='btn btn-primary' href='admin_update_course.php?course_id={$info['id']}'> Update</a>"; ?> 
				</td>

			</tr>

			<?php

			}

			?>
		</table>

	</center>



	</div>



</body>
</html>