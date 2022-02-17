<?php
ob_start();

session_start();

$pageTitle = 'page of index';

include 'init.php';

$getTrainingOppor = $conn->prepare("SELECT PlaceOfOpportunity , OpportunityType  FROM trainingopportunity ");
$getTrainingOppor->execute(array($sessionUser));
$info = $getTrainingOppor->fetchAll();

$getAddvertisment = $conn->prepare("SELECT Title , Content , Photo   FROM advertisment ");
$getAddvertisment->execute(array($sessionUser));
$info_2           = $getAddvertisment->fetchAll();

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

    <!-- Start header -->
    <header style="margin-top:-10px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('image/image_10.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>

          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('image/index_6.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>

          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('image/index_5.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </header>
    <!-- End header -->

    <!-- Start container -->
    <div class="container">
      <h1 class="my-4">Welcome to eduTraining Portal</h1>
      <ol class="breadcrumb" style="background-color:#3d3d3d;">
        <li class="breadcrumb-item">
            <a href="index.html" style="color:white;">Home</a>
        </li>
      </ol>
      <h2>Training opportinity</h2>

      <!-- Start row -->
      <div class="row">

        <?php
          foreach ($info as $row) {
              echo '<div class="col-lg-4 mb-4">';
                echo '<div class="card h-100">';
                    echo '<h4 class="card-header">'. $row["PlaceOfOpportunity"] .'</h4>';
                    echo '<div class="card-body">';
                      echo '<p class="card-text">'. $row["OpportunityType"] .'</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                      echo '<a href="#" class="btn btn-primary">Learn More</a>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
          }
        ?>

      </div>
      <!-- End row -->

      <h2>Advertisments</h2>

      <!-- Start row -->
      <div class="row">

        <?php
          foreach ($info_2 as $row) {
              echo '<div class="col-lg-4 col-sm-6 portfolio-item">';
                echo '<div class="card h-100">';
                        echo "<img style='width:350px;height:200px;' src=Uploads/avatars/$row[Photo] class='card-img-top' alt='html'>";
                    echo '<div class="card-body">';
                        echo '<h4 class="card-title">' . $row["Title"] . '</h4>';
                        echo '<p class="card-text">' . $row["Content"] . '</p>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
          }
        ?>

      </div>
      <!-- End row -->
      
      <hr>
    </div>
    <!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>
