<?php 
include 'studfunctions.php';


$result = array();
if (isset($_REQUEST['searchBox']) && isset($_REQUEST['typeOfSearch'])) {//Check if everything is set
	if ($_REQUEST['typeOfSearch'] == 'house' || $_REQUEST['typeOfSearch'] == 'grade') {//If he is searching by house or grade, then make the query to search the appropriate field to get all that match
		$query = 'select * from students as Student
		LEFT JOIN late as Late ON Student.student_number = Late.student_number
		where Student.'.$_REQUEST['typeOfSearch'].' = \''.$_REQUEST['searchBox'].'\';';
	}
	else if ($_REQUEST['typeOfSearch'] == 'name') {//If you are searching by name, see if the student name is like the text entered in search box.
		$query = 'select * from students as Student
		LEFT JOIN late as Late ON Student.student_number = Late.student_number
		where Student.name LIKE \'%'.$_REQUEST['searchBox'].'%\';';
	}
	else {//Otherwise (search by class) check to see if course code is LIKE what was entered in the field
		$query = 'select * from students as Student 
		LEFT JOIN late as Late ON Student.student_number = Late.student_number 
		LEFT JOIN classes_students as ClassesStudent ON Student.student_number = ClassesStudent.student_number 
		LEFT JOIN classes as Class ON ClassesStudent.course_code = Class.course_code 
		where Class.course_code LIKE \'%'.$_REQUEST['searchBox'].'%\';';
	}

	openConnect();
	$student_result = mysql_query($query) or die(mysql_error()); //get result depending on querry
	
	while ($row = mysql_fetch_array($student_result)) {//Cycles through each row of result
		if (!isset($result[$row['student_number']])) {
			$result[$row['student_number']] = array(//Create an array that has the student info and one that has an array inside of it containing that student's lates.
				'name' => $row['name'],
				'student_number' => $row['student_number'],
				'grade' => $row['grade'],
				'year_born' => $row['year_born'],
				'house' => $row['house'],
				'photo_name' => $row['photo_name'],
				'lates' => array()
			);
		}
		
		$result[$row['student_number']]['lates'][] = array(//Defines the lates array inside the student array, and puts the late information in there
					'day_of_week' => $row['day_of_week'],
					'day_of_month' => $row['day_of_month'],
					'month' => $row['month'],
					'year' => $row['year'],
					'course_code' => $row['course_code']				
				);
		
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
	<style>

body {
	background-color: #e2f0ed;
	background-repeat: repeat;
}
</style>
	</head>
	<center>
	<a href='index.php'>Home</a> &nbsp; | &nbsp;
	<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
	<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
	<a href='addLate.php'>Add Late</a> &nbsp; | &nbsp;
	<a href='editFiles.php'>Change Information</a>
	<br>
	<a href="index.php"><img src="logo.png" alt="some_text" width="300" height="100"/></a>
	<body>
	<center>
		<?php if (empty($result)): //If nobody matches the description given in the search, then just put no result.
				echo "No result";
		 else: //Otherwise iterate through each result, and call it student
			 foreach ($result as $student): //create a student with the info in a table?>
					<table bgcolor="#e3ca66" width="500">
					<tbody>
					<tr>
					<td>
					<img src="<?php if ($student['photo_name'] == "photos/"){ echo "photos/placeholder.jpg";}else{echo $student['photo_name'];}?>" width="250" height="250">
					</td>
					
					<td><b>Student Name:</b><br>
					<?php
						$studentNumberQuery = mysql_query("Select * from students where name = '".$student['name']."';")
						or die(mysql_error()); //Query to find studnum
		
						while($studNum = mysql_fetch_array( $studentNumberQuery )) { 
							$studentNumber = $studNum['student_number'];//Get Student Number
						} 
				
					echo "<a href='profile.php?stdnum=$studentNumber'>".$student['name']."</a> - ";
					echo $studentNumber;
					?><br><br>
					<?php if ($late['course_code']){
						echo "<b>Lates:</b><br>";
				 		foreach ($student['lates'] as $late)://Iterate through each late, print which course it was for and when the student was late.
				          	echo 'Course: '.$late['course_code'].' - '.$late['day_of_week'].', '.$late['month'].' '.$late['day_of_month'].' '.$late['year'].'<br />';

					endforeach; //Also print which classes he was enrolled in.
				}	
				echo "<br /><br />Courses Enrolled in: <br />";
				

				
				$studentClasses = mysql_query("Select * from classes_students where student_number = '".$studentNumber."';")
				or die(mysql_error()); //Get classes the student was enrolled in
		
				while($class = mysql_fetch_array( $studentClasses )) { 
						$courseCode = $class['course_code'];//Print the classes that the student was enrolled in
						echo "<a href='classProfile.php?code=$courseCode'>$courseCode</a><br />";
				} 

				?>
				<br>
				</td>
				</tr>
				</tbody>
				</table>
			<?php endforeach; ?>
		<?php endif; ?>
	</center>
	<div>
<center>
<?php closeConnect();//Close the MySQL connection ?>
<br>
<br>
<br>
<br>
<?php footer();?>
</center>
</body>
</html>
