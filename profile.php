<?php
include 'studfunctions.php';
$number = $_GET['stdnum'];

openConnect();

$query = "Select * from students where student_number = '$number';"; 
$student_result = mysql_query($query) or die(mysql_error()); 

while ($row = mysql_fetch_array($student_result)) {
	$studentName = $row['name'];
	$studentNumber = $row['student_number'];
	$studentGrade = $row['grade'];
	$studentHouse = $row['house'];
	$yearBorn = $row['year_born'];
	if ($row['photo_name'] == "photos/"){
		$photo_Name = "photos/placeholder.jpg";	
	}else{
		$photo_Name = $row['photo_name'];
	}

}



?>


<html>
	<head>
		<style type="text/css">
		a:link {color:#000000;}    /* unvisited link */
		a:visited {color:#000000;} /* visited link */
		a:hover {color:#FF0000;}   /* mouse over link */
		a:active {color:#0000FF;}  /* selected link */
		</style>
		<style type="text/css">
	
			element {}
	
		</style>
	
	<title>R3D R0CK3T</title>
		<style>
	
		body 
			{
				background-color: #e2f0ed;
				background-repeat: repeat;
			}
		</style>
		<center>
	
		<a href='index.php'>Home</a> &nbsp; | &nbsp;
		<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
		<a href='addClass.php'>Add Class</a>&nbsp; | &nbsp;
		<a href='addLate.php'>Add Late</a> &nbsp; | &nbsp;
	 	<a href='editFiles.php'>Change Information</a>
		
	
	
	</head>	

	<body>
		<br><a href="index.php" target="_blank"><img src="logo.png" alt="some_text" width="300" height="100"/></a>
		<br><br>
		
			<div style="width:100%; text-align:center;">
		<form action="createStudent.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:5px; border-color:red; background-color:#d0c29a;">	
	
				<table bgcolor="#e3ca66" width="500">
					<tbody>
						<tr>
							<td>
								<img src="<?php echo $photo_Name; ?>" width="250" height="250">
							</td>
							<td>
								<b>
									Student Name:
									<?php echo $studentName; ?>
								</b>
								<br>
									<?php echo "$studentNumber - <a href='gradeProfile.php?grade=$studentGrade'>$studentGrade</a>, $studentHouse"; ?>
								<br>
									<br>
										<b>
											Lates:</b><br />
											<?php
											$query = "Select * from late where student_number = '$studentNumber';"; 
											$late_result = mysql_query($query) or die(mysql_error()); 
											
											while ($rowLate = mysql_fetch_array($late_result)) {
												$courseCode = $rowLate['course_code'];
												$day_of_week = $rowLate['day_of_week'];
												$day_of_month = $rowLate['day_of_month'];
												$month = $rowLate['month'];
												$year = $rowLate['year'];
												
												echo "<a href='classProfile.php?code=$courseCode'>$courseCode</a> - $day_of_week $month $day_of_month $year<br />";

											}
											
											?>
									<br>
							</td>
						</tr>
					</tbody>
				</table>
	

	</div>
</body>
<?php closeConnect();
?>
</html>