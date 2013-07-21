<?php include("login.php"); ?>

<html>

<style type="text/css">
a:link {color:#000000;}    /* unvisited link */
a:visited {color:#000000;} /* visited link */
a:hover {color:#FF0000;}   /* mouse over link */
a:active {color:#0000FF;}  /* selected link */
</style>
	<head>
	
		<title>Red Rocket</title>
					<style>

		body {
			background-color: #e2f0ed;
			background-repeat: repeat;
		}
		</style>
		
		<script type="text/javascript">
			function areyousure() {
				return confirm('Are you sure you want to delete?');			}
		</script>
		
		</head>


	<body>
	
	<center>
			<a href='index.php'>Home</a> &nbsp; | &nbsp;
			<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
			<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
			<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
			<a href='editFiles.php'>Change Information</a>
			<br>
			<br>

	
	<a href="index.php" ><img src="logo.png" alt="some_text" width="300" height="100"/></a>		
		<br>	
		<br>
				<a href="editFiles.php?logout=1">Logout</a>
				<br>

		<div style="width:100%; text-align:center; enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;"">
		 <table align="center" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;">
		 <tr>
					<th>Picture</th>
					<th>Name</th>
					<th>Student Number</th>
					<th>Grade</th>
					<th>House</th>
					<th>Action</th>

				</tr>
	  <?php
	  include 'studfunctions.php';//Include functions (mysql functions)

	   openConnect();
	   
	   if (isset($_POST['delete_student_number'])) {
	   	$queryNum = "DELETE from students WHERE student_number = '".$_POST['delete_student_number']."';"; 
		$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student
	   }
	   
		$queryNum = "Select student_number, name, grade, house, photo_name from students;"; 
		$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student
		
		while ($row = mysql_fetch_array($student_result_num)) {
?>
				<tr>
					<td><img src="<?php echo $row['photo_name']; ?>" width="100px"/></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['student_number']; ?></td>
					<td><?php echo $row['grade']; ?></td>
					<td><?php echo $row['house']; ?></td>
					<td>
						<form action="editStudent.php" method="get">
							<input id="edit_student_number" name="edit_student_number" type="hidden" value="<?php echo $row['student_number']; ?>">
							<input type="submit" value="Edit">
						</form>
						<form method="post" onSubmit="return areyousure();">
							<input id="delete_student_number" name="delete_student_number" type="hidden" value="<?php echo $row['student_number']; ?>">
							<input type="submit" value="Delete">
						</form>
					</td>
				</tr>
<?php
			//This makes a checkbox with the value of the student's number and the name of their actuall name.
		}	
		closeConnect();//Closes MySQL connection
	    
	    ?>
	    </table>
<div>

<?php 

footer();//Insert footer
?>

	</body>

</html>