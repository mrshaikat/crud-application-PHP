
<?php require_once "templates/header.php"; ?>

<h3 class="m-0">Student Add</h3>
<div class="container-fluid page__container">
    <div class="row" style="min-height:500px;">
        <div class="col-lg-12">


		<?php 
		
			if(isset( $_POST['submit'] )){

				$sname = $_POST['sname'];

				$semail = $_POST['semail'];

				$scell = $_POST['scell'];
				$location = $_POST['location'];
				$sphoto = $_FILES['sphoto'];

				$picture_name = $sphoto['name']; 
                   
                $tmp_name = $sphoto['tmp_name'];


				//Picture Management
				$picture_extension_array = explode('.',$picture_name); 

				$picture_extension = end($picture_extension_array);  
				$picture_orginal_extension = strtolower($picture_extension );

				$picture_uniqueName = md5( time().rand()).".".$picture_orginal_extension;


				if( empty($sname) || empty($semail) || empty($scell) || empty($location)){

				   $message = "<p class='alert alert-danger text-center'>Fild Must Not Be Empty!! <button class='close' data-dismiss='alert'>&times;</button> </p>";
				}
				elseif(filter_var($semail, FILTER_VALIDATE_EMAIL) == false){

					$message = "<p class='alert alert-danger text-center'>Email Is Not Valid!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

					
				 }
				 elseif( in_array( $picture_orginal_extension, ['jpg','png','jpeg','gif']) == false  ){

					$message = "<p class='alert alert-danger text-center'>Invalid Image formate !! <button class='close' data-dismiss='alert'>&times;</button> </p>";

				 }
				else{

					$sql = "INSERT INTO student_info(name, email, cell, location, photo, status) VALUES('$sname', '$semail', '$scell', '$location', '$picture_uniqueName','Active') ";

                        $connection -> query($sql);

					move_uploaded_file($tmp_name, 'student_photos/'.$picture_uniqueName);

					$message = "<p class='alert alert-success text-center'>Student Added Successfull <button class='close' data-dismiss='alert'>&times;</button> </p>";

				}

			}
		
		?>

				<div class="addstu_message">
                       <?php

                        if( isset($message) ){

                              echo $message;
                        }
                       
                       ?>
				 </div>
				 
				 

        <div class="addstudent">
		  <div class="card">
			  <div class="card-body">
				  <h2>Add new Student</h2>
				  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
						  <label for="">Student Name</label>
						  <input name="sname" class=" form-control" type="text" value=" <?php if( isset( $_GET['sname'] ) ){
							  echo $_GET['sname'];
						  } ?> ">
					  </div>

                        <div class="form-group">
						  <label for="">Student E-mail</label>
						  <input name="semail" class=" form-control" type="text">
						</div>
						
                        <div class="form-group">
						  <label for="">Student Cell</label>
						  <input name="scell" class=" form-control" type="number">
					  </div>

                                
					  

					  <div class="form-group">
					  <label for="">Student Location</label>
						  <select name="location" id="">
							  <option value="Mirpur">Mirpur</option>
							  <option value="Banani">Banani</option>
							  <option value="Mohakhali">Mohakhali</option>
							  <option value="Uttara">Uttara</option>
							  <option value="Savar">Savar</option>
						  </select>
					  </div>

					  
                                
					  <div class="form-group">

						  <label for="">Profile Picture</label>
						  <input name="sphoto" class="" type="file">

                        </div>
                                

					  <div class="form-group">
						 
						  <input name="submit" class=" btn btn-info btn-block" type="submit" value="Add Student">
                                </div>
                                
                                
				  </form>

			  </div>

			  <div class="card-footer">
					<a class=" card-link" href="index.php">Login Now</a>
			  </div>

		  </div>
	  </div>

            
        </div>
    </div>
</div>

<?php require_once "templates/footer.php"; ?>