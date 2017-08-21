<?php
 $user = "root";

 $pass = "";
 $host = "localhost";
 $dbname = "phpcrud";

   try {
     $db = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
     die("Connect err: ".$e->getMessage());
   }

?>
