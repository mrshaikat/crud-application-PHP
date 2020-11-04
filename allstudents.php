
<?php require_once ("templates/header.php"); ?>


<h2 class="m-0">All Students</h2>
<div class=" container-fluid">
    <div class="" style="min-height:500px;">
        <div class="">

            <div class="">
                <div class="">
                   <h4 class=" text-center"> All Student Information</h4>
                </div>
                <table class=" table table-hover table-striped table-bordered table-responsive-md ">
                    <thead class=" thead-dark">
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Name</th>
                            <th>Student ID</th>
                            
                            
                            <th>E-mail</th>
                            <th>Cell</th>
                            <th>Photo</th>
                            <th>Address</th>
                            <th>Action</th>
                            
                          
                        </tr>
                    </thead>

                    <tbody>

                    <?php 



                        $sql = "SELECT * FROM student_info";
                       $data = $connection -> query($sql);

                       $i = 1;


                       while(  $single_data = $data -> fetch_assoc() ) :

                    
                    ?>
                        <tr>
                            <td><?php echo $i; $i++;  ?></td>
                            <td> <?php echo $single_data['name'];  ?> </td>
                            <td><?php echo $single_data['student_id'];  ?></td>
                            
                            <td><?php echo $single_data['email'];  ?></td>
                            <td><?php echo $single_data['cell'];  ?></td>
                            <td>
                                <img class="" style="height: 50px; width:50px;" src="student_photos/<?php echo $single_data['photo'];  ?>" alt="student-photo">
                            </td>
                            
                            <td><?php echo $single_data['location'];  ?></td>
                            <td>

                               <div class="btn-group">
                               <a class="btn btn-success btn-sm" href="single_student.php?student_id=<?php echo $single_data['student_id'];?>">View</a>
                                <a class="btn btn-primary btn-sm" href="edit_student.php?student_id=<?php echo $single_data['student_id'];?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="#">Delete</a>
                               </div>
                            </td>
                        </tr>

                       <?php endwhile; ?>


                       
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</div>

<?php require_once ("templates/footer.php"); ?>