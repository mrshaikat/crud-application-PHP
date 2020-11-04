<?php

      require_once "libs/config.php";
      require_once "libs/function.php";

      if( isset( $_SESSION['fname']) || isset( $_SESSION['uname']) || isset( $_SESSION['email']) ){


            header("location:dashboard.php");
          }
          
      



?>


<!DOCTYPE html>
<html lang="en"
      dir="ltr">


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashoard</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="assets/vendor/perfect-scrollbar.css"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="assets/css/app.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/app.rtl.css"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="assets/css/vendor-material-icons.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-material-icons.rtl.css"
              rel="stylesheet">

        <!-- Font Awesome FREE Icons -->
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-fontawesome-free.rtl.css"
              rel="stylesheet">

           

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id=UA-133433427-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-133433427-1');
        </script>

        <!-- Flatpickr -->
        <link type="text/css"
              href="assets/css/vendor-flatpickr.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-flatpickr.rtl.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-flatpickr-airbnb.css"
              rel="stylesheet">
        <link type="text/css"
              href="assets/css/vendor-flatpickr-airbnb.rtl.css"
              rel="stylesheet">

        <!-- Vector Maps -->
        <link type="text/css"
              href="assets/vendor/jqvmap/jqvmap.min.css"
              rel="stylesheet">

    </head>



    <body class="">


            <?php
    
    
                  if( isset( $_POST['submit'])  ){

                        $unser_mail = $_POST['user_mail'];
                        $pass = $_POST['pass'];

                        if( empty($unser_mail) || empty($pass ) ){

                              $message = "<p class='alert alert-danger text-center'>Fild Must Not Be Empty!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

                        }else{

                              $sql = "SELECT * FROM user_info where email='$unser_mail' OR  uname='$unser_mail' ";
                              $data = $connection -> query($sql);

                              $number = $data -> num_rows ;

                              if( $number == 1 ){
                                    
                                          $user_login_data = $data -> fetch_assoc();

                                          if( password_verify( $pass , $user_login_data['pass'] ) == false ){

                                                $message = "<p class='alert alert-danger text-center'> Incorrect Password!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

                                          }else{

                                                
                                                $_SESSION['pic'] = $user_login_data['photo'];
                                                $_SESSION['fname'] = $user_login_data['fname'];
                                                $_SESSION['uname'] = $user_login_data['uname'];
                                                $_SESSION['email'] = $user_login_data['email'];
                                                $_SESSION['cell'] = $user_login_data['cell'];
                                               
                                                header("location:dashboard.php");

                                          }



                              }else{

                                    $message = "<p class='alert alert-danger text-center'> Wrong Username Or E-mail!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

                              }



                        }

                  }



            ?>
 
                  <div class="message logmess">
                       <?php

                        if( isset($message) ){

                              echo $message;
                        }
                       
                       ?>
                 </div>



	  <div class="login">
		  <div class="card">
			  <div class="card-body">
				  <h2>Login Now</h2>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					  <div class="form-group">
						  <label for="">Username / E-mail</label>
						  <input name="user_mail" class=" form-control" type="text">
					  </div>

					  <div class="form-group">
						  <label for="">Password</label>
						  <input name="pass" class=" form-control" type="password">
					  </div>

					  <div class="form-group">
						 
						  <input name="submit" class=" btn btn-info btn-block" type="submit" value="Login">
					  </div>
				  </form>

			  </div>

			  <div class="card-footer">
					<a class=" card-link" href="registration.php">Create an account</a>
			  </div>

		  </div>
	  </div>
	








































        <!-- jQuery -->
        <script src="assets/vendor/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/vendor/popper.min.js"></script>
        <script src="assets/vendor/bootstrap.min.js"></script>

        <!-- Perfect Scrollbar -->
        <script src="assets/vendor/perfect-scrollbar.min.js"></script>

        <!-- DOM Factory -->
        <script src="assets/vendor/dom-factory.js"></script>

        <!-- MDK -->
        <script src="assets/vendor/material-design-kit.js"></script>

        <!-- App -->
        <script src="assets/js/toggle-check-all.js"></script>
        <script src="assets/js/check-selected-row.js"></script>
        <script src="assets/js/dropdown.js"></script>
        <script src="assets/js/sidebar-mini.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- App Settings (safe to remove) -->
        <script src="assets/js/app-settings.js"></script>

        <!-- Flatpickr -->
        <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
        <script src="assets/js/flatpickr.js"></script>

        <!-- Global Settings -->
        <script src="assets/js/settings.js"></script>

        <!-- Moment.js -->
        <script src="assets/vendor/moment.min.js"></script>
        <script src="assets/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="assets/vendor/Chart.min.js"></script>

        <!-- App Charts JS -->
        <script src="assets/js/charts.js"></script>
        <script src="assets/js/chartjs-rounded-bar.js"></script>

        <!-- Chart Samples -->
        <script src="assets/js/page.dashboard.js"></script>
        <script src="assets/js/progress-charts.js"></script>

        <!-- Vector Maps -->
        <script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="assets/js/vector-maps.js"></script>

    </body>


</html>