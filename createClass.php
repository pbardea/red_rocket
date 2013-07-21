<?php

include 'studfunctions.php';

openConnect();


$class_name = $_POST['class_name'];//Gets class name, course code and grade level from addClass.php
$course_code = $_POST['course_code'];
$grade_level = $_POST['grade_level'];

$students = $_POST['students'];//Gets student names of students in class.

$N = count($students);//Counts the amount of students signed up
for($i=0; $i < $N; $i++)//Simple for loop that we use to itereate through each student that sign up.
{
  //echo $students[$i];
  //The student name is now refered to as $students[$i]
  $addToClasses = mysql_query("INSERT INTO classes (class_name, course_code, grade_level, student_name) VALUES ('$class_name', '$course_code', '$grade_level', '$students[$i]');") 
  or die(mysql_error()); //This adds the class info
  $addToClassesStudetns = mysql_query("INSERT INTO classes_students (course_code, student_number) VALUES ('$course_code', '$students[$i]');") 
  or die(mysql_error()); //This adds the students to the class

}
closeConnect();
header('Location: index.php');//Redirects to index.php
?>