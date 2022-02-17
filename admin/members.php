<?php

ob_start(); // output buffering start

session_start();

$pageTitle = 'Members';

if (isset($_SESSION['Username'])) {

  include 'init.php';

  $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

  // start manage page

  if($do == 'Manage') { // Manage memers page

    $query = '';

    if (isset($_GET['page']) && $_GET['page'] == 'Pending') {

      $query = 'Status = 0';

    }

    // Select all users except admin

    $stmt = $conn->prepare("SELECT * FROM student");

    // Execute the statement

    $stmt->execute();

    // Assign to variable

    $rows = $stmt->fetchAll();

    if (!empty($rows)) {

  ?>

    <h1 class="text-center">Manage member</h1>
    <div class="container">
      <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
          <tr>
            <td>ID</td>
            <td>FullName</td>
            <td>Age</td>
            <td>SocialStatus</td>
            <td>GPA</td>
            <td>Control</td>
          </tr>
         <?php
            foreach ($rows as $row) {
              echo "<tr>";
                  echo "<td>" . $row['Student_ID']   . "</td>";
                  echo "<td>" . $row['FullName'] . "</td>";
                  echo "<td>" . $row['Age']    . "</td>";
                  echo "<td>" . $row['SocialStatus'] . "</td>";
                  echo "<td>" . $row['GPA']     ."</td>";
                  echo "<td>
                       <a href='members.php?do=Edit&userid=". $row['Student_ID']."' class='btn btn-success'><i class='fa fa-edit'></i>Edit</a>

                       <a href='members.php?do=Delete&userid=". $row['Student_ID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>";

                       if ($row['Status'] == 0) {

                        echo " <a href='members.php?do=Activate&userid=". $row['Student_ID'] ."' class='btn btn-info activate'><i class='fa fa-check'></i>Activate</a>";
                       }
                      echo "</td>";
              echo "</tr>";
            }
         ?>
           <tr>
        </table>
      </div>
       <a href='members.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i>Add new member</a>
    </div>

 <?php  } else {

   echo "<div class='container'>";
       echo "<div class='nice-message'>There\'s no record to show</div>";
       echo "<a href='members.php?do=Add' class='btn btn-primary'>
              <i class='fa fa-plus'></i> Add new member
       </a>";
   echo "</div>";
 } ?>

  <?php } elseif ($do == 'Add') { //Add memebers page ?>

    <h1 class="text-center">Add new Member</h1>
    <div class="container">
      <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">

        <!-- Start Username field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">FullName</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="FullName" class="form-control" required = "required" autocomplete="off" placeholder="FullName to login into shop"/>
          </div>
        </div>
        <!-- End Username field -->
        <!-- Start Age field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Age</label>
          <div class="col-sm-10 col-md-4">
               <input type="password" name="Age" class="password form-control" required = "required" autocomplete="new-password" data-text="leave blank if you dont want to change" placeholder="Age must be hard and & complex" />
               <i class="show-pass fa fa-eye fa-2x"></i>
          </div>
        </div>
        <!-- End Age field -->
        <!-- Start SocialStatus field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">SocialStatus</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="SocialStatus" class="form-control" required = "required" placeholder="SocialStatus must be valid"/>
          </div>
        </div>
        <!-- End SocialStatus field -->
        <!-- Start GPA field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">GPA</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="GPA" class="form-control" required = "required" placeholder="GPA appear in your profile page"/>
          </div>
        </div>
        <!-- End GPA field -->
		
        <!-- Start Submit field -->
        <div class="form-group form-group-lg">
          <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" value="Add member" class="btn btn-primary btn-lg" />
          </div>
        </div>
        <!-- End Submit field -->

      </form>
    </div>

 <?php
    } elseif ($do == 'Insert') {

      // insert member page

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        echo "<h1 class='text-center'>Insert member</h1>";
        echo "<div class='container'>";

        // Get variables from the form

        $FullName      = $_POST['FullName'];
        $Age           = $_POST['Age'];
        $SocialStatus  = $_POST['SocialStatus'];
        $GPA           = $_POST['GPA'];

        //$hashPass = sha1($_POST['password']);

         // Validate the form

         $formErrors = array();

         if (strlen($FullName) < 4) {
           $formErrors[] = '$FullName cant be less than 4 characters';
         }

         if (strlen($FullName) > 20) {
           $formErrors[] = '$FullName cant be more than 20 characters';
         }

         if (empty($FullName)) {
           $formErrors[] = '$FullName cant be empty';
         }

         if (empty($Age)) {
           $formErrors[] = '$Age cant be empty';
         }

         if (empty($FullName)) {
           $formErrors[] = 'Full name cant be empty';
         }

         if (empty($GPA)) {
           $formErrors[] = 'GPA cant be empty';
         }

         // loop into errors array echo interface

         foreach ($formErrors as $error) {
           echo '<div class="alert alert-danger">' . $error . '</div>';
         }
        /*
         // check if there's no errors proceed the update operation

         if (empty($formErrors)) {

           // check if user exist in database

           $check = checkItem("Username", "users", $user);

           if ($check == 1) {

             $theMsg = '<div class="alert alert-danger">sorry this user is exist</div>';

             redirectHome($theMsg,'back');

           } else {

             // Insert userinfo in database

             $stmt = $con->prepare("INSERT INTO users(Username, Password, Email, FullName, Date) VALUES(:zuser, :zpass, :zmail, :zname, now()) ");

             $stmt->execute(array(

               'zuser' => $user,
               'zpass' => $hashPass,
               'zmail' => $email,
               'zname' => $name
             ));

             // echo success message

             $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record inserted</div>';

             redirectHome($theMsg, 'back');

           }

         }
		 */

      } else {

        echo '<div class="container">';

        $theMsg = "<div class='alert alert-danger'>sorry you cant browse this page directly</div>";

        redirectHome($theMsg);

        echo "</div>";

      }

      echo "</div>";

    } elseif ($do == 'Edit') { // Edit page

    //check if get request userid is numeric & get the integer value of It

    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

    // Select all data depend on this ID

    $stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID = '$userid' LIMIT 1");

    // Execute query

    $stmt->execute(array($userid));

    // fetch the data

    $row = $stmt->fetch();

    // The row count

    $count = $stmt->rowCount();

    // if there's such id the form

    if ($count > 0) { ?>

    <h1 class="text-center">Edit Member</h1>

    <div class="container">
      <form class="form-horizontal" action="?do=Update" method="POST">
        <input type="hidden" name="userid" value="<?php echo $userid ?>" />
        <!-- Start Username field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">FullName</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="FullName" class="form-control" value="<?php echo $row['Username'] ?>" autocomplete="off" required="required"/>
          </div>
        </div>
        <!-- End Username field -->
        <!-- Start Age field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Age</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Age" value="<?php echo $row['Age'] ?>" />
          </div>
        </div>
        <!-- End Age field -->
        <!-- Start SocialStatus field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">SocialStatus</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="SocialStatus" class="form-control" value="<?php echo $row['SocialStatus'] ?>" required="required"/>
          </div>
        </div>
        <!-- End SocialStatus field -->
        <!-- Start GPA field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">GPA</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="GPA" class="form-control" value="<?php echo $row['GPA'] ?>" required="required"/>
          </div>
        </div>
        <!-- End GPA field -->
        <!-- Start Submit field -->
        <div class="form-group form-group-lg">
          <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" value="save" class="btn btn-primary btn-lg" />
          </div>
        </div>
        <!-- End Submit field -->
      </form>

    </div>

  <?php

   // if there's no such show error message
    } else {

      echo "<div class='container'>";

      $theMsg = "<div class='alert alert-danger'>Theres no such ID</div>";

      redirectHome($theMsg);

      echo "</div>";

    }

 } elseif ($do == 'Update') { // Update page

  echo "<h1 class='text-center'>Update member</h1>";
  echo "<div class='container'>";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get variables from the form

    $id    = $_POST['userid'];
    /*$user  = $_POST['username'];
    $email = $_POST['email'];
    $name  = $_POST['full']; */

    $FullName      = $_POST['FullName'];
    $Age           = $_POST['Age'];
    $SocialStatus  = $_POST['SocialStatus'];
    $GPA           = $_POST['GPA'];

     // Password trick

     // condition ? true : false

     //$pass = empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : $pass = $_POST['newpassword'];

     // Validate the form

     $formErrors = array();

     if (strlen($FullName) < 4) {
       $formErrors[] = 'FullName cant be less than 4 characters';
     }

     if (strlen($FullName) > 20) {
       $formErrors[] = 'FullName cant be more than 20 characters';
     }

     if (empty($FullName)) {
       $formErrors[] = 'FullName cant be empty';
     }

     if (empty($FullName)) {
       $formErrors[] = 'Full name cant be empty';
     }

     if (empty($Age)) {
       $formErrors[] = 'Age cant be empty';
     }

     // loop into errors array echo interface

     foreach ($formErrors as $error) {
       echo '<div class="alert alert-danger">' . $error . '</div>';
     }

     // check if there's no errors proceed the update operation

     if (empty($formErrors)) {

         $stmt2 = $conn->prepare("SELECT
                                      *
                                 FROM
                                      student
                                 WHERE
                                      FullName   = '$FullName'
                                 AND
                                      Student_ID != '$id'
                                 ");

         $stmt2->execute(array($id, $FullName));

         $count = $stmt2->rowCount();

         if ($count == 1) {

           echo "<div class='alert alert-danger'>Sorry this user is exist</div>";

           redirectHome($theMsg, 'back');

         } else {

            // Update the database with this info

            $stmt = $conn->prepare("UPDATE
                                       student
                                   SET
                                       FullName     = '$FullName' ,
                                       Age          = '$Age',
                                       SocialStatus = '$SocialStatus' ,
                                       GPA          = '$GPA'
                                   WHERE
                                       Student_ID   = '$id'
                                       ");
            $stmt->execute(array($id, $FullName, $Age, $SocialStatus, $GPA));

            // echo success message

            $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

            redirectHome($theMsg, 'back');

         }

     }

  } else {

    $theMsg = "<div class='alert alert-danger'>sorry you can't browse this page directly</div>";

    redirectHome($theMsg);
  }

  echo "</div>";

} elseif ($do == 'Delete') { // Delete member page

  echo "<h1 class='text-center'>Delete member </h1>";
  echo "<div class='container'>";

     //check if get request userid is numeric & get the integer value of It

     $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

     // Select all data depend on this ID

     $check = checkItem('Student_ID', 'student', $userid);

     // if there's such id show the form

     if ($check > 0) {

         $stmt = $conn->prepare("DELETE FROM student WHERE Student_ID = :zuser ");

         $stmt->bindParam(":zuser", $userid);

         $stmt->execute();

         $theMsg = "<div class='alert alert-success'>". $stmt->rowCount() .' Record Deleted</div>';

         redirectHome($theMsg, 'back');

     } else {
       $theMsg = '<div class="alert alert-danger">this is is not exist</div>';

       redirectHome($theMsg);

     }

 echo "</div>";

} elseif ($do == 'Activate') {

     echo "<h1 class='text-center'>Activate member </h1>";
     echo "<div class='container'>";

     //check if get request userid is numeric & get the integer value of It

     $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

     // Select all data depend on this ID

     $check = checkItem('Student_ID', 'student', $userid);

     // if there's such id show the form

     if ($check > 0) {

         $stmt = $conn->prepare("UPDATE student SET Status = 1 WHERE Student_ID = '$userid'");

         $stmt->execute(array($userid));

         $theMsg = "<div class='alert alert-success'>". $stmt->rowCount() .' Record Updated</div>';

         redirectHome($theMsg, 'back');

     } else {
       $theMsg = '<div class="alert alert-danger">this is is not exist</div>';

       redirectHome($theMsg);

     }

 echo "</div>";

}

  include $tpl . 'footer.php';

} else {

  header('Location: index.php');

  exit();
}

ob_end_flush();
?>
