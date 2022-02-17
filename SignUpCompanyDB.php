<?php
ob_start();

session_start();

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(!empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['nameofagent']) && !empty($_POST['location'])) {

     $NameOfAgentCompany = $_POST['nameofagent'];
     $Location           = $_POST['location'];
     $Email              = $_POST['email'];
     $Address            = $_POST['address'];
     $FiledName          = $_POST['filedname'];

     if ($Email) {
     // insert user
     $insertUserSQL       = "INSERT INTO user (Email, Address) VALUES(:Email, :Address)";
     $insertUserStatement = $conn->prepare($insertUserSQL);
     $insertUserStatement->execute([
       ':Email'   => $Email,
       ':Address' => $Address
     ]);
     // insert company agent
     $insertIdSQL       = "INSERT INTO companyagent (User_ID ,NameOfAgentComp ,Location_1 ,FiledName) VALUES(:User_ID, :NameOfAgentComp ,:Location_1 ,:FiledName)";
     $insertIDStatement = $conn-> prepare($insertIdSQL);
     $lastId = $conn->lastInsertId();
     $insertIDStatement -> execute([
       'User_ID'         => $lastId,
       'NameOfAgentComp' => $NameOfAgentCompany,
       'Location_1'      => $Location,
       'FiledName'       => $FiledName
     ]);

     header("location:index.php");
     exit();
   }
 }
 else {

  header('location:SignUpCompany.php');
  exit();
 }
}

// $FormErrors = array();
     //
     // if(isset($_POST['NameOfAgentCompany'])){
     //
     //      $filterdUser = filter_var($_POST['NameOfAgentCompany'], FILTER_SANITIZE_STRING);
     //
     //      if (strlen($filterdUser) < 10){
     //
     //          $FormErrors[] = 'Username Must Be larger than 10 characters';
     //
     //      }
     //
     // }

     ob_end_flush();
?>
