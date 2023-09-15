<?php

$conn= new mysqli('localhost', 'root', '', 'movies');

if(!$conn){
	die('Connnection Failed'.mysql_connect_error());
}

?>