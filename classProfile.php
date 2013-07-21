<?php
include 'studfunctions.php';

	$code = $_GET['code'];//This gets the class code that is passed in via the link
	openConnect();
	$query = "Select distinct class_name from classes where course_code = '$code';"; 
	$class_name_results = mysql_query($query) or die(mysql_error()); //Queries to get classnames


		while ($row = mysql_fetch_array($class_name_results)) {
			$class_name = $row['class_name'];
		}


	$query = "Select distinct grade_level from classes where course_code = '$code';"; 
	$class_grade_results = mysql_query($query) or die(mysql_error()); //Queries to get grade level

			while ($row = mysql_fetch_array($class_grade_results)) {
				$class_grade = $row['grade_level'];				
			}


?>

<html>
<style type="text/css">
a:link {color:#000000;}    /* unvisited link */
a:visited {color:#000000;} /* visited link */
a:hover {color:#FF0000;}   /* mouse over link */
a:active {color:#0000FF;}  /* selected link */
</style>
	
	<head>
	
		<style>
		body {
			background-color: #e2f0ed;
			background-repeat: repeat;
		}
		</style>
		
	
	</head>	
	<body>
	<center>
		<a href='index.php'>Home</a> &nbsp; | &nbsp;
		<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
		<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
		<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
		<a href='editFiles.php'>Change Information</a>
		<br>
		<a href="index.php"><img src="logo.png" alt="some_text" width="300" height="100"/></a>
		
	
		<center>
	
		<div style="width:100%; text-align:center;">
		<form action="createClass.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;">
		<br>

    <table width="100%" border="0" cellspacing="5">
  <tr>
    <td>Class name:</td>
    <td>
    	<?php 
    
    echo $class_name."<br />";//prints class name
 
    
    	?>
    </td>
  <tr>
  	<td>Class code:</td>
      <td>
    	<?php 
    
    	echo $code;//prints class name
 
    	?>
    </td>
  </tr>
    
  </tr>
  <tr>
    <td> Class Grade level:</td>
    	<td>
    		<?php
    			echo "<a href='gradeProfile.php?grade=$class_grade'>$class_grade</a><br />";//prints grade level
    		?>
    
    	</td>
  </tr>
   <tr>
    <td> <br></td>
    	<td>
  			<br>
    	</td>
  </tr>
  <tr>
    <td> 
    	Student Name
    </td>
	<td>
  		Student Number
	</td>
  </tr>
  <tr>

    	<?php 
    	
	$query = "Select * from classes where course_code = '$code';"; 
	$class_results = mysql_query($query) or die(mysql_error()); //Queries to get all student id numbers for this class
	while ($row = mysql_fetch_array($class_results)) {
		$class_students = $row['student_name'];//Stores student # in classes_students		
		$query = "Select * from students where student_number = '$class_students';"; 
		$student_name_results = mysql_query($query) or die(mysql_error()); //Queries to find their real names (not their numbers)
		while ($student_name = mysql_fetch_array($student_name_results)) {
			$name = $student_name['name'];	
			echo "<td><a href='profile.php?stdnum=$class_students'>".$name."</a>";//Prints real name for each student
			
			echo "</td>";
			echo "<td>";
		 	echo $class_students;//Prints number ID for each student
			echo "</td>";
			echo "  </tr>";
	}	
	}
	?> 
	
  
  

</table>
    
	
		</body>

</center>
<?php closeConnect();//Closes MySQL connection ?>
</html>






