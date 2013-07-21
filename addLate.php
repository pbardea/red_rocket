<html>
<style type="text/css">
a:link {color:#000000;}    /* unvisited link */
a:visited {color:#000000;} /* visited link */
a:hover {color:#FF0000;}   /* mouse over link */
a:active {color:#0000FF;}  /* selected link */
</style>
<?php include "studfunctions.php"; ?>
	<head>
		
		</head>

	<style>

	body {
		background-color: #e2f0ed;
		background-repeat: repeat;
	}
	</style>
	
		
	<body>
	<title>Red Rocket</title>
			<center>
			<a href='index.php'>Home</a> &nbsp; | &nbsp;
			<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
			<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
			Add Late
			&nbsp; | &nbsp;
	<a href='editFiles.php'>Change Information</a>

			<br>
		
		<a href="index.php"><img src="logo.png" alt="some_text" width="300" height="100"/></a>
	
		<br>
		<br>
		<br>
		
		<div style="width:100%; text-align:center;">
		<form action="createLate.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;">	
	
	  <table width="100%" border="0" cellspacing="5">
	    <tr>
		      <td>Class Late:</td>
		      <td>  <?php
	    openConnect();
		
		$query = "Select distinct course_code from classes;"; 
		$courseCodeResult = mysql_query($query) or die(mysql_error()); //Query that gets the student numbers for each student
				
		echo "<select name='courseCode'>";
		while ($row = mysql_fetch_array($courseCodeResult)) {
			echo "<option value='".$row['course_code']."' />".$row['course_code']."</option><br />";
		}
	
	    
	    ?></td>
	    </tr>
	    <tr>
		      <td>Day of week late:</td>
		      <td><select name="day_of_week">
		      	<option value="Monday">Monday</option>
		      	<option value="Tuesday">Tuesday</option>
		      	<option value="Wednesday">Wednesday</option>
		      	<option value="Thursday">Thursday</option>
		      	<option value="Friday">Friday</option>
		      </select> <br /></td>
	    </tr>
	    <tr>
		      <td>Day Of Month:</td>
		      <td><input type="text" name='day_of_month' /> <br /></td>
	    </tr>
	    <tr>
		      <td>Month:</td>
		      <td><select name="month">
		      	<option value="January">January</option>
		      	<option value="February">February</option>
		      	<option value="March">March</option>
		      	<option value="April">April</option>
		      	<option value="May">May</option>
		      	<option value="June">June</option>
		      	<option value="July">July</option>
		      	<option value="August">August</option>
		      	<option value="September">September</option>
		      	<option value="October">October</option>
		      	<option value="November">November</option>
		      	<option value="December">December</option>
		      </select> <br /></td>
	    </tr>
	    <tr>
		      <td>Year:</td>
		      <?php $curYear = date('Y'); ?>
		      <td><select name="year">
		      	<option value="<?php echo $curYear-1;?>"><?php echo $curYear-1;?></option>
		      	<option value="<?php echo $curYear;?>"><?php echo $curYear;?></option>
		      	<option value="<?php echo $curYear+1;?>"><?php echo $curYear+1;?></option>

		      </select> <br /></td>
	    </tr>

	  </table>
			  
			  Select the students that were late<br />
		  
	  
	  
	  <P ALIGN=Left>
	  <?php
		$queryNum = "Select distinct student_number from students;"; 
		$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student
		$queryName = "Select distinct name from students;"; 
		$student_result_name = mysql_query($queryName) or die(mysql_error()); //Query that gets the student names for each student
		
		while ($row = mysql_fetch_array($student_result_num) and $nameRow = mysql_fetch_array($student_result_name)) {
			echo "<input type='checkbox' name='students[]' value='".$row['student_number']."' />".$nameRow['name']."<br />";
			//This makes a checkbox with the value of the student's number and the name of their actuall name.
		}
	
		closeConnect();	    
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
<?php footer() ?>
	</body>

</html>