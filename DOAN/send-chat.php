<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $content = $_POST['comment']; 

    $fromUserId = $_POST['fromUserId'];
    
    $toUserId = $_POST['toUserId'];

    $userId = $fromUserId;


    sendMessages($fromUserId, $toUserId, $content, $userId);


    header('Location: chat.php?id=' . $toUserId);

?>