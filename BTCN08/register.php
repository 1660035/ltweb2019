<?php
    ob_start();
?>
<?php
    require_once 'init.php';
    require_once 'functions.php';
?>
<?php include 'header.php'; ?>
<?php  if ( isset($_POST['email']) && isset($_POST['password']) ) : ?>
<?php 
        $displayName = $_POST['displayName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $success = false;

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        //299-10
        $user = findUserByEmail($email);
        
            // if ($user && password_verify($password, $user['password'])) {
            //     $success = true;
            //     $_SESSION['userId'] = 1;
            // }
        if(!$user)  {
            // $stmt = $db->prepare("INSERT INTO users(displayName, email, password) VALUE(?,?,?)" );
            // $stmt->execute(array($displayName, $email, $hashPassword));
            // $insertUser = $db->lastInsertId();
            $insertUser = createUser($displayName, $email, $hashPassword);
            //$_SESSION['userId'] = $insertUser;
            $success = true;

        }
    
?>
<?php if($success): ?>
<div class="alert alert-success" role="alert">vui long</div> 

ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">Fail</div> 
<?php endif; ?>
<?php else: ?>
    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="displayName">Username</label>
            <input type="text" class="form-control"
                id="displayName" name="displayName"
            >
        </div>
       
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control"
                id="email" name="email"
            >
        </div>

         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control"
                id="password" name="password"
            >
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <!-- <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" value="Upload file">
        </form> -->
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>
