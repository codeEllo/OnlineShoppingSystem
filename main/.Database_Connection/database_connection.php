<?php
//connect.php file code start
date_default_timezone_set('Asia/Kuala_Lumpur');
$mydb="
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = '')
    )
  )";

  $conn_username = "SysAdmin";
  $conn_password = "system";

  $opt = [
      PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array

  ];

  try{
      $conn = new PDO("oci:dbname=".$mydb, $conn_username, $conn_password, $opt);


  }catch(PDOException $e){
      echo ($e->getMessage());  
  }


    

//connect.php file code end
?>
