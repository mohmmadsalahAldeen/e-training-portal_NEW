<?php

ob_start(); // output buffering start

session_start();

if(isset($_SESSION['Username'])) {

  $pageTitle = 'Dashboard';

  include 'init.php' ;

  /* Start Dashboard page */

  $numUsers = 6; // Number of latest users

  $latestUsers = getLatest("*" ,"student" ,"Student_ID" ,$numUsers); // Latest students array

  $numAdvertisment = 6; // number of latest items

  $latestItems = getLatest("*" ,"advertisment" ,"Advertisment_ID" ,$numAdvertisment); // Latest advertisment array

  $numComments = 4; // Number pf comments

  ?>
  <div class="home-stats">
    <div class="container text-center">
      <h1>Dashboard</h1>
        <div class="row">

          <!-- Start student members -->
          <div class="col-md-3">
            <div class="stat st-members">
              <i class="fa fa-users"></i>
                <div class="info">
                  Total Members
                  <span>
                    <a href="members.php"><?php echo countItems('Student_ID', 'student') ?></a>
                  </span>
                </div>
            </div>
          </div>
          <!-- End student members -->

          <!-- Start student Pending Members -->
          <div class="col-md-3">
            <div class="stat st-pending">
              <i class="fa fa-user-plus"></i>
              <div class="info">
                Pending Members
                <span><a href="members.php?do=Manage&page=Pending">
                  <?php echo checkItem("Status", "student", 0) ?>
                </a></span>
              </div>
            </div>
          </div>
          <!-- End student Pending Members -->

          <!-- Start total advertisment -->
          <div class="col-md-3">
            <div class="stat st-items">
              <i class="fa fa-tag"></i>
              <div class="info">
                Total advertisment
                <span><a href="items.php"><?php echo countItems('Advertisment_ID', 'advertisment') ?></a></span>
              </div>
            </div>
          </div>
          <!-- End total advertisment -->
          
          <!-- Start total trainingopportunity -->
          <div class="col-md-3">
            <div class="stat st-comments">
              <i class="fa fa-comments"></i>
              <div class="info">
                  Total trainingopportunity
                  <span>
                    <a href="comments.php"><?php echo countItems('Oppor_ID', 'trainingopportunity') ?></a>
                  </span>
              </div>
            </div>
          </div>
          <!-- End total trainingopportunity -->

        </div>
    </div>
  </div>

  <div class="latest">
    <div class="container">
      
      <!-- Start register user and advertisment -->
      <div class="row">    
        <!-- Start Registerd users -->
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i> Latest <?php  echo $numUsers; ?> Registerd users
              <span class="toggle-info pull-right">
                <i class="fa fa-plus fa-lg"></i>
              </span>
            </div>

            <div class="panel-body">
                <ul class="list-unstyled latest-users">
               <?php
                 if (!empty($latestUsers)) {
                   foreach ($latestUsers as $user) {
                     echo '<li>';
                          echo $user['FullName'];
                          echo '<a href="members.php?do=Edit&userid=' . $user['Student_ID'] . '">';
                                echo '<span class="btn btn-success pull-right">';
                                     echo '<i class="fa fa-edit"></i>Edit';
                                     if ($user['Status'] == 0) {

                                      echo " <a href='members.php?do=Activate&userid=". $user['Student_ID'] ."' class='btn btn-info pull-right activate'><i class='fa fa-check'></i>Activate</a>";

                                     }
                                echo '</span>';
                          echo '</a>';
                     echo '</li>';
                   }
                 } else {
                   echo "There\'s no users to show";
                 }
               ?>
                </ul>
            </div>

          </div>
        </div>
        <!-- End Registerd users -->

        <!-- Start advertisment -->
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-tag"></i> Latest <?php echo $numAdvertisment ?> Advertisment
              <span class="toggle-info pull-right">
                <i class="fa fa-plus fa-lg"></i>
              </span>
            </div>

            <div class="panel-body">
              <ul class="list-unstyled latest-users">
                 <?php
                     if(!empty($latestItems)) {
                         foreach ($latestItems as $item) {
                           echo '<li>';
                                echo $item['Title'];
                                echo '<a href="items.php?do=Edit&itemid=' . $item['Advertisment_ID'] . '">';
                                      echo '<span class="btn btn-success pull-right">';
                                           echo '<i class="fa fa-edit"></i>Edit';
                                           if ($item['approve'] == 0) {
                                            echo " <a href='items.php?do=approve&itemid=". $item['Advertisment_ID'] ."' class='btn btn-info pull-right activate'><i class='fa fa-check'></i>Approve</a>";
                                           }
                                      echo '</span>';
                                echo '</a>';
                           echo '</li>';
                         }
                   } else {
                     echo "There\'s no items to show";
                   }
                 ?>
              </ul>
            </div>
          </div>
        </div>
        <!-- End advertisment -->
      </div>
     <!-- End register user and advertisment -->

     <!-- Start latest comment -->
      <div class="row">
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-comments-o"></i>
              Latest <?php echo $numComments ?>  comments
              <span class="toggle-info pull-right">
                <i class="fa fa-plus fa-lg"></i>
              </span>
            </div>
            <div class="panel-body">
              <?php
                $stmt = $conn->prepare("SELECT
                                            Notes, student.FullName AS Uname
                                       FROM
                                            trainingreqest
                                       INNER JOIN
                                            student
                                       ON
                                            student.Student_ID = trainingreqest.Student_ID
                                       ORDER BY
                                             User_ID DESC
                                       LIMIT
                                            $numComments");
                $stmt->execute();
                $trainingreqest = $stmt->fetchAll();

                if (!empty($trainingreqest)) {
                      foreach ($trainingreqest as $trainingreq) {
                        echo '<div class="comment-box">';
                            echo '<span class="member-n">
                              <a href="members.php?do=Edit&userid=' .$trainingreq['Student_ID'] .'">
                              '. $trainingreq['Uname'] . '</a></span>';
                            echo '<p class="member-c">' . $trainingreq['Notes'] . '</p>';
                        echo '</div>';
                      }

              } else {
                echo "There\'s no comments to show";
              }
              ?>

            </div>
          </div>
        </div>
      </div>
     <!-- End latest comment -->

    </div>
  </div>

  <?php
  /* End Dashboard page */

  include  $tpl . 'footer.php';

} else {

  header('Location: index.php');

  exit();
}

ob_end_flush(); // Release the output
?>
