<?php
session_start();
// Include functions and connect to the database using PDO MySQL

require ('../.Database_Connection/database_connection.php');
//$conn = dbconn();//nama function connection database

$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'shop';
// Include and show the requested page
include __DIR__. '/'. $page . '.php';
?>