<?php
ob_start();

session_start();

$pageTitle = 'Page of signUp company';

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
    <div class="container" style="margin-top:1%;">
      <h1 class="mt-4 mb-3">Sign Up company page</h1>
      <ol class="breadcrumb" style="background-color:#191919;">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">SignUp company</li>
      </ol>

      <!-- Start row -->
      <div class="row"  style="margin-left:17%;">
        <div class="col-lg-8 mb-4">

          <!-- Start form signup company -->
          <form >
            
            <!-- Start name of agent company -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">Name of agent company :</label>
                <input type="text" class="form-control input-lg nameofagent astric2" name="nameofagent" required>
              </div>
            </div>
            <!-- End name of agent company -->

            <!-- Start location -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">Location :</label>
                <input type="text" class="form-control input-lg location astric2"  name="location" required>
              </div>
            </div>
            <!-- End location -->

            <!-- Start email -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">Email :</label>
                <input type="text" class="form-control input-lg email astric2" name="email" required>
              </div>
            </div>
            <!-- End email -->

            <!-- Start address -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">Address :</label>
                <input type="text" class="form-control input-lg address astric2"  name="address" required>
              </div>
            </div>
            <!-- End address -->

            <!-- Start fieldname -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">FiledName :</label>
                <select class="form-control filedname" name="filedname" style="height:40px;">
                    <option value="None">None</option>
                    <option value="Web_development">Web_development</option>
                    <option value="Android_developer">Android_developer</option>
                    <option value="Cloud_computing">Cloud_computing</option>
                    <option value="Artifical_intelegance">Artifical_intelegance</option>
                    <option value="Quality_assurance">Quality_assurance</option>                    
              </select>
              </div>
            </div>
            <!--End fieldname -->

            <!-- Start submit -->
            <input type="submit" name="submit" value="save" style="width:100%;" class="btn btn-primary btn2">
            <!-- End submit -->

          </form>
          <!-- End form signup company -->
        
        </div>
      </div>
      <!-- End row -->
    </div>
    <!-- End container -->

<?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>