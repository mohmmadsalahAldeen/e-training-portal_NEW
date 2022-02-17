<?php

ob_start(); // output buffering start

session_start();

$pageTitle = 'Advertisment';

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

    $stmt = $conn->prepare("SELECT * FROM advertisment");

    // Execute the statement

    $stmt->execute();

    // Assign to variable

    $rows = $stmt->fetchAll();

    if (!empty($rows)) {

  ?>

    <h1 class="text-center">Manage advertisment</h1>
    <div class="container">
      <div class="table-responsive">
        <table class="main-table text-center table table-bordered">
          <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Photo</td>
            <td>Date</td>
            <td>Control</td>
          </tr>
         <?php
            foreach ($rows as $row) {
              echo "<tr>";
                  echo "<td>" . $row['Advertisment_ID']   . "</td>";
                  echo "<td>" . $row['Title'] . "</td>";
                  echo "<td>" . $row['Content']    . "</td>";
                  echo "<td>" . $row['Photo'] . "</td>";
                  echo "<td>" . $row['Date']     ."</td>";
                  echo "<td>
                       <a href='items.php?do=Edit&userid=". $row['Advertisment_ID']."' class='btn btn-success'><i class='fa fa-edit'></i>Edit</a>

                       <a href='items.php?do=Delete&userid=". $row['Advertisment_ID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i>Delete</a>";

                       if ($row['approve'] == 0) {

                        echo " <a href='items.php?do=Activate&userid=". $row['Advertisment_ID'] ."' class='btn btn-info activate'><i class='fa fa-check'></i>Activate</a>";
                       }
                      echo "</td>";
              echo "</tr>";
            }
         ?>
           <tr>
        </table>
      </div>
       <a href='items.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i>Add new member</a>
    </div>

 <?php  } else {

   echo "<div class='container'>";
       echo "<div class='nice-message'>There\'s no record to show</div>";
       echo "<a href='items.php?do=Add' class='btn btn-primary'>
              <i class='fa fa-plus'></i> Add new member
       </a>";
   echo "</div>";
 } ?>

  <?php } elseif ($do == 'Add') { //Add memebers page ?>

    <h1 class="text-center">Add new Member</h1>
    <div class="container">
      <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">

        <!-- Start Title field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Title" class="form-control" required = "required" autocomplete="off" placeholder="Title to login into shop"/>
          </div>
        </div>
        <!-- End Title field -->

        <!-- Start Content field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Content</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Content" class="form-control" required = "required" placeholder="Content must be valid"/>
          </div>
        </div>
        <!-- End Content field -->
        <!-- Start Photo field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Photo</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Photo" class="form-control" required = "required" placeholder="Photo appear in your profile page"/>
          </div>
        </div>
        <!-- End Photo field -->
		    
        <!-- Start Date field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Date</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Date" class="form-control" required = "required" placeholder="Date appear in your profile page"/>
          </div>
        </div>
        <!-- End Date field -->

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

        $Title   = $_POST['Title'];
        $Content = $_POST['Content'];
        $Photo   = $_POST['Photo'];
        $Date    = $_POST['Date'];

        //$hashPass = sha1($_POST['password']);

         // Validate the form

         $formErrors = array();

         if (strlen($Title) < 4) {
           $formErrors[] = 'Title cant be less than 4 characters';
         }

         if (strlen($Title) > 20) {
           $formErrors[] = 'Title cant be more than 20 characters';
         }

         if (empty($Title)) {
           $formErrors[] = 'Title cant be empty';
         }

         if (empty($Content)) {
           $formErrors[] = 'Content cant be empty';
         }

         if (empty($Date)) {
           $formErrors[] = 'Date cant be empty';
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

    $stmt = $conn->prepare("SELECT * FROM advertisment WHERE Advertisment_ID = '$userid' LIMIT 1");

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
        <!-- Start Title field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Title" class="form-control" value="<?php echo $row['Title'] ?>" autocomplete="off" required="required"/>
          </div>
        </div>
        <!-- End Title field -->

        <!-- Start Content field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Content</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Content" value="<?php echo $row['Content'] ?>" />
          </div>
        </div>
        <!-- End Content field -->

        <!-- Start Photo field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Photo</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Photo" class="form-control" value="<?php echo $row['Photo'] ?>" required="required"/>
          </div>
        </div>
        <!-- End Photo field -->

        <!-- Start Date field -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-label">Date</label>
          <div class="col-sm-10 col-md-4">
               <input type="text" name="Date" class="form-control" value="<?php echo $row['Date'] ?>" required="required"/>
          </div>
        </div>
        <!-- End Date field -->

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

    $id      = $_POST['userid'];
    
    $Title   = $_POST['Title'];
    $Content = $_POST['Content'];
    $Photo   = $_POST['Photo'];
    $Date    = $_POST['Date'];

     // Password trick

     // condition ? true : false

     //$pass = empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : $pass = $_POST['newpassword'];

     // Validate the form

     $formErrors = array();

     if (strlen($Title) < 4) {
       $formErrors[] = 'Title cant be less than 4 characters';
     }

     if (strlen($Title) > 20) {
       $formErrors[] = 'Title cant be more than 20 characters';
     }

     if (empty($Title)) {
       $formErrors[] = 'Title cant be empty';
     }

     if (empty($Content)) {
       $formErrors[] = 'Content cant be empty';
     }

     if (empty($Date)) {
       $formErrors[] = 'Date cant be empty';
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
                                      advertisment
                                 WHERE
                                      Title   = '$Title'
                                 AND
                                      Advertisment_ID != '$id'
                                 ");

         $stmt2->execute(array($id, $Title));

         $count = $stmt2->rowCount();

         if ($count == 1) {

           echo "<div class='alert alert-danger'>Sorry this user is exist</div>";

           redirectHome($theMsg, 'back');

         } else {

            // Update the database with this info
          
            $stmt = $conn->prepare("UPDATE
                                       advertisment
                                   SET
                                       Title     = '$Title'  ,
                                       Content   = '$Content',
                                       Photo     = '$Photo'  ,
                                       Date      = '$Date'
                                   WHERE
                                       Advertisment_ID   = '$id'
                                       ");
            $stmt->execute(array($id, $Title, $Content, $Photo, $Date));

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

     $check = checkItem('Advertisment_ID', 'advertisment', $userid);

     // if there's such id show the form

     if ($check > 0) {

         $stmt = $conn->prepare("DELETE FROM advertisment WHERE Advertisment_ID = :zAdvertisment_ID ");

         $stmt->bindParam(":zAdvertisment_ID", $userid);

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

     $check = checkItem('Advertisment_ID', 'advertisment', $userid);

     // if there's such id show the form

     if ($check > 0) {

         $stmt = $conn->prepare("UPDATE advertisment SET approve = 1 WHERE Advertisment_ID = '$userid'");

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
