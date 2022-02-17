<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author"      content="">
    <title><?php getTitle(); ?></title>

    <!-- All file css -->
    <link href="vendor/bootstrap/css/bootstrap.min.css"                                             rel="stylesheet">
    <link href="css/modern-business.css"                                                            rel="stylesheet">
    <link href="images/favicon.png" type="image/png" sizes="16x16"                                  rel="icon">
    <link href="css/style.css"                                                                      rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    
    <!-- All file javascript -->
    <script src="plugins/common/common.min.js">               </script>
    <script src="js/custom.min.js">                           </script>
    <script src="js/settings.js">                             </script>
    <script src="js/gleek.js">                                </script>
    <script src="js/styleSwitcher.js">                        </script>
    <!-- <script src="vendor/jquery/jquery.min.js">                </script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jqBootstrapValidation.js">                </script>
    <script src="js/contact_me.js">                           </script>
    <script>
        $(function () {
        // Add asterisk on required field
        $('.astric').each(function () {
            if ($(this).attr('required') === 'required') {
                $(this).after('<span class="asterisk">*</span>');
            }
        });
        });

        $(function () {
        // Add asterisk on required field
        $('.astric2').each(function () {
            if ($(this).attr('required') === 'required') {
                $(this).after('<span class="asterisk2">*</span>');
            }
        });
        });
    </script>

    <script>
      $(function(){
        'use strict';
        //Hide placeholder
        $('[placeholder]').focus(function() {
          $(this).attr('data-text' , $(this).attr('placeholder'));
          $(this).attr('placeholder','');
        }).blur(function() {
          $(this).attr('placeholder',$(this).attr('data-text'));
          });
      });
    </script>
    
    <!-- All function ajax -->
    <script>

        // Change profile page
        $(function() {
          $(".btn1").on("click", function() {
            $.ajax({
              method:"POST",
              url:"PageChangeProfileUpdateDB.php",
              data:{name:$('.name').val(),email:$('.email').val(),oldpassword:$('.oldpassword').val(),newpassword:$('.newpassword').val()},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        });
        
        // Signup page
        $(function() {
          $(".btn2").on("click", function() {
            $.ajax({
              method:"POST",
              url:"SignUpCompanyDB.php",
              data:{nameofagent:$('.nameofagent').val(),location:$('.location').val(),email:$('.email').val(),address:$('.address').val(),filedname:$('.filedname').val()},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        });
        
        // Training Opportinity page
        $(function() {
          $(".btn3").on("click", function() {
            $.ajax({
              method:"POST",
              url:"PageTrainingOpporDB.php",
              data:{PlaceOfOppor:$('.PlaceOfOppor').val(),OpporType:$('.OpporType').val()},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        });
        
        // Addvertisment page
        $(function() {
          $(".btn4").on("click", function() {
            $.ajax({
              method:"POST",
              url:"AddvertismentPageDB.php",
              data:{Title:$('.Title').val(),avatar:$('.avatar').val(),Content:$('.Content').val()},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        });
        
        // Signin page
        $(function() {
          $(".btn5").on("click", function() {
            $.ajax({
              method:"POST",
              url:"SignIn.php",
              data:{id:$('.id').val(),pass:$('.pass').val()},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        });

        // Insert Training Opportinity
        /* $(function() {
          $(".btn6").on("click", function() {
            $.ajax({
              method:"POST",
              url:"PageTrainingOppor.php",
              data:{},
              success: function(data, status, xhr) {
                console.log(data);
                console.log(status);
                console.log(xhr);
              },
              error:function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
              }
            });    
          });
        }); */
    </script>

    <style>
      .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
        }

      .file12 {
              visibility: hidden;
              position: absolute;
          }

      .lang {
          margin-bottom: 10px;
          margin-top: 10px;
          font-family: cursive, sans-serif;
          outline: 0;
          background: #2ecc71;
          color: #fff;
          border: 1px solid crimson;
          padding: 4px;
          border-radius: 9px;
        }

      .form-control {
        position: relative;
        }

      .asterisk {
          font-size: 20px;
          position: relative;
          left: 278px;
          top: -43px;
          color: #D20707;
          }
        .asterisk2 {
          font-size: 20px;
          position: relative;
          left: 95%;
          color: #D20707;
          top: -34px;
        }
      .SpecialBody{
            background-color: #F4F4F4;
          }

      .login {
          width:300px;
          margin: 100px auto;
        }

      .login h4 {
          color:#888;
        }

      .login input {
          margin-bottom: 10px;
        }

      .login .form-control {
          background-color: #EAEAEA;
        }

      .login .btn {
        background-color: #008dde;
      }

    </style>

  </head>
  <body>