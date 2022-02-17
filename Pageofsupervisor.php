<?php
ob_start();

session_start();

$pageTitle = 'Page of supervisor';

include 'init.php';

if (isset($_SESSION['Id'])) {

  $valId   = $_SESSION['Id'];
  $getUser = $conn->prepare("SELECT User_ID, FullName ,Age ,GPA FROM student WHERE Supervisor_ID = '$valId'");
  $getUser->execute();
  $info    = $getUser->fetchAll();

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
  <div class="container">
    <h1 class="mt-4 mb-3">page of supervisor</h1>
    <ol class="breadcrumb" style="background-color:#3d3d3d;">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">people</li>
    </ol>

    <!-- Start row -->
    <div class="row">
        <?php              
          foreach($info as $row) {
            echo "<div class='col-sm-6 col-md-3' style='background-color:#9c94cc;margin:5px;'>";
            echo "<div class='thumbnail item-box'>";
                echo "<span class='price-tag' style='color:black;'>" ."USER ID : ". $row['User_ID'] . "</span>";
                echo "<img class='img-responsive' src='img.png' alt='' />";
                echo "<div class='caption'>";
                    echo "<h3><a href='ClassPage.php?userid=" . $row['User_ID'] . "' style='color:black;'>"."NAME : ". $row['FullName'] ."</a></h3>";
                    echo "<p style='color:black;'>" ."GPA : ". $row['GPA'] . "</p>";
                    echo "<div class='date' style='color:black;'>" ."AGE : ". $row['Age'] . "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
          }
        ?>
    </div>
    <!-- End row -->
  </div>
  <!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>
