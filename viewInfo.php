<?php
include 'studfunctions.php';

$class = $_POST['className'];

openConnect();

$studentName = mysql_query("Select * from classes where class_name = '$class'") 
or die(mysql_error()); 

while($info = mysql_fetch_array( $studentName )) { 
		$student_name = $info['student_name'];
 		echo $student_name."<br />";
		
		$studentInfo = mysql_query("Select * from students where name = '$student_name'") 
		or die(mysql_error()); 
		
		while($info4Student = mysql_fetch_array( $studentInfo )) { 
				$house = $info4Student['house'];
				$grade = $info4Student['grade'];
				echo $house.", ".$grade."<br /><br />";
		} 
		
} 

closeConnect();

?>