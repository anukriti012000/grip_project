<?php
   $server="localhost";
   $username="root";
   $password="";
   $dbname="project";

   $conn=mysqli_connect($server,$username,$password,$dbname);
   if($conn)
   {
      // echo "Connection done";
   }
   else
  // echo "Connection failed".mysqli_connect_error();
   ?>
   