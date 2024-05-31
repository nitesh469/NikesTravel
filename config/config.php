<?php

try{
//host
define('HOST',"localhost");
//dbname
define('DBNAME',"nikestravel");
//username
define('USER',"root");
//password
define('PASS',"");

$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
 if($conn == true){
    echo 'db connectioon is succesfully';
 }
 else{
    echo "db connection is not successfuly";
 }  
*/
}
catch( PDOException $Exception ) {
  echo $Exception-> getMessage();
}

?>