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
    <form action="" method="POST" enctype = "multipart/form-data">
        
        <div class="form-group">
            <label for="displayName">New Profile Name</label>
            <input type="text" class="form-control"
                id="displayName" name="displayName" placeholder="Name Name"
                value="<?php echo $currentUser['displayName']; ?> "

            >
        </div>
        <div class="form-group">
            <label for="avatar">New Profile Name</label>
            <input type="file" class="form-control-file" id="avatar" name="avatar" >
        </div>
         
        <button type="submit" class="btn btn-primary">Change</button>
        
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>
