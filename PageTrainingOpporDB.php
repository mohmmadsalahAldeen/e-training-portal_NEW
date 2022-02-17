<?php
ob_start();

session_start();

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
     $valSOpp = $_SESSION['Id'];
     $PlaceOfOppor = $_POST['PlaceOfOppor'] ;
     $OpporType = $_POST['OpporType'] ;

     if(!empty($_POST['PlaceOfOppor']) && !empty($_POST['OpporType'])) {

      $STH    = $conn -> prepare( "SELECT compAgent_ID FROM companyagent WHERE User_ID = '$valSOpp'" );
      $STH -> execute();
      $result = $STH -> fetch();

      // insert trainingopportunity
      $insertIdSQL       = "INSERT INTO trainingopportunity (CompAgent_ID,PlaceOfOpportunity,OpportunityType)VALUES (:CompAgent_ID, :PlaceOfOpportunity,:OpportunityType)";
      $insertIDStatement = $conn-> prepare($insertIdSQL);
      //$lastId = $pd->lastInsertId();
      $insertIDStatement -> execute([
        ':CompAgent_ID'       => $result ["compAgent_ID"],
        ':PlaceOfOpportunity' => $PlaceOfOppor,
        ':OpportunityType'    => $OpporType
      ]);
      header('location:index.php');
      exit();
    }
     header('location:PageTrainingOppor.php');
     exit();
}

ob_end_flush();

?>
