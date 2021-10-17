<?php
//connect.php file code start

$mydb="
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = '')
    )
  )";

  $conn_username = "sysAdmin";
  $conn_password = "system";

  $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,

];

  try{
      $conn = new PDO("oci:dbname=".$mydb, $conn_username, $conn_password, $opt);


  }catch(PDOException $e){
      echo ($e->getMessage());
  }

    $Sql = "SELECT * FROM SELLER WHERE ROWNUM = 1";
    $Statement=$conn->prepare($Sql);
    $Statement->execute();
    $Result=$Statement->fetchAll();

    var_dump($Result);


    

//connect.php file code end
?>
