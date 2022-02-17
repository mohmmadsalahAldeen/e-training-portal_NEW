<?php
ob_start();

session_start();

$pageTitle = 'Page of display company';

include 'init.php';

$valSid         = $_SESSION['Id'];
$getInterestStu = $conn->prepare("SELECT FiledName FROM interest WHERE Student_ID = '$valSid'");
$getInterestStu->execute(array($sessionUser));
$info_2 = $getInterestStu->fetch();

$valInfo3         = $info_2['FiledName'];

$getTrainingOppor = $conn->prepare("SELECT compAgent_ID ,NameOfAgentComp ,Location_1  FROM companyagent WHERE FiledName = '$valInfo3'");
$getTrainingOppor->execute(array($sessionUser));
$info             = $getTrainingOppor->fetchAll();

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
  <h1 class="my-4">Available companies </h1>
  <ol class="breadcrumb" style="background-color:#3d3d3d;">
    <li class="breadcrumb-item">
      <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item active">Available companies</li>
  </ol>
  <!-- Start row -->
  <div class="row">
    <?php
    foreach($info as $row) {
        echo '<div class="col-lg-4 mb-4">';
          echo '<div class="card h-100">';
          echo '<h4 class="card-header">' . $row["NameOfAgentComp"] . '</h4>';
            echo '<div class="card-body">';
              echo '<p class="card-text">' . $row["Location_1"] . '</p>';
              echo '<p class="card-text">' . $info_2["FiledName"] . '</p>';
            echo '</div>';
            echo '<div class="card-footer">';
              echo "<a href='PageTrainingRequest.php?compagentid=" . $row['compAgent_ID'] . "' class='btn btn-primary'>Training Request</a>";
            echo '</div>';
          echo '</div>';
        echo '</div>';
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