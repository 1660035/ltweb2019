<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
?>
<?php include 'header.php'; ?>

    <!-- <div class="container"> -->


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
<div class="alert alert-danger" role="alert">Fail</div> 
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

    <div clas="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            </div>
            <div class="col-md-5">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"
                            id="email" name="email"
                        >
                    </div>
                    <div class="form-group">
                    
                        <div class="row">
                            <div class="col">
                                <label for="password">Password</label>
                            </div>
                            <div class="col">
                                <a class=" alert-danger" href="forgot.php" > <p align="rignt">Forgot password?</p> </a>
                            </div>
                        </div>
                        
                        <input type="password" class="form-control"
                            id="password" name="password"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>      
            </div>
            <div class="col col-lg-2">
            </div>
    </div>
    
    </div>


<?php endif; ?>



    </div>

     </section>
<?php include 'footer.php'; ?>

<!----
---->


