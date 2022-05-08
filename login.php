<?php 
    $title='User Login';
    require_once 'includes/header.php';
    
    require_once 'db/conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=strtolower(trim($_POST['username']));
        $password=$_POST['password'];
        $new_password=md5($password.$username);

        $result=$user->getuser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger" role="alert">
            Operation Encounterd an error.please retry
            </div>';
        }else{
            $_SESSION['username']=$username;
            $_SESSION['id']=$result['id'];
            header("Location:viewrecords.php");
        }

    }
    
?>

    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="https://amar.vote/assets/img/amarVotebd.png" class="w-75" alt="Logo"> </span><br/>
                        <span class="logo_title mt-5"> Login Dashboard </span>
<!--            <h1>--><?php //echo $message?><!--</h1>-->

        </div>
        <div class="card-body">
            <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="text" class="form-control" placeholder="Username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST['username'];}?>">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>
