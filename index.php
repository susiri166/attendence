<?php  
    $title='index';
    require_once './includes/header.php';
    require_once './db/conn.php';

    $result=$crud->getSpecalities();
    ?>

        <h1 class="text-center">Registration IT Conference</h1>
    <form method="POST" action="sucess.php">
        <div class="form-group">
            <label for="Firstname">First Name</label>
            <input type="text" class="form-control" id="Firstname" aria-describedby="emailHelp" placeholder="Enter Firstname" name="Firstname">     
        </div>

        <div class="form-group">
            <label for="Lastname">Last Name</label>
            <input type="text" class="form-control" id="Lastname" aria-describedby="emailHelp" placeholder="Enter LastName" name="Lastname">     
        </div>

        <div class="form-group"> 
            <label for="Date of Birth">Date of Birth</label>
            <input type="date" class="form-control" id="DOB" aria-describedby="emailHelp" placeholder="Enter date" name="DOB">     
        </div>

        <div class="form-group">
            <label for="specialty">Area of Experties</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r=$result->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $r['specialtes_id']?>"><?php echo $r['name'] ?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone no" name="phone">   
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>

    </form>
</div>
<br><br><br><br><br>


<?php 
    require_once 'includes/footer.php'
?>