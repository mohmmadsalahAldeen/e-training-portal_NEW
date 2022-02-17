<html>
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
  
  </head>
  <body>
    <?php
    ob_start();

    session_start();

    try {
    $conn = new PDO('mysql:host=localhost;dbname=edutrainingportal', 'root','rootroot');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e) {
    $error = 'Unable to connect to the database server.';
    exit();
    }

    echo "<h1 style = 'text-align: center;'>"  . " Update pages " .  "</h1>";
    echo "<div class='container'>";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $valSid = $_SESSION['Id'];

        //Get variables from the form
        $Name  = $_POST['name'];
        $Email = $_POST['email'];
      
        // Password Trick
        $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

        // validate the form
        $formErrors = array();
        if (strlen($Name) < 4) {
          $formErrors[] = '<div class="alert alert-danger">Username Cant be less than <strong> 4 characters</strong></div>';
        }
        if (strlen($Name) > 20 ) {
          $formErrors[] = '<div class="alert alert-danger">Username Cant be greater than <strong> 20 characters </strong></div>';
        }
        if (empty($Name)) {
          $formErrors[] = '<div class="alert alert-danger">Username Cant be <strong> empty </strong> </div>';
        }
        if (empty($Email)) {
          $formErrors[] = '<div class="alert alert-danger">Email Cant be <strong> empty </strong> </div>';
        }

        // loop into errors array and echo it
        foreach ($formErrors as $error) {
          echo $error ;
        }

        // Check if there's no error proceed the update operation
        if (empty($formErrors)) {

          // Update the database with this info into table account
          $stmt = $conn->prepare("UPDATE account SET UserName = '$Name' , Email = '$Email' , Password = '$pass'  WHERE User_ID = '$valSid' ");
          $stmt->execute(array($Name,$Email,$pass));
          
          // Update the database with this info into table user
          $stmt2 = $conn->prepare("UPDATE user SET FullName = '$Name' , Email = '$Email'  WHERE User_ID = '$valSid' ");
          $stmt2->execute(array($Name,$Email));
          
          // Update the database with this info into table student
          $stmt3 = $conn->prepare("UPDATE student SET FullName = '$Name' WHERE User_ID = '$valSid' ");
          $stmt3->execute(array($Name));

          header('location:PageChangeProfile.php');
          exit();
        }
        } else {
          echo "sorry you can't browse this page directly";
        }
    echo "</div>";

    ob_end_flush();
    ?>
  </body>
</html>
