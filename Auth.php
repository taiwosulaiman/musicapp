<?php
ob_start();
session_start();
require_once("ResultChecker.php");

$rc = new ResultChecker("localhost", "root", "","ResultChecker");

$sql = "CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname text NOT NULL,
    firstname text NOT NULL,
    othername text NOT NULL,
    phone text NOT NULL,
    email text NOT NULL,
    username text NOT NULL,
    password VARCHAR(50) NOT NULL,
    datecreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
 
  $rc->createTable($sql);
 
?>