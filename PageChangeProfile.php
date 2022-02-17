<?php
ob_start();

session_start();

$pageTitle = 'Page of change profile';

include 'init.php';

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
  <h1 class="mt-4 mb-3">change profile</h1>

  <ol class="breadcrumb" style="background-color:#3d3d3d;">
    <li class="breadcrumb-item">
      <a href="index.html" style ="color:silver;">Home</a>
    </li>
    <li class="breadcrumb-item active" style="color:white;">page of change profile </li>
  </ol>

  <?php
    $valSid = $_SESSION['Id'];

    // Select all data depend on this ID
    $stmt   = $conn -> prepare( "SELECT UserName , Email , Password  FROM account  WHERE User_ID = '$valSid' ");
    // Execute query
    $stmt -> execute(array($valSid));
    // Fetch the data
    $row = $stmt -> fetch();
    // The row count
    $count = $stmt->rowCount();
    // If there's such ID show the form
    if( $stmt->rowCount() == 1) {
      ?>

      <!-- Start row -->
      <div class="row"  style="margin-left:17%;">
        <div class="col-lg-8 mb-4">

          <form>

            <input type="hidden" name=$valSid value="<?php echo $valSid ?>" />

            <!-- Start name field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-10 control-label">Name :</label>
                <div class="col-sm-10 col-md-10">
                  <input type="text" name="name" id="name2" class="form-control name" value="<?php echo $row['UserName'] ?>" autocomplete="off" required="required" />
                </div>
            </div>
            <!-- End name field -->

            <!-- Start email field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-10 control-label">Email :</label>
                <div class="col-sm-10 col-md-10">
                    <input type="email" name="email" id="email2" value="<?php echo $row['Email'] ?>" class="form-control email" required="required" />
                </div>
            </div>
            <!-- End email field -->

            <!-- Start password field -->
            <div class="form-group form-group-lg">
              <label class="col-sm-10 control-label">Password :</label>
              <div class="col-sm-10 col-md-10">
                  <input type = "hidden"   name = "oldpassword" class="oldpassword" value="<?php echo $row['Password'] ?>" />
                  <input type = "password" name = "newpassword" class="form-control newpassword" autocomplete="new-password" placeholder="leave blank if you dont want to change" />
              </div>
            </div>
            <!-- End password field -->

            <!-- Start submit -->
            <div class="form-group form-group-lg">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="submit" class="btn btn-primary btn-lg btn1" />
              </div>
            </div>
            <!-- End submit -->
            
          </form>

        </div>
      </div>
      <!-- End row -->

      <?php
          // if there's no such ID show error message
          } else {
            echo "Theres no such ID ";
          }
      ?>
</div>
<!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>