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
<?php endif; ?>
<?php include 'footer.php'; ?>
