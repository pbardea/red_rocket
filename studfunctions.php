<?php

$server = "localhost";//server address
$database = "red_rocket";//database name
$user = "userName";//username
$pword = "password";//password


function footer(){//Footer function that creates the footer for us
	echo "<center>A Project By <a href='http://www.pbardea.com'>Paul Bardea</a> and Elijah Wong</center>";
}


function openConnect(){//Opens a MySQl connection
	$connect = mysql_connect($server, $user, $pword) or die(mysql_error()); 
	mysql_select_db($database) or die(mysql_error()); //creates a MySQL connection
}

function closeConnect(){//Closes MySQL connection
	mysql_close(mysql_connect($server, $user, $pword));//Closes MySQL connection
}

?>
