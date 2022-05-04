<?php 
    $title='index';
    require_once './includes/header.php' ;
    require_once './db/conn.php';
 
    //get attende by id
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result=$crud->getAttendDeatails($id);
    }else{
        echo '<h1>wrong</h1>';
    }

?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $result['firstname']. ' '.$result['lastname']?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']?></h6>
        <p>Date ofo Birth: <?php echo $result['dateofbirth'] ?></p>
       
        <p>Email Address: <?php echo $result['emailaddress'] ?></p>
        <p>Phone No:<?php echo $result['cotactno'] ?></p>
        
    </div>
</div>
<br>
    <a href="viewrecords.php" class="btn btn-info">Back to the list</a>
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Delete</a>