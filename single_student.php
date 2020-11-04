<?php require_once ("templates/header.php"); ?>

                                    <?php 

                                    if( $_GET['student_id'] ){
                                        $student_id = $_GET['student_id'];


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
                                                   <h2 class=" card-title"> Single Student</h2>
                                                    </div>
                                                <div class="card-body">
                                            <img style=" width:200px; height:200px; border-radius:50%; display:block; margin: 50px auto 10px;" src="student_photos/<?php echo $single_data['photo'] ?>" alt="">

                                            <table class="table table-striped table-hover">
                                                <tr>
                                                <td>Student ID</td>
                                                <td> <?php echo $single_data['student_id']; ?> </td>
                                                </tr>

                                                <tr>
                                                <td>Student Status</td>
                                                <td><?php echo $single_data['status']; ?></td>
                                                </tr>


                                                <tr>

                                                <td>Student Name</td>
                                                <td><?php echo $single_data['name']; ?></td>
                                                </tr>

                                                <tr>

                                                <td>Student E-mail</td>
                                                <td><?php echo $single_data['email']; ?></td>
                                                </tr>

                                                <tr>
                                                <td>Student Cell</td>
                                                <td><?php echo $single_data['cell']; ?></td>
                                                </tr>

                                                <tr>
                                                <td>Student Location</td>
                                                <td><?php echo $single_data['location']; ?></td>
                                                </tr>

                                            </table>



                                            </div>
                                                </div>
                            
                                                
                                            </div>
							            </div>
                                    </div>
                                    
<?php require_once ("templates/footer.php"); ?>