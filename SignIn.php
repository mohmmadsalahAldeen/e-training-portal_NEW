<?php
ob_start();

session_start();

$pageTitle = 'Page of SingIn';

include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

      $Id         = $_POST['id'];
      $Password   = $_POST['pass'];
      $hashedPass = sha1($Password);

      if(!empty($_POST['id']) && !empty($_POST['pass'])) {

       $stmt  = $conn->prepare("SELECT UserName , Password , Status FROM account WHERE Password = '$Password'");
       $stmt->execute(array($username,$hashedPass));
       $count = $stmt->rowCount();

       $getUser2  = $conn->prepare("SELECT Status FROM account WHERE Password = '$Password'");
       $getUser2->execute(array($sessionUser));
       $info2     = $getUser2->fetch();

       $valStatus =  $info2['Status'];

        if($count > 0) {

            if($Id  >= 100 && $Id  <=199) {
                  if( $valStatus == 1 ) {
                    $_SESSION['Id'] = $Id;
                    header("location:ClassPage.php");
                    exit();
              }
              if( $valStatus == 0 ) {
                  $_SESSION['Id'] = $Id;
                  header("location:interestOfStudent.php");
                  exit();
              }
            }

            if( $Id >= 200 && $Id <=299 ) {
              $_SESSION['Id'] = $Id;
              header("location:Pageofsupervisor.php");
              exit();
            }

            if( $Id >= 800 && $Id <=899 ) {
              $_SESSION['Id'] = $Id;
              header("location:PageOfCompany.php");
              exit();
            }
        }
  }
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
          if(isset($_SESSION['Id'])) {
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
<div class="container" style="margin-top: 1%;">
    <h2 >Login page</h2>
    <ol class="breadcrumb" style="background-color:#191919;">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Login</li>
    </ol>
    <!-- Start login form -->
    <form class="login" action="SignIn.php" method="POST"> 
        <h4 class="text-center">Login</h4>
        <input class="form-control input-lg id astric"       type="id"       name="id"     placeholder="id" required/>
        <input class="form-control input-lg pass astric"     type="password" name="pass"   placeholder="password" minlength = "4" autocomplete="new-password" required/>
        <input class="btn btn-primary btn-block" type="submit"   name="submit" value="Login">
    </form>
    <!-- End login form -->

    <div class="the-errors text-center">
        <?php
          if(!empty($FormErrors)) {
            foreach ($FormErrors as $error) {
                echo $error . '<br>';
            }
          }
        ?>
    </div>

</div>
<!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>
