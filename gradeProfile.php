<?php
include 'studfunctions.php';

	$grade = $_GET['grade'];//This gets the class code that is passed in via the link
	openConnect();

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
		<center>
		<a href='index.php'>Home</a> &nbsp; | &nbsp;
		<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
		<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
		<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
		<a href='editFiles.php'>Change Information</a>
		<br>
		<a href="index.php"><img src="logo.png" alt="some_text" width="300" height="100"/></a>
		
	
	</head>
	
	<body>
	
		<center>
	
		<div style="width:100%; text-align:center;">
		<form action="createClass.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:4px; border-color:red; background-color:#d0c29a;">
		<br>

    <table width="100%" border="0" cellspacing="5">    
  </tr>
  <tr>
    <td> Class Grade level:</td>
    	<td>
    		<?php
    			echo $grade."<br />";//prints grade level
    		?>
    
    	</td>
  </tr>
   <tr>
    <td> <br></td>
    	<td>
  			<br>
    	</td>
  </tr>

    	<?php 
    	
	$query = "Select * from students where grade = '$grade';"; 
	$grade_results = mysql_query($query) or die(mysql_error()); //Queries to get all student id numbers for this class
	while ($row = mysql_fetch_array($grade_results)) {
		$studentName = $row['name'];//Stores student name 
		$studentNumber = $row['student_number'];
		$yearBorn = $row['year_born'];
		
		if ($row['photo_name'] == "photos/"){
			$photoName = "photos/placeholder.jpg";	
		}else{
			$photoName = $row['photo_name'];
		}
		
		echo "<tr>";
		echo "<td>";
		echo "<img src='$photoName' width='250' height='250'>";
		echo "</td>";
		echo "<td>";
		echo "<a href='profile.php?stdnum=$studentNumber'>$studentName</a> - $studentNumber<br />";
		echo "$yearBorn";
		echo "</td></tr>";
	}
	?> 
	
  
  

</table>
    
	
		</body>

</center>
<?php closeConnect(); ?>
</html>






