<?php

// host

try{

define("HOST", "localhost");

// db name
define("DBNAME","anime");

// user

define("USER","root");

// pass

define("PASS","");

// make connection

$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER,PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// if($conn == true){
//     echo"db connection is successfully";
// }else{
//     echo "db error";
// }
}catch(PDOException $e){
     echo $e->getMessage();
}
