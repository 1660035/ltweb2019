<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
?>
<?php include 'header.php'; ?>



<?php  if ( isset($_POST['email']) && isset($_POST['password']) ) : ?>
<?php 
        $email = $_POST['email'];
        $password = $_POST['password'];

        $success = false;

        //299-10
        $user = findUserByEmail($email);
        
        if ($user && $user['status'] && password_verify($password, $user['password'])) {
            $success = true;
            $_SESSION['userId'] = $user['id'];
        }
                
?>
<?php if($success): ?>
<?php header('Location:index.php'); ?>
ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">Wrong Password</div> 
<?php endif; ?>

<?php else: ?>

    <!-- <form action="login.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control"
                id="email" name="email"
            >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <a class=" alert-danger" href="register.php">Forgot password?</a>
            <input type="password" class="form-control"
                id="password" name="password"
            >
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
       
    </form> -->

    <!-- <div class="row">
        <div class="col-sm-12 col-md-4">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control"
                        id="email" name="email"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <a class=" alert-danger" href="register.php">Forgot password?</a>
                    <input type="password" class="form-control"
                        id="password" name="password"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
               
            </form>
        </div>
    </div> -->


<!---- FORM LOGIN 1 ---->
    <!-- <div class="container" style="margin-top:100px; padding:0px 100px  0px  100px;">  
        <form action="login.php" method="POST">
            <h1 align="center">Login</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input  type="text" 
                        class="form-control" 
                        id="email"  
                        name="email" 
                        placeholder="you@example.com">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a align="right" class=" alert-danger" href="forgot.php" > <p align="rignt">Forgot password?</p> </a>
                    </div>
                </div>
                <input  type="password" 
                        class="form-control"
                        id="password" 
                        name="password" 
                        placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>           
    </div> -->

<!---- FORM LOGIN 2 ---->






    <div class="container" style="margin-top:155px;">
        <form action="login.php" method="POST">

            <div class="login-form" style="background:url('img/1234.jpg');">
                <h1 align="center">Login</h1>
                <label for="email">Email</label>
                <div class="form-group ">
                    <input  type="text" 
                            class="form-control" 
                            placeholder="you@gmail.com " 
                            id="email"
                            name="email">
                    <i class="fa fa-user"></i>
                </div>
                <label for="password">Password</label>
                <div class="form-group log-status">
                    <input  type="password" 
                            class="form-control" 
                            placeholder="Enter your password" 
                            id="password"
                            name="password">
                    <i class="fa fa-lock"></i>
                </div> 
                <div class="col">
                    <a align="right" class=" alert-danger" href="forgot.php" > <p align="rignt" style="font-weight:bold; color:white;">Forgot password?</p> </a>
                </div>           
                <button type="submit" class="log-btn" style=" color:black; border-radius:15px; background-color:#009999;">GO ON...CLICK ME!</button>                            
            </div>
        </form>
    </div>




<?php endif; ?>


<?php include 'footer.php'; ?>

