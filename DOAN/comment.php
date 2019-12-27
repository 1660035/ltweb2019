<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $comment = $_POST['comment']; 
    $postId = $_POST['postId'];
    



    
    
    $userId1 = $currentUser['id']; //

    $code = $_POST['notiComment'];

    $userId2 = $_POST['userPost'];

    if($code == 1){
        $check = "Da Like Bai Viet Cua Ban !";
    } 
    else if($code == 2) {

        $check = "Da Comment Bai Viet Cua Ban !";

    }
    else {
        $check = "Da Gui Yeu Cau Ket Ban !";
    }



    sendCommentRequest($postId, $currentUser['id'], $comment);
    if($userId2 != $currentUser['id'])
    {
        sendNotificationLikeByPost($userId1, $userId2, $check, $code, $postId);

    }


    
   
    header('Location: index.php');

?>