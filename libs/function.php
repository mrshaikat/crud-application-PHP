<?php

    

    require_once "config.php";
    
    function userNameCheck($uname, $connection){
            $sql = "SELECT * FROM user_info where uname='$uname' ";
            $data = $connection -> query($sql);

            $number = $data -> num_rows ;

           if( $number > 0  ){
                return false;
           }else{

            return true;
           }

    }

    function emailCheck($email, $connection){

        $sql = "SELECT * FROM user_info where email = '$email' ";
        $data = $connection -> query($sql);
        $number = $data -> num_rows;

        if( $number > 0){
            return false;
        }else{
            return true;
        }




    }




?>