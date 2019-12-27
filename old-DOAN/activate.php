<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    //require_once 'functions.php';
?>
<?php include 'header.php'; ?>
<h1>Kich hoat tai khoan</h1>
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
    Kich hoat tai khoan that bai
</div> 
<?php endif; ?>
<?php else: ?>
    <form  method="GET">
        
        
        <div class="form-group">
            <label for="code">Ma kich hoat</label>
            <input type="text" class="form-control"
                id="code" name="code"
                placeholder="Ma kich hoat"
            >
        </div>
        <button type="submit" class="btn btn-primary">Kich hoat</button>
       
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>
