<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $comment = $_POST['comment']; 
    $postId = $_POST['postId'];
    

    sendCommentRequest($postId, $currentUser['id'], $comment);
    
   
    header('Location: thongtindoan.php');

?>