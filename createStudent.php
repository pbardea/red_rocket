<?php 
include 'studfunctions.php';


$student_name = $_POST['student_name'];//Gets student name, number, year of birth, house, and grade.
$student_number = $_POST['student_number'];
$yearOB = $_POST['yearOB'];
$house = $_POST['house'];
$grade = $_POST['grade'];

$fileName = "placeholder.jpg";

/*
if ($_FILES['file']['name'] == ""){
	$_FILES['file']['name'] = 'placeholder.jpg';
}

if ((($_FILES["file"]["type"] == "image/gif")//This checks to see if the file is a gif or jpeg and that it is smaller than 1 MB.
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 100000))
  {
  if ($_FILES["file"]["error"] > 0)//Makes sure that there is no error...
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("photos/" . $_FILES["file"]["name"]))//Checks if file already exists on the server.
      {
      echo $_FILES["file"]["name"] . " already exists. ";//Prints out that file already exists on the server.
      }
    else//Otherwise move it to the server...
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "photos/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "photos/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo $_FILES["file"]["type"];//If it doesn't work print out the file type and size...
  echo $_FILES["file"]["size"];
  }
*/
$photo_path = "photos/".$fileName;//Get the photo path on the server

openConnect();

$studentName = mysql_query("INSERT INTO students (name, student_number, grade, year_born, house, photo_name) VALUES ('$student_name', $student_number, '$grade', $yearOB, '$house', '$photo_path');") 
or die(mysql_error());//Adds the student to the database...

closeConnect();

header("Location: index.php");//Redirects to index

?>