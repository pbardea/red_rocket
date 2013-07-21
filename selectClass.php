<!doctype html>
<head>
<title>Select Class</title>
</head>

<body>
<?php
include 'studfunctions.php';

openConnect();


?>
<form action = "viewInfo.php" method="post">
	<select name="className">
        <?php
        $groupNames = mysql_query("SELECT DISTINCT class FROM classes") 
        or die(mysql_error()); 
        
        while($info = mysql_fetch_array( $groupNames )) { 
                echo "<option value='".$info['class']."'>".$info['class']."</option> <br />";
        } 
        closeConnect();
		?>
    </select>
	<input type="submit" value="GO!" />
</form>
</body>

</html>
