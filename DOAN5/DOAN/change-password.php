<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    require_once 'functions.php';
    if(!$currentUser) {
        header('Location: index.php');
        exit();
    }

?>
<?php include 'header.php'; ?>
<?php  if ( isset($_POST['currentPassword']) && isset($_POST['password']) ) : ?>
<?php 
        $currentPassword = $_POST['currentPassword'];
        $password = $_POST['password'];        
        $success = false;     
        if(password_verify($currentPassword, $currentUser['password']) )   {
            $change = changePasswordUser($password, $currentUser['id']);
            //var_dump($stmt->execute(array($hashPassword, $currentUser['id'])));
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
<div class="container" style="margin-top:10px;">
    <form action="change-password.php" method="POST">
        
        <div class="form-group">
            <label for="currentPassword">Current Password</label>
            <input type="password" class="form-control"
                id="currentPassword" name="currentPassword"
            >
        </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control"
                id="password" name="password"
            >
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
        <!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" value="Upload file">
        </form> -->
    </form>

        <div class="row">
                <br>
            </div>

            
            <!-- <div class="login-form">
                <h1 align="center">Edit Profile</h1>
                <div class="form-group ">
                    <label for="UserName">Current Password</label>
                    <input type="text" class="form-control" placeholder="Current your password " id="UserName">
                    <i class="fa fa-user" for="UserName"></i>
                </div>

                <div class="form-group log-status">
                    <label for="PassWord">Nes Password</label>
                    <input type="password" class="form-control" placeholder="New password" id="Passwod">
                    <i class="fa fa-lock"></i>
                </div>

                <div class="form-group log-status">
                    <label for="RepeatPassword">Repeat New Password</label>
                    <input type="text" class="form-control" placeholder="Repeat your password" id="RepeatPassword">
                    <i class="fa fa-phone"></i>
                </div>

                

                
                <button type="button" class="log-btn" >GO ON...CLICK ME!</button>                            
            </div> -->






</div>
<?php endif; ?>
<?php include 'footer.php'; ?>
