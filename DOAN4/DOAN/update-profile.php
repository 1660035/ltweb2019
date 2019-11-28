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


<?php  if ( isset($_POST['displayName']) ) : ?>
<?php 
        $displayName = $_POST['displayName'];
        $success = false;     

        

        if($displayName != "")    {
            updateUserProfile($currentUser['id'], $displayName);
            updateUserProfileAllPost($currentUser['id'], $displayName);
            $success = true;
        }

        $fileExt = strtolower(end(explode('.', $_FILES['avatar']['name'])));

        
        if (isset($_FILES['avatar']))  {
            $success = false;
            $errors = array();
            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileTemp = $_FILES['avatar']['tmp_name'];
            $fileType = $_FILES['avatar']['type'];
            $expensions = array("jpeg", "jpg", "png");

            if(in_array($fileExt, $expensions) == false)    {
                $errors[] = "JPEG or PNG";
            }

            if (empty($errors) == true) {
                move_uploaded_file($fileTemp, "img/avatars/".$fileName);
                updateImageProfile($currentUser['id'], "img/avatars/".$fileName);
                $success = true;
            }
            else    {
                $success = false;
            }
            
        }
    
        // if (isset($_FILES['avatar'])) {
        //     $success = false;
        //     $file = $_FILES['avatar'];
        //     $fileName = $file['name'];
        //     $fileSize = $file['size'];
        //     $fileTemp = $file['tmp_name'];
        //     //$filePath =  'img/avatar'  .  $currentUser['id'] . '.jpg';
            
        //     $target = "img/".basename($file, $fileName);
            
        //     //$success = move_uploaded_file($fileTemp, $filePath);
        //     //$newImage = resizeImage($filePath, 480, 480);
        //     //imagejpeg($newImage, $filePath);

        //     // //src="img/avatars/avatar     <?php echo $post['userId']
        // }

        /**/ 
        


?>
<?php if($success): ?>
<?php header('Location:index.php'); ?>
ob_end_flush();
<?php else: ?>
<div class="alert alert-danger" role="alert">Fail</div> 
<?php endif; ?>
<?php else: ?>


<div class="container" style="margin-top:100px;" >
            

            <form action="" method="POST" enctype = "multipart/form-data">    
                <div class="form-group">
                    <label for="displayName">New Profile Name</label>
                    
                        
                        <img src="img/icons/wife.png" alt="" width="30px;">
                        <input type="text" class="form-control"
                            id="displayName" name="displayName" placeholder="Name Name"
                            value="<?php echo $currentUser['displayName'];?> ">
                   
                    
                </div>
                <div class="form-group">
                    <label for="avatar">New Profile Name</label>
                    <input type="file" class="form-control-file" id="avatar" name="avatar" >
                </div>
                
                <button type="submit" class="btn btn-primary ">GO ON...CLICK ME!</button>
                
            </form>
            
            <div class="row">
                <br>
            </div>

            
            <div class="login-form">
                <h1 align="center">Edit Profile</h1>
                <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Username " id="UserName">
                    <i class="fa fa-user"></i>
                </div>

                <div class="form-group log-status">
                    <input type="password" class="form-control" placeholder="Password" id="Passwod">
                    <i class="fa fa-lock"></i>
                </div>

                <div class="form-group log-status">
                    <input type="text" class="form-control" placeholder="Number Phone" id="Phone">
                    <i class="fa fa-phone"></i>
                </div>

                <div class="form-group log-status">
                    <input type="file" class="form-control-file" id="avatar" name="avatar" >
                    <i class="fa fa-file"></i>


                </div>

                
                <button type="button" class="log-btn" >GO ON...CLICK ME!</button>                            
            </div>



            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="row position-fixed" >
                        <div class="col-12" style="width:380px;">
                                    
                                        <div class="list-group" ">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                User Account
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">Edit Profile</a>
                                            <a href="change-password.php" class="list-group-item list-group-item-action">Change Password</a>
                                            <a href="#showcase" class="list-group-item list-group-item-action">Log Out !</a>
                                            <a href="#testimonial" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                                        </div>
                                    
                        </div>
                    </div>        
                </div>
                
            
                    
                <div class="col-md-8 col-sm-8">
                            <div class="showcase-right">
                                    <div class="card">
                                            <div class="card-body">
                                                
                                            </div>
                                    </div>
                            </div>
                </div>      
            </div>



</div>






<?php endif; ?>

