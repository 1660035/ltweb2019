<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
    
?>
<?php include 'header.php'; ?>
<h1>Khoi phuc mat khau</h1>
<?php  if (  isset($_GET['email']) &&  isset($_POST['password']) ) : ?>
<?php 
        $password = $_POST['password'];
        $email = $_GET['email'];
        $success = false;

        //299-10
        //$success = activateUser($code);

        //$success = resetPassword($password, $email);
        $success = resetPassword($password, $email);
        //$success = true;

        
        
                
?>
<?php if($success): ?>
<?php header('Location:login.php'); ?>
ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">
    Khoi phuc mat khau that bai
</div> 
<?php endif; ?>
<?php else: ?>
    <form method="POST"  method="GET" >
        
        <div class="form-group">
            <label for="password">Mat Khau Moi</label>
            <input type="password" class="form-control"
                id="password" name="password"
                
            >
        </div>
        <button type="submit" class="btn btn-primary">Xac nhan</button>
       
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>
