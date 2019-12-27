<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
?>
<?php include 'header.php'; ?>
<?php  if (  isset($_GET['code']) ) : ?>
<?php 
        $code = $_GET['code'];

        $success = false;

        //299-10
        $success = activateUser($code);
        
        
                
?>
<?php if($success): ?>
<?php header('Location:login.php'); ?>
ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">
    Account activation failed
</div> 
<?php endif; ?>
<?php else: ?>
<div class="container" style="margin-top:100px;">

    <form  method="GET">
    
    <div class="login-form" style="background:url('img/1234.jpg');">
       
    <h1 align="center"> Activate Account</h1>
        <div class="form-group">
            <label for="code">Activation Code</label>
            <input type="text" class="form-control"
                id="code" name="code"
                placeholder="Ma kich hoat"
            >
        </div>
        <button type="submit" class="log-btn" style="border-radius:15px; background-color:#009999;">ACTIVATED</button>
       </div>
    </form>
    </div>
<?php endif; ?>
<?php include 'footer.php'; ?>
