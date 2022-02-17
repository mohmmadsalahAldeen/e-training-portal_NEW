<?php
ob_start();

session_start();

include 'connect.php';

if(isset($_SESSION['Id'])) {

  $valOfID = $_SESSION['Id'];
  
   // Update the database with this info
   $stmt = $conn->prepare("UPDATE account SET Status = '1' WHERE User_ID = '$valOfID'");
   $stmt->execute();
 
   //echo $info2["Status"];
   
  $getUser2 = $conn->prepare("SELECT Status FROM account WHERE User_ID = '$valOfID'");
  $getUser2->execute(array($sessionUser));
  $info2    = $getUser2->fetch();

  }

  $valStatus =  $info2['Status'];

  if ($valStatus != 1) {
     header('location:PageTrainingRequest.php');
   }
   else {
      header('location:ClassPage.php');
   }
   ob_end_flush();
?>
