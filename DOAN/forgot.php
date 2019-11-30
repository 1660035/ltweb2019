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
    <!-- <div class="container" style="margin-top:100px;">    
        <div class="alert alert-success" role="alert">
            <h1 align="center">Khôi phục mật khẩu !</h1>
            <p>Cám ơn bạn đã sử dụng tài khoản</p>
            <p>Thông tin khôi phục mật khẩu đã được gửi tới địa chỉ email 
                <p><strong><?php echo $currentUser['email'];?></strong></p> 
            . Vui lòng kiểm tra và làm theo hướng dẫn
            </p>
            
            <a align="center" href="https://mail.google.com/mail/u/0/#inbox"    target="_blank"
                    class="button">Go to Email</a>
        </div> 
    </div> -->

ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">Fail</div> 
<?php endif; ?>
<?php else: ?>
    
<!--     
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
        </div> -->
    
        <div class="container" style="margin-top:100px;">



            <form action="forgot.php" method="POST">
                <div class="login-form">
                    <h1 align="center">Reset Password</h1>
                    
                    <label for="email">Email</label>

                    <div class="form-group">
                        <input  type="text" 
                                class="form-control"
                                id="email" 
                                name="email"
                                placeholder="Enter your email">
                                <i class="fa fa-envelope-o"></i>

                    </div>
                            
                    <button type="submit" class="log-btn" >Send My Reset Link</button>                            
                </div>
            </form>




        </div>

<?php endif; ?>

