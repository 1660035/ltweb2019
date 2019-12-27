<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $image = $_POST['cover'];

            $fileName = $_FILES['cover']['name'];
            $fileSize = $_FILES['cover']['size'];
            $fileTemp = $_FILES['cover']['tmp_name'];
            $fileType = $_FILES['cover']['type'];
            
            move_uploaded_file($fileTemp, "img/header/".$fileName);
               
            editCover($currentUser['id'], "img/header/".$fileName) ;



header('Location: test.php?id=' . $currentUser['id']);

?>