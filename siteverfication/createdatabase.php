<?php

  $servername = "localhost";
  $username = "root";
  $password = "password" ; 
  
  $conn = new mysqli($servername, $username, $password);
  
  // Checking connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
   // Creating database
   $sql = "CREATE DATABASE IF NOT EXISTS studentdb";
   
   if ($conn->query($sql) === TRUE) {
      //
   } else {
     echo "Error creating database: " . $conn->error;
   }
   $conn = new mysqli($servername, $username, $password,'studentdb');
   // creating tables
   $sql_table = "CREATE TABLE IF NOT EXISTS studentdetails (
     StudentName VARCHAR(25) NOT NULL,
     Email VARCHAR(255) NOT NULL UNIQUE,
     Pasword VARCHAR(255) NOT NULL
   )";
   
  if($conn->query($sql_table))
  {
    // echo 'SuccessFull';
  }
  else
  {
    echo 'Table not created' .$conn->error;
  }
   
?>