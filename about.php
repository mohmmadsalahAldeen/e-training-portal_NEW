<?php

session_start();

$pageTitle = 'Page of about';

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

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">About page
    </h1>

    <ol class="breadcrumb" style="background-color:#191919;">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">About</li>
    </ol>

    <!-- Intro Content -->
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" style="width:500px;height:350px;" src="image/aboutPic.jpg" alt="html">
      </div>
      <div class="col-lg-6">

        <h2>About edu training portal</h2>

        <p>We are a group of programmers whose goal is to facilitate the life of society by including applications in
          life to facilitate doing daily work. For example, our application is a platform that provides training materials to
          students in order to empower them and prepare them for the labor market, open their horizons and provide an environment Suitable for them helps in the training process from anywhere, anytime .</p>
     </div>
    </div>
    <!-- /.row -->

    <!-- Team Members -->
    <h2>Our Team</h2>

    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="image/Ourteam1.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Mohmmad alhason</h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
          </div>
          <div class="card-footer">
            <a href="#">mohmmadalhason55555@gmail.com</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="image/Ourteam2.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Taha rabia</h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
          </div>
          <div class="card-footer">
            <a href="#">taharabia55@gmail.com</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="image/Ourteam1.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">ahmad Odah</h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
          </div>
          <div class="card-footer">
            <a href="#">ahmadodah555@gmail.com</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Our Customers -->
    <h2>Our Customers</h2>
    <div class="row">
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer1.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer2.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer3.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer4.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer5.jpg" alt="">
      </div>
      <div class="col-lg-2 col-sm-4 mb-4">
        <img class="img-fluid" src="image/OurCustomer6.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- End container -->

  <?php 
  include $tpl  . 'footer.php';
?>
