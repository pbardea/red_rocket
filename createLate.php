<?php
include 'studfunctions.php';

openConnect();
$courseCode = $_POST['courseCode'];//Gets class name, course code and grade level from addClass.php
$day_of_month = $_POST['day_of_month'];
$day_of_week = $_POST['day_of_week'];
$month = $_POST['month'];
$year = $_POST['year'];

$students = $_POST['students'];//Gets student names of students that were late

$N = count($students);//Counts the amount of students signed up

for($i=0; $i < $N; $i++)//Simple for loop that we use to itereate through each student that sign up.
{
  //echo $students[$i];
  //The student number is now refered to as $students[$i]
  $addLate = mysql_query("INSERT INTO late (student_number, day_of_week, day_of_month, month, year, course_code) VALUES ('$students[$i]', '$day_of_week', '$day_of_month', '$month', '$year', '$courseCode');") 
  or die(mysql_error()); //This adds the class info
}
 closeConnect(); 
header('Location: index.php');//Redirects to index.php
?>