<?php
ob_start();

session_start();

$pageTitle = 'Page of display video';

include 'init.php';

// Session value
$valsession = $_SESSION['Id'];

$getFiledName = $conn->prepare("SELECT FiledName FROM interest WHERE Student_ID = '$valsession'");
$getFiledName->execute();
$info_2       = $getFiledName->fetch();

//Check if get request item is muneric & get its integer value
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$valId = $userid;

$getUser = $conn->prepare("SELECT User_ID, FullName FROM student WHERE User_ID = '$valId'");
$getUser->execute();
$info = $getUser->fetch();

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
  <div class="container">
      <h1 class="mt-4 mb-3">Display video</h1>
      <ol class="breadcrumb" style="background-color:#191919;">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Class Page</li>
      </ol>
        <div>
            <div style="height:80px;width:1000px;">
                <?php echo '<h1 style ="color:#4cb4dc;">' .$info_2["FiledName"]. '</h1>' ?>
            </div>
            <br />
            <iframe width="560" height="315" src="https://www.youtube.com/embed/y881t8ilMyc" frameborder="0" allowfullscreen></iframe>
            </iframe>
        </div>
  </div>
  <!-- End container -->

<?php 
  include $tpl  . 'footer.php';
  ob_end_flush();
?>