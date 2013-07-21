<html>
<style type="text/css">
a:link {color:#000000;}    /* unvisited link */
a:visited {color:#000000;} /* visited link */
a:hover {color:#FF0000;}   /* mouse over link */
a:active {color:#0000FF;}  /* selected link */
</style>
<?php include 'studfunctions.php'; ?>
	<head><!--Simple for to submit a student to the database...-->
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
	<center>
	
		<a href='index.php'>Home</a> &nbsp; | &nbsp;
		Add Student &nbsp; | &nbsp;
		<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
		<a href='addLate.php'>Add Late</a>&nbsp; | &nbsp;
		<a href='editFiles.php'>Change Information</a>
	

		<br><a href="index.php" ><img src="logo.png" alt="some_text" width="300" height="100"/></a>
		<br><br>
	
		<div style="width:100%; text-align:center;">
		<form action="createStudent.php" method="post" enctype="multipart/form-data" style="padding:10px; display:inline-block; border-style:solid; border-width:5px; border-color:red; background-color:#d0c29a;">	
	
		<table width="100%" border="0" cellspacing="5">
		  	<tr>
		   			<td>Student Name:  </td>
				    <td><input name='student_name' type="text" size="30" /> <br /></td>
	      	</tr>
		  	<tr>
		    		<td>Student Number:</td>
		    		<td><input name='student_number' type="text" size="30" maxlength="4" /> <br /></td>
	     	</tr>
		  	<tr>
				    <td>Student Grade:</td>
				    <td><select name="grade">
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
			    	<br />
			    	</td>
	      	</tr>
			<tr>
				    <td>
				    	Student Year of Birth
				    </td>
				    <td>
					    <select name="yearOB">
				        <option value="2006">2012</option>
				        <option value="2006">2011</option>
				        <option value="2006">2010</option>
				        <option value="2006">2009</option>
				        <option value="2006">2008</option>
				        <option value="2006">2007</option>
				        <option value="2006">2006</option>
				        <option value="2005">2005</option>
				        <option value="2004">2004</option>
				        <option value="2003">2003</option>
				        <option value="2002">2002</option>
				        <option value="2001">2001</option>
				        <option value="2000">2000</option>
				        <option value="1999">1999</option>
				        <option value="1998">1998</option>
				        <option value="1997">1997</option>
				        <option value="1996">1996</option>
				        <option value="1995">1995</option>
				        <option value="1994">1994</option>
				        <option value="1993">1993</option>
				        <option value="1992">1992</option>
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
					        <option value="Bremner's">Bremners</option>
					        <option value="Howard's">Howards</option>
					        <option value="Jackson's">Jackson's</option>
					        <option value="Martlnad's">Martlands</option>
					        <option value="Orrs">Orrs</option>
					        <option value="Mowbray's">Mowbrays</option>
					        <option value="Scadding's">Scaddings</option>
					        <option value="McHughs">McHughs</option>
					        <option value="Seatons">Seatons</option>
					        <option value="Wedds">Wedds</option>
			      		</select> 
			      		<br />
			      		</td>
		      		</tr>

	    	</table>
	    	<br>
	    	<br>
				<input type="submit" value="Submit"/>
	    
		</form>
		</div>
		
		
		

	<br>
	<div>
	<center>
	<br><br><br><br>
<?php footer(); ?>		</center>
</div>
		</body>
		</center>
</html>