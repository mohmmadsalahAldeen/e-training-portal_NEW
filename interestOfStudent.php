<?php
ob_start();

session_start();

$pageTitle = 'index page';

include 'init.php';

if(isset($_POST['submit']))
{
     $valSid             = $_SESSION['Id'];
     $FieldName          = $_POST['FiledName'] ;
     $NameOfTheSpecialty = $_POST['NameOfTheSpecialty'];

     $stmt   = $conn -> prepare("SELECT Student_ID FROM student WHERE Student_ID ='$valSid'");
     $stmt-> execute(array($sessionUser));
     $result = $stmt -> fetch();

    // insert trainingopportunity
      $insertIdSQL = "INSERT INTO interest(Student_ID ,FiledName ,NameOfTheSpecially) VALUES(:Student_ID ,:FiledName ,:NameOfTheSpecially)";
      $insertIDStatement = $conn->prepare($insertIdSQL);
      $insertIDStatement -> execute([
        'Student_ID'         => $result ["Student_ID"],
        'FiledName'          => $FieldName,
        'NameOfTheSpecially' => $NameOfTheSpecialty
      ]);

       //Check if get request item is muneric & get its integer value
       //$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
       header('location:displaycompany.php');
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
    <div class="container" style="margin-bottom:170px;">

      <h1 class="mt-4 mb-3"><?php echo $result['Student_ID']; ?></h1>
      <ol class="breadcrumb" style="background-color:#191919;">
        <li class="breadcrumb-item">
            <a href="index.html" style="color:silver;">Home</a>
        </li>
        <li class="breadcrumb-item active" style="color:white;">Interest of student</li>
      </ol>

      <!-- Start row -->
      <div class="row"  style="margin-left:17%;">
        <div class="col-lg-8 mb-4">
          <form action="" method="post">
            <!-- Start name of the speciality -->
            <div class="control-group form-group">
              <div class="controls">
                <label>Name of the specialty :</label>
                <input type="text" name="NameOfTheSpecialty" class="form-control">
              </div>
            </div>
            <!-- End name of the speciality -->
            
            <!-- Start field name -->
            <div class="control-group form-group">
              <div class="controls">
                <label style="color:black;">FiledName:</label>
                <select class="form-control" name="FiledName" style="height:40px;">
                    <option value="None">None</option>
                    <option value="Web_development">Web_development</option>
                    <option value="Android_developer">Android_developer</option>
                    <option value="Cloud_computing">Cloud_computing</option>
                    <option value="Artifical_intelegance">Artifical_intelegance</option>
                    <option value="Quality_assurance">Quality_assurance</option>                    
              </select>
              </div>
            </div>
            <!-- Start field name -->
            <button type="submit" name="submit" style="width:100%;margin-bottom:3%;" class="btn btn-primary">Save</button>
          </form>

          <form action="displaycompany.php?userid=' . $result['Student_ID'] . '" method="post">
            <button type="submit" name="submit" style="width:100%;" class="btn btn-primary">Skip</button>
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
