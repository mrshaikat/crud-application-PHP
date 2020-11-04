<?php require_once ("templates/header.php"); ?>


                             


                                    <?php 

                                            if( $_GET['student_id'] ){
                                                $student_id = $_GET['student_id'];

                                                if( isset( $_POST['submit'] ) ){
                                                    $status =  $_POST['status'];
                                                    $u_name =  $_POST['u_name'];
                                                    $u_mail =  $_POST['u_mail'];
                                                    $u_cell =  $_POST['u_cell'];
                                                    $u_location =  $_POST['u_location'];
            
                                                    $sql ="UPDATE student_info SET status='$status', name='$u_name', email='$u_mail', cell = '$u_cell', location='$u_location' where student_id='$student_id' ";
                                                    $connection -> query($sql);
                                                   
            
            
                                                }


                                                $sql = "SELECT * FROM student_info where student_id='$student_id' ";
                                                $data = $connection -> query($sql);

                                                $single_data = $data -> fetch_assoc();

                                            }

                                    ?>  

                                    

                                    <div class="container-fluid page__container">
							            <div class="row" style="min-height:500px;">
							                <div class="col-lg-12">
                                            <h1 class="m-5"></h1>

                                           
								
                                                <div class="card">
                                                    <div class="card-header">
                                                   <h2 class="card-title"> Edit Student</h2>
                                                    </div>

                                                <div class="card-body">
                                                    
                                                

                                            <form action=" <?php echo $_SERVER['PHP_SELF']; ?>?student_id=<?php echo $student_id;?> " method="POST" enctype="multipart/form-data">
                                            <table class="table table-striped">
                                                <tr>
                                                <td>Student ID</td>
                                                <td> <input disabled type="text" value="<?php echo $single_data['student_id']; ?>" > </td>
                                                </tr>

                                                <tr>
                                                <td>Student Status</td>
                                                <td><input name="status" type="text" value="<?php echo $single_data['status']; ?>" ></td>
                                                </tr>


                                                <tr>

                                                <td>Student Name</td>
                                                <td><input name="u_name" type="text" value="<?php echo $single_data['name']; ?>" ></td>
                                                </tr>

                                                <tr>

                                                <td>Student E-mail</td>
                                                <td><input name="u_mail" type="text" value="<?php echo $single_data['email']; ?>" ></td>
                                                </tr>

                                                <tr>
                                                <td>Student Cell</td>
                                                <td><input name="u_cell" type="text" value="<?php echo $single_data['cell']; ?>" ></td>
                                                </tr>

                                                <tr>
                                                <td>Student Location</td>
                                                <td><input name="u_location" type="text" value="<?php echo $single_data['location']; ?>"></td>
                                                </tr>

                                                <tr>
                                                <td>Student Photo</td>
                                                <td>
                                                <img class=" img-thumbnail" style=" width:100px; height:100px;" src="student_photos/<?php echo $single_data['photo']; ?>" alt="">
                                                </td>
                                                </tr>

                                                <tr>
                                                <td>Upload Picture</td>
                                                <td><input name="u_photo" type="file"></td>
                                                </tr>

                                                <tr>

                                                <td></td>
                                                
                                                <td><input name="submit" class="mt-3 btn btn-warning" type="submit" value="Update"></td>
                                                </tr>


                                            </table>

                                            </form>


                                            </div>
                                                </div>
                            
                                                
                                            </div>
							            </div>
                                    </div>
                                    
<?php require_once ("templates/footer.php"); ?>