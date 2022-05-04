<?php 
    $title='index';
    require_once './includes/header.php' ;
    require_once './db/conn.php';

    if(isset($_POST['submit'])){
        //extract value from post array
        $fname=$_POST['Firstname'];
        $lname=$_POST['Lastname'];
        $dob=$_POST['DOB'];
        $email=$_POST['email'];
        $contact= $_POST['phone'];
        $speciality=$_POST['specialty'];

        //Call function to insrt and trick if sucess or not
        $isSusess=$crud->insertAttendees($fname,$lname,$dob,$email,$contact,$speciality);

        if($isSusess){
            require_once './includes/sucessmessage.php';
        }else{
            require_once './includes/errormessage.php';
        }
    }
    ?>


<!--how to display value using get method in php-->
<!--<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php // echo $_GET['Firstname']. ' '.$_GET['Lastname']?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php // echo $_GET['specialty']?></h6>
        Date ofo Birth: <p class="card-text"><?php //echo $_GET['DOB'] ?></p>
        Specialty: <p class="card-text"><?php //echo $_GET['specialty'] ?></p>
        Email Address: <p class="card-text"><?php // echo $_GET['email'] ?></p>
        Phone No:<p class="card-text"><?php //echo $_GET['phone'] ?></p>
        
    </div>
</div>-->


<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['Firstname']. ' '.$_POST['Lastname']?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']?></h6>
        Date ofo Birth: <?php echo $_POST['DOB'] ?></p>
        Specialty: <?php echo $_POST['specialty'] ?></p>
        Email Address: <?php echo $_POST['email'] ?></p>
        Phone No:<?php echo $_POST['phone'] ?></p>
        
    </div>
</div>
<?php 
 
?>
<?php 
    $title='index';
    require_once './includes/footer.php' ?>