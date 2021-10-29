<?php 

 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $dbname ='keshieblog';


 $conn = new MYSQLI($servername, $username, $password, $dbname);

 if($conn->connect_error){
 	die('Database connect error: ' . $conn->connect_error);
 } 


 ?>