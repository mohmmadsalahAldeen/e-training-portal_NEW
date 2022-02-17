<?php
ob_start();

session_start();

$pageTitle = 'Page of company';

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
    <div class="container" style="margin-bottom:250px;">
      <h1 class="mt-4 mb-3">Login company
      </h1>
      
      <ol class="breadcrumb" style="background-color:#3d3d3d;">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Login company</li>
      </ol>

      <!-- Start row -->
      <div class="row" style="margin-left:17%;">
        <div class="col-lg-8 mb-4">
          
 <!--        <ul>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ul> -->
          <!-- Start form opportinity -->
          <form action="PageTrainingOppor.php" method="POST">
            <div class="control-group form-group">
              <div class="controls">
                <input type="submit" value="insert training opportinity" class="form-control">
              </div>
            </div>
          </form>
          <!-- End form opportinity -->

          <!-- Start form addvertisment -->
          <form action="AddvertismentPage.php" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <input type="submit" value="insert addvertisment" class="form-control" id="">
              </div>
            </div>
          </form>
          <!-- End form addvertisment -->
          
          <!-- Start form index -->
          <form action="index.php" method="post">
            <button type="submit" style="width:100%;" class="btn btn-primary" id="sendMessageButton">Skip</button>
          </form>
          <!-- End form index -->

        </div>
      </div>
      <!-- End row -->

    </div>
    <!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>
