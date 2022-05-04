<?php 
    require_once './db/conn.php';
    if(!$_GET['id']){
        require_once './includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        //GET ID values
        $id=$_GET['id'];

        //call delete function
        $result=$crud->deleteattendes($id);

        //redirect to list
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            require_once './includes/errormessage.php';
        }
    }
   
?>