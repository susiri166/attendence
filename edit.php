    <?php  
        $title='Edit Records';
        require_once './includes/header.php';
        require_once './db/conn.php';

        $result=$crud->getSpecalities();

        if(!isset($_GET['id'])){
           // echo 'error';
           require_once './includes/errormessage.php';
           header("Location: viewrecords.php");
        }
        else{
            $id=$_GET['id'];
            $attendee=$crud->getAttendDeatails($id);
        
    ?>

        <h1 class="text-center">Edit Records</h1>
        <form method="POST" action="editpost.php">
            <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>"> 
            <div class="form-group">
                <label for="Firstname">First Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="Firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" name="Firstname">     
            </div>

            <div class="form-group">
                <label for="Lastname">Last Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="Lastname" aria-describedby="emailHelp" placeholder="Enter LastName" name="Lastname">     
            </div>

            <div class="form-group"> 
                <label for="Date of Birth">Date of Birth</label>
                <input type="date" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="DOB" aria-describedby="emailHelp" placeholder="Enter date" name="DOB">     
            </div>

            <div class="form-group">
                <label for="specialty">Area of Experties</label>
                <select class="form-control" id="specialty" name="specialty">
                    <?php while($r=$result->fetch(PDO::FETCH_ASSOC)){?>
                        <option value="<?php echo $r['specialtes_id']?>"> 
                        <?php if($r['specialtes_id']==$attendee['specialtes_id'])?>
                       
                        <?php echo $r['name']?>
                    </option>
                    <?php }?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Contact Number</label>
                <input type="text" class="form-control" id="phone" value="<?php echo $attendee['cotactno']?>" aria-describedby="emailHelp" placeholder="Enter phone no" name="phone">   
            </div>
            <a href="./viewrecords.php" class="btn btn-default">Back To List</a>
            <button type="submit" class="btn btn-success btn-block" name="submit">Save Changes</button>
       
        </form>
        <?php } ?>
</div>
<br><br><br><br><br>


<?php 
    require_once 'includes/footer.php'
?>