<?php
   define("PDO_HOST", "localhost");
   define("PDO_DBBASE", "nwdr0168_dev_tuan");
   define("PDO_USER", "nwdr0168_tuan");
   define("PDO_PW", "LT6NoRu9Z7");
 
 try{
   $connection = new PDO(
   "mysql:host=" . PDO_HOST . ";".
   "dbname=" . PDO_DBBASE, PDO_USER, PDO_PW,
   array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
}
 catch (PDOException $e){
   print "Erreur !: " . $e->getMessage() . "<br/>";
   die();
}
?>