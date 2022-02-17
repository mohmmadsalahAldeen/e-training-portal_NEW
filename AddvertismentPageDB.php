<?php
ob_start();

session_start();

include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $valSadd = $_SESSION['Id'];
    $Title   = $_POST['Title'];
    $Content = $_POST['Content'];
    $Photo   = $_POST['avatar'];

    $STH     = $conn -> prepare( "SELECT compAgent_ID FROM companyagent WHERE User_ID = '$valSadd'" );
    $STH -> execute();
    $result  = $STH -> fetch();

    if(!empty($_POST['Title']) && !empty($_POST['Content'])) {

    // Upload Variables
    $avatarName = $_FILES['avatar']['name'];
    $avatarSize = $_FILES['avatar']['size'];
    $avatarTmp  = $_FILES['avatar']['tmp_name'];
    $avatarType = $_FILES['avatar']['type'];

    // List of Allowed File typed to upload
    $avatarAllowedExtension = array("jpeg","jpg","png","gif");

    //Get avatar Extension
    $avatarExtension = strtolower(end(explode('.',$avatarName)));

    if(!in_array($avatarExtension,$avatarAllowedExtension)) {
      echo "This extension is not allowed";
    }
    if($avatarSize > 4194304) {
      echo "Avatar can't be larger than 4MB";
    }

    $avatar = rand(0,100000) . '_' . $avatarName;
    move_uploaded_file($avatarTmp,"Uploads\avatars\\".$avatar);

    // insert Addvertisments
    $insertIdSQL = "INSERT INTO advertisment (CompAgent_ID ,Title ,Content ,Photo ,Date)VALUES (:CompAgent_ID ,:Title ,:Content ,:Photo ,now())";
    $insertIDStatement = $conn-> prepare($insertIdSQL);
    $insertIDStatement -> execute([
     ':CompAgent_ID' => $result ["compAgent_ID"],
     ':Title' => $Title,
     ':Content' => $Content,
     ':Photo' => $avatar
   ]);

    
  }
    header("location:AddvertismentPage.php");
    exit();
}

ob_end_flush();
  ?>
