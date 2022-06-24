<?php
 // maakt een connectie met de database 'login'

 $servername = "localhost" ;
 $dbname = "forum" ;
 $username = "root" ;
 $password = "" ;

 try
 {
    $conn = new PDO ("mysql:host=$servername;dbname=$dbname",
                     $username, $password) ;

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
   		//echo "Connectie is gelukt <hr />" ;

 }


 catch(PDOException $e)
 {
     echo "Connectie mislukt: " . $e->getMessage() ;
 }


?>