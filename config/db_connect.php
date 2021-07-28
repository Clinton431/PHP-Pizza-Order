<?php 
// Mysqli or PDO connect to the database
$conn = mysqli_connect('localhost', 'clinton', 'clin1234', 'ninja_pitzar');
// check connection 

if(!$conn){
    echo 'Connection error:' .mysqli_connect_error(); 
} 

?>