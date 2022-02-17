<?php
ob_start();

session_start();

$pageTitle = 'Page of training reqest';

include 'init.php';

if(isset($_POST['submit'])) {

  if(!empty($_POST['Note'])) {

     $Note   = $_POST['Note'];
     $valSid = $_SESSION['Id'];

     $STH_2    = $conn -> prepare("SELECT Student_ID FROM student WHERE Student_ID = '$valSid'");
     $STH_2 -> execute();
     $result_2 = $STH_2 -> fetch();

     //Check if get request item is muneric & get its integer value
     $compagentid  = isset($_GET['compagentid']) && is_numeric($_GET['compagentid']) ? intval($_GET['compagentid']) : 0;
     $valAgentcomp = $compagentid;

     $STH    = $conn -> prepare("SELECT compAgent_ID FROM companyagent WHERE compAgent_ID = '$valAgentcomp'");
     $STH -> execute();
     $result = $STH -> fetch();

     // insert trainingopportunity
     $insertIdSQL ="INSERT INTO trainingreqest (Student_ID,CompAgent_ID,EvaluationMark,EvaluationReport,Status,Notes)VALUES (:Student_ID,:CompAgent_ID,:EvaluationMark,:EvaluationReport,:Status,:Notes)";
     $insertIDStatement = $conn -> prepare($insertIdSQL);
     $insertIDStatement -> execute([
        ':Student_ID'       => $result_2 ["Student_ID"],
        ':CompAgent_ID'     => $result ["compAgent_ID"],
        ':EvaluationMark'   => 'null',
        ':EvaluationReport' => 'null',
        ':Status'           => '1',
        ':Notes'            => $Note
      ]);

    header('location:PageTrainingRequestDB.php');
    exit();
  }
  header('location:PageTrainingRequest.php');
  exit();
}

?>
  <!-- Start navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">eduTraining Portal</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <?php
            if(isset($_SESSION['Id'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="LogOut.php">LogOut</a>
          </li>
        <?php
        }
        ?>
          <li class="nav-item">
            <a class="nav-link" href="SignIn.php">Login</a>
          </li>
          <?php
            if(isset($_SESSION['Id'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="email-compose.php">Inbox</a>
          </li>
        <?php
        }
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Accounts
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
              <a class="nav-link dropdown-toggle" href="#" style="color:black;padding-left:23px;" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registration
              </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                    <a class="dropdown-item" href="SignUpCompany.php">SignUp company</a>
                </div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                  <a class="dropdown-item" href="LogOut.php">LogOut</a>
              </div>
            </div>
          </li>
          <?php
            if(isset($_SESSION['Id'])){
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              setting
            </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPages">
                      <a class="dropdown-item" href="PageChangeProfile.php">Change profile</a>
                </div>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End navigation -->

  <!-- Start container -->
  <div class="container" style="margin-bottom:170px;">
    <h1 class="mt-4 mb-3">Training request</h1>
    <ol class="breadcrumb" style="background-color:#3d3d3d;">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Training request</li>
    </ol>
    <!-- Start row -->
    <div class="row" style="margin-left:17%;">
      <div class="col-lg-8 mb-4">
        <form action="" method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label style="font-size:25px;"> Note: </label>
              <textarea name="Note" rows="6" cols="50"></textarea>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary" style="float:right;">Save</button>
        </form>
      </div>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->

 <?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>