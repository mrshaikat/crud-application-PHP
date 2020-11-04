<?php 
        require_once "../libs/config.php";



        if( isset( $_GET['student_id'] )  ){

            $student_id = $_GET['student_id'];
            $student_picture = $_GET['student_picture'];
           
        }
        

            $sql = "DELETE FROM student_info where student_id='$student_id' ";
            $connection -> query($sql);

            unlink('../student_photos/'.$student_picture );
            
            header("location:../allstudents.php");
            

        



?>    