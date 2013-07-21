<?php 
require_once('studfunctions.php');

//Very similar to createStudent.php

$student = array();
$student_number = '';
if (isset($_POST['student_name'])) {
	//student edited, Save button was pressed
	if ($_FILES['file']['name'] == ""){
		$photo_path = $_POST['original_photo_name'];
	}
	else {
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
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/
	
	    if (file_exists("photos/" . $_FILES["file"]["name"]))//Checks if file already exists on the server.
	      {
	      echo $_FILES["file"]["name"] . " already exists. ";//Prints out that file already exists on the server.
	      }
	    else//Otherwise move it to the server...
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "photos/" . $_FILES["file"]["name"]);
	      //echo "Stored in: " . "photos/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo $_FILES["file"]["type"];//If it doesn't work print out the file type and size...
	  echo $_FILES["file"]["size"];
	  }
	
	$photo_path = "photos/".$_FILES["file"]["name"];//Get the photo path on the server

	}
	
	openConnect();
	$queryNum = "UPDATE students set name='".$_POST['student_name']."', grade='".$_POST['grade']."', house='".$_POST['house']."', photo_name='".$photo_path."', year_born='".$_POST['yearOB']."' where student_number='".$_POST['student_number']."';"; 
	$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student

	closeConnect();//Closes MySQL connection

	$student = $_POST;
	$student['photo_name'] = $photo_path;
	$student['year_born'] = $_POST['yearOB'];
	$student['name'] = $_POST['student_name'];
	$student['house'] = $_POST['house'];
	
	$student_number = $_POST['student_number'];
	
	header('Location: listStudent.php');

}
else if (isset($_GET['edit_student_number'])) {
	$student_number = intval($_GET['edit_student_number']);
	if ($student_number >= 1000 && $student_number <= 9999) {
		openConnect();
	$queryNum = "Select student_number, name, grade, house, photo_name, year_born from students where student_number='".$student_number."' LIMIT 1;"; 
	$student_result_num = mysql_query($queryNum) or die(mysql_error()); //Query that gets the student numbers for each student
		
	while ($row = mysql_fetch_array($student_result_num)) {
		$student = $row;
		}	
		closeConnect();//Closes MySQL connection
	}
}
?>

<html>
<head><!--Simple for to submit a student to the database...-->
	
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
	
	</head>	

	<body>
	<?php if (empty($student)) : ?>
	
		No student specified!
	
	<?php else: ?>
		<center>
	
		<a href='index.php'>Home</a> &nbsp; | &nbsp;
		Add Student &nbsp; | &nbsp;
		<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
		<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
		<a href='editFiles.php'>Change Information</a>
	

		<br><a href="index.php" ><img src="logo.png" alt="some_text" width="300" height="100"/></a>
		<br><br>
	
		<div style="width:100%; text-align:center;">
		<form action="editStudent.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:5px; border-color:red; background-color:#d0c29a;">	
		<input name='student_number' type="hidden" value="<?php echo $student['student_number']; ?>"/>
		<table width="100%" border="0" cellspacing="5">
		  	<tr>
		   			<td>Student Name:  </td>
				    <td><input name='student_name' type="text" size="30" value="<?php echo $student['name']; ?>" /> <br /></td>
	      	</tr>
		  	<tr>
				    <td>Student Grade:</td>
				    <td><select name="grade">
				    <?php $grade_array = array(
				    	"1",
				    	"2",
				    	"3",
				    	"4",
				    	"5",  
				    	"6", 
				    	"7",
				    	"Y1",
				    	"Y2",
				    	"FY",
				    	"IB1",
				    	"IB2",
				    	
				    );
				    foreach ($grade_array as $grade): ?>
			        <option value="<?php echo $grade; ?>" <?php if ($grade==$student['grade']): ?> selected="selected"
				        	<?php endif; ?>><?php echo $grade; ?></option>
			        <?php endforeach; ?>
			        
			        </select> 
			    	<br />
			    	</td>
	      	</tr>
			<tr>
				    <td>
				    	Student Year of Birth
				    </td>
				    <td>
					    <select name="yearOB">
					    <?php for ($i=2012; $i>=1992; $i--): ?> 
				        	<option value="<?php echo $i; ?>" <?php if ($i==$student['year_born']): ?> selected="selected"
				        	<?php endif; ?>><?php echo $i; ?></option>
				        <?php endfor; ?>
				        </select> 
			    		<br />
			    	</td>
		      </tr>
			  <tr>
				    <td>
				    	Student House
				    </td>
				    <td>
				    	<select name="house">
				    <?php $house_array = array(
				    	"Bremners" => "Bremners",
				    	"Howards" => "Howards",
				    	"Jacksons" => "Jacksons",
				    	"Martlands" => "Martlands",
				    	"Orrs" => "Orrs",
				    	"Mowbrays" => "Mowbrays",
				    	"Scaddings" => "Scaddings",
				    	"McHughs" => "McHughs",
				    	"Seatons" => "Seatons",
				    	"Wedds" => "Wedds",
				    	
				    					    					    	
				    );
				    foreach ($house_array as $house_value => $house): ?>
			        <option value="<?php echo $house_value; ?>" <?php if ($house_value==$student['house']): ?> selected="selected"
				        	<?php endif; ?>><?php echo $house; ?></option>
			        <?php endforeach; ?>
			      		</select> 
			      		<br />
			      		</td>
		      		</tr>
		  		<tr>
		    
		    <td>Photo Path</td>
		    
		    	<td>
		    	<input type="hidden" name="original_photo_name" id="original_photo_name" value="<?php echo $student['photo_name']; ?>" >
		    	<img src="<?php echo $student['photo_name']; ?>" width="200px"/>
		    	<br>
		    	<input name="file" type="file" id="file" size="30" /> <br /></td>
	      		</tr>
	      		<br>
	    	</table>
	    	<br>
	    	<br>
				<input type="submit" value="Save"/>
	    
		</form>
		</div>
		
		
		

	<br>
	

<?php endif; ?>

<div>
	<center>
	<br><br><br><br>
<?php footer(); ?>		</center>
</div>
		</body>
</html>="30" /> <br /></td>
	      		</tr>
	      		<br>
	    	</table>
	    	<br>
	    	<br>
				<input type="submit" value="Save"/>
	    
		</form>
		</div>
		
		
		

	<br>
	

<div>
	<center>
	<br><br><br><br>
<?php footer(); ?>		</center>
</div>
		</body>
</html>