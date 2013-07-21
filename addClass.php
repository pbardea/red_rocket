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
				</head>


	<body>
	<center>
			<a href='index.php'>Home</a> &nbsp; | &nbsp;
			<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
			Add Class &nbsp; | &nbsp;
			<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
			<a href='editFiles.php'>Change Information</a>
			<br>
			<a href="index.php" ><img src="logo.png" alt="some_text" width="300" height="100"/></a>		

		<br>
		<br>
		<br>
		
		<div style="width:100%; text-align:center;">
		<form action="createClass.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;">	
	
	  <table width="100%" border="0" cellspacing="5">
	    <tr>
		      <td>Class Name:</td>
		      <td> <input type="text" name='class_name' /> <br /></td>
	    </tr>
	    <tr>
		      <td>Course Code:</td>
		      <td><input type="text" name='course_code' /> <br /></td>
	    </tr>
	    <tr>
		      <td>Grade Level:</td>
		      <td>	  
			      <select name='grade_level'>
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				    <option value="6">6</option>
				    <option value="7">7</option>
				    <option value="Y1">Y1</option>
				    <option value="Y2">Y2</option>
				    <option value="FY">FY</option>
				    <option value="IB1">IB1</option>
				    <option value="IB2">IB2</option>
			      </select> 
				  <br/>
				  <br/>
			  </td>
	    </tr>
	  </table>
			  
			  Select the students you want in the class.<br />
		  
	  
	  
	  <P ALIGN=Left>
	  <?php
	  include 'studfunctions.php';

	   openConnect();
		$queryNum = "Select distinct student_number, name from students;"; 
		$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student
		
		while ($row = mysql_fetch_array($student_result_num)) {
			echo "<input type='checkbox' name='students[]' value='".$row['student_number']."' />".$row['name']."<br />";
			//This makes a checkbox with the value of the student's number and the name of their actuall name.
		}
	
		closeConnect();//Closes MySQL connection
	    
	    ?>
	    <center>
			  <br>
			  <input type="submit" value="Submit"/>
			  </center>
	  </p>
	</form>
	</center>
	<br>
<br>
<br>
<div>

<?php 

footer();
?>

	</body>

</html>
