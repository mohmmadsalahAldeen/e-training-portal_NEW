<?php 
try
{
$conn = new PDO('mysql:host=localhost;dbname=edutrainingportal', 'root','rootroot');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
 $error = 'Unable to connect to the database server.';
 exit();
}

?>