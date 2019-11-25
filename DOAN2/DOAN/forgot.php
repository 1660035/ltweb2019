<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
?>
<?php include 'header.php'; ?>
<?php  if ( isset($_POST['email']) ) : ?>
<?php 
        $email = $_POST['email'];
        
        $success = false;

        //299-10
        $user = findUserByEmail($email);
        if ($user) {

            forgotUser($email);
            $success = true;
        }
                
?>
<?php if($success): ?>
<?php header('Location:index.php'); ?>
ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">Fail</div> 
<?php endif; ?>
<?php else: ?>
    
    <div clas="container">
    
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            </div>
            <div class="col-md-4">
                <form action="forgot.php" method="POST">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8"><b><strong>Reset Your Password</strong></b></div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control"
                            id="email" name="email">
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Send My Reset Link</button>
                        </div>
                        
                    </div>
                   
                </form>
            </div>
            <div class="col col-lg-2">
            </div>
    </div>
    
    </div>


<?php endif; ?>
<?php include 'footer.php'; ?>

<!----
---->


