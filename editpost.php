<?php 
    require_once 'db/conn.php';
    //Get values from operation
    if(isset($_POST['submit'])){
        //extract values from the $_post array
        $id=$_POST['id'];
        $fname=$_POST['Firstname'];
        $lname=$_POST['Lastname'];
        $dob=$_POST['DOB'];
        $email=$_POST['email'];
        $contact= $_POST['phone'];
        $speciality=$_POST['specialty'];

        //call crud function
        $result=$crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality);
        //Redirct to index.php
        if($result){
            header("Location: index.php");
        }
        else{
            echo 'error';
        }
    }
    else{
        echo 'not working';
    }

?>