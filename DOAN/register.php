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
        
        //27-11       
        $phone = $_POST['phone'];
        //$ddmmyyyy = $_POST['ddmmyyyy'];

        $time = strtotime($_POST['ddmmyyyy']);
        if ($time) {
          $new_date = date('Y-m-d', $time);
          
        } 

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
            $insertUser = newUser($displayName, $email, $hashPassword, $phone, $new_date);
            //$insertUser = createUser($displayName, $email, $hashPassword);
            //$_SESSION['userId'] = $insertUser;
            $success = true;

        }
    
?>
<?php if($success): ?>
<div class="container" style="margin-top:100px;">    
    <div class="alert alert-success" role="alert">
        <h1 align="center">Vui lòng xác thực tài khoản !</h1>
        <p>Cám ơn bạn đã đăng ký tài khoản</p>
        <p>Thông tin xác thực đã được gửi tới địa chỉ email 
            <p><strong><?php echo $currentUser['email'];?></strong></p> 
        . Vui lòng kiểm tra và làm theo hướng dẫn
        </p>
        
        <a align="center" href="https://mail.google.com/mail/u/0/#inbox"    target="_blank"
                class="button">Go to Email</a>
    </div> 
</div>
ob_end_flush();
<?php else: ?>
<div class="container">

<div class="alert alert-danger" role="alert">Fail</div> 
</div>

<?php endif; ?>
<?php else: ?>
<!---- FORM ĐĂNG KÝ 1  ---->
<!-- <div class="bootstrap-iso">
    <div class="container" style="margin-top:100px;">
        <form action="register.php" method="POST">
            <h1 align="center">Register</h1>
            <div class="form-group">
                <label for="displayName">Username</label>
                <input  type="text" 
                        class="form-control "
                        id="displayName" 
                        name="displayName" 
                        placeholder="you">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  type="text" 
                        class="form-control"
                        id="email" 
                        name="email" 
                        placeholder="you@example.com">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input  type="password" 
                                    class="form-control"
                                    id="password" 
                                    name="password" 
                                    placeholder="Enter 6 characters or more">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <div class="form-group">
                            <label for="repeatpassword">Repeat Password</label>
                            <input  type="password" 
                                    class="form-control"
                                    id="repeatpassword" 
                                    name="repeatpassword" 
                                    placeholder="Repeat your password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input  type="text" 
                                    class="form-control"
                                    id="phone" 
                                    name="phone"
                                    placeholder="Enter your phone">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <div class="form-group">
                            <label for="ddmmyyyy">DD-MM-YYYY</label>
                            <input  type="date" 
                                    class="form-control"
                                    id="ddmmyyyy" 
                                    name="ddmmyyyy" 
                                    placeholder="YY-MM-dd">            
                        </div>
                    </div>
                </div>
            </div>
        <button  style="margin-top:20px;" type="submit" class="btn btn-primary ">GO ON...CLICK ME !</button>
        </form>
    </div> 
</div> 

<br> -->

<!---- FORM ĐĂNG KÝ 2  ---->
<div class="container" style="margin-top:100px;">
    <form action="register.php" method="POST">
        <div class="login-form" style="background:url('img/1234.jpg');">
            <h1 align="center">Register</h1>
            <label for="displayName">DisplayName</label>
            <div class="form-group">
                <input  type="text" 
                        class="form-control "
                        id="displayName" 
                        name="displayName" 
                        placeholder="you">
                <i class="fa fa-user"></i>
            </div>
            <label for="email">Email</label>
            <div class="form-group ">
                <input  type="text" 
                        class="form-control" 
                        placeholder="you@gmail.com " 
                        id="email"
                        name="email">
                <i class="fa fa-envelope-o"></i>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <label for="password">Password</label>
                        <div class="form-group">
                            <input  type="password" 
                                    class="form-control" 
                                    placeholder="Enter 6 characters or more" 
                                    id="password"
                                    name="password">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-right">
                        <label for="repeatpassword">Repeat Password</label>
                        <div class="form-group">
                            <input  type="password" 
                                    class="form-control"
                                    id="repeatpassword" 
                                    name="repeatpassword" 
                                    placeholder="Repeat your password">
                            <i class="fa fa-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <label for="phone">Phone</label>
                        <div class="form-group">
                            <input  type="text" 
                                    class="form-control"
                                    id="phone" 
                                    name="phone"
                                    placeholder="Enter your phone">
                                    <i class="fa fa-phone"></i>          

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-right">
                        <label for="ddmmyyyy">dd-MM-YYYY</label>
                        <div class="form-group">
                            <input  type="date" 
                                    class="form-control"
                                    id="ddmmyyyy" 
                                    name="ddmmyyyy" 
                                    placeholder="YY-MM-dd">  
                                    <i class="fa fa-calendar"></i>          
                        </div>
                    </div>
                </div>
            </div>

              
            <button type="submit" class="log-btn" style="border-radius:15px; background-color:#009999;">GO ON...CLICK ME!</button>                            
        </div>
    </form>
</div>



<?php endif; ?>


