<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $content = $_POST['content'];
    $image = $_POST['avatar'];

            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileTemp = $_FILES['avatar']['tmp_name'];
            $fileType = $_FILES['avatar']['type'];
            
            move_uploaded_file($fileTemp, "img/posts/".$fileName);
               



    createPost($currentUser['id'], $currentUser['displayName'], $content, "img/posts/".$fileName);





header('Location: index.php');

?>