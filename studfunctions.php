<?php

function footer(){//Footer function that creates the footer for us
	echo "<center>A Project By <a href='http://www.pbardea.com'>Paul Bardea</a> and Elijah Wong</center>";
}


function openConnect(){//Opens a MySQl connection
	$connect = mysql_connect("localhost", "red_rocketdb", "5439db") or die(mysql_error()); 
	mysql_select_db("red_rocket") or die(mysql_error()); //creates a MySQL connection
}

function closeConnect(){//Closes MySQL connection
	mysql_close(mysql_connect("localhost", "red_rocketdb", "5439db"));//Closes MySQL connection
}

?>