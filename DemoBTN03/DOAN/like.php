<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $postId = $_POST['like']; //stt
    
    $userId = $currentUser['id']; //


    sendLikeRequest($postId, $userId);
    
   





header('Location: thongtindoan.php');

?>