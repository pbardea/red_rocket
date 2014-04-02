<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'studfunctions.php'; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="/s422.css" type="text/css">
<title>Red Rocket - Student Manager</title>
<style type="text/css">

/* all form DIVs have position property set to relative so we can easily position newly created SPAN */
form div{color: #878787; position:relative;} 

/* setting the width and height of the SELECT element to match the replacing graphics */
select.select{
    position:relative;
    z-index:10;
    width:166px !important;
    height:20px !important;
    line-height:26px;
}

/* dynamically created SPAN, placed below the SELECT */
span.select{
    position:absolute;
    bottom:0;
    float:left;
    left:0;
    width:166px;
    height:26px;
    line-height:26px;
    text-indent:10px;
    background:url(images/bg_select.gif) no-repeat 0 0;
    cursor:default;
    z-index:1;
	}

<!--
body {
	background-color: #e2f0ed;
	background-repeat: repeat;
}
-->
input { font-size: 20px; font:logo, logobloqo2}
select {height:auto; font-size: 25px}
#form1 h1 label {
	font-family: logo, logobloqo2;
.bf_button {  
  display:block; 
  background: url(/web/buttons/20120405_708307/bf_button_fon_right.gif) no-repeat 100%; 
  float: left; 
  outline: none; 
  padding-right: 33px; 
  text-decoration: none; 
 } 

.bf_button:hover {  
  text-decoration: none; 
}

text {
	color: white;
} 

.bf_button span{  
  display:block; 
  background: url(http://elijahwong.com/Project/Files/bf_button_fon_left.gif no-repeat; //download this...
  white-space: nowrap; 
  line-height: 56px; 
  padding: 0 0 0 33px; 
  font-family: Arial, Verdana; 
  font-size: 13px; 
  font-weight: normal;  
  color: rgb(255,255,255);  
  text-transform: uppercase;  
 }
}

</style>
<style type="text/css">
a:link {color:#000000;}    /* unvisited link */
a:visited {color:#000000;} /* visited link */
a:hover {color:#FF0000;}   /* mouse over link */
a:active {color:#0000FF;}  /* selected link */
</style>
</head>

<body>
	<center>
	Home &nbsp; | &nbsp;
	<a href='addStudent.php'>Add Student</a> &nbsp; | &nbsp;
	<a href='addClass.php'>Add Class</a> &nbsp; | &nbsp;
	<a href='addLate.php'>Add Late</a> &nbsp; | &nbsp;
	<a href='editFiles.php'>Change Information</a>
	
	
<h1><img src="logo.png" width="781" height="237" id='logo'/></h1>
<form id="form1" name="form1" method="get" action="search.php">
    <h1>
      <label>SEARCH:
        <input name="searchBox" type="text" id="searchBox" value="" size="85" maxlength="80" textarea style="height:40px"  />
      </label>
      <label>By:
        <select name="typeOfSearch" id="typeOfSearch" style="height:30px" textarea>
          <option value='class'>Class</option>
          <option value='house'>House</option>
          <option value='grade'>Grade</option>
          <option value='name' selected="selected">Name</option>
        </select>
      </label>
    </h1>
    <label>
    
    <input  name="SUBMIT" text="GO" type="image" src="Files/bf_button_fon_left.png" width="400" height="50" span style="cursor:wait">
    
    </form>
    </label>
<p>&nbsp;</p>
</center>

<br>
<br>
<div>
<center>
</center>
</div>
<?php footer() ?>
</body>
</html>

<php string date ( string $format [, int $timestamp = time() ] )>
