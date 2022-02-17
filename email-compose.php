<?php
ob_start();

session_start();

$pageTitle = 'Page of email compose';

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

   <div class="container" style="margin-top:5%;">
     <h1 class="mt-4 mb-3">Inbox page</h1>

     <ol class="breadcrumb" style="background-color:#191919;">
       <li class="breadcrumb-item">
         <a href="index.html">Home</a>
       </li>
       <li class="breadcrumb-item active">Inbox</li>
     </ol>
   </div>


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="margin-right: 16%;">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="email-left-box">
                                  <a href="email-compose.html" class="btn btn-primary btn-block">Compose</a>
                                    <div class="mail-list mt-4">
                                      <a href="email-inbox.html" class="list-group-item border-0 text-primary p-r-0"><i class="fa fa-inbox font-18 align-middle mr-2"></i>
                                        <b>Inbox</b> <span class="badge badge-primary badge-sm float-right m-t-5">198</span> </a>
                                    </div>
                                </div>
                                <div class="email-right-box">

                                    <div class="compose-content mt-5">
                                        <form action="#">

                                          <div class="form-group">
                                              <!--<label for="to" class="col-sm-1 control-label">Course:</label>-->
                                              <div>
                                                              <select name="" class="form-control bg-transparent">
                                                                 <option value="Supervisor">Supervisor</option>
                                                                 <option value="Student" selected>Student</option>
                                                                 <option value="Company">Company</option>
                                                             </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent" placeholder=" To">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent" placeholder=" Title">
                                            </div>

                                            <div class="form-group">
                                                <textarea class="textarea_editor form-control bg-light" rows="15" placeholder="Content ..."></textarea>
                                            </div>
                                        </form>

                                        <h5 class="m-b-20"><i class="fa fa-paperclip m-r-5 f-s-18"></i> Attatchment</h5>
                                        <form action="#" class="dropzone">
                                            <div class="form-group">
                                                <div class="fallback">
                                                    <input class="l-border-1" name="file" type="file" multiple="multiple">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="text-left m-t-15">
                                        <button class="btn btn-primary m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button">
                                          <i class="fa fa-paper-plane m-r-5"></i> Send</button>
                                        <button class="btn btn-dark m-b-30 m-t-15 f-s-14 p-l-20 p-r-20" type="button"><i class="ti-close m-r-5 f-s-12"></i> Discard</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020 - 2021</p>
          </div>
          <!-- /.container -->
        </footer>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <?php 
  include $tpl  . 'footer.php';

  ob_end_flush();
?>