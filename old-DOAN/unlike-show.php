<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $postId = $_POST['unlike']; //stt
    
    $userId = $currentUser['id']; //


    removeLikeRequest($postId, $userId);
    
   
header('Location: show-all-comment.php?postId=' . $postId);

?>