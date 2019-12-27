<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $postId = $_POST['like']; //stt
    
    $userId1 = $currentUser['id']; //

    $code = $_POST['notiLike'];

    $userId2 = $_POST['userPost'];

    if($code == 1){
        $check = "Da Like Bai Viet Cua Ban !";
    } 
    else if($code = 2) {

        $check = "Da Comment Bai Viet Cua Ban !";

    }
    else {
        $check = "Da Gui Yeu Cau Ket Ban !";
    }



    sendLikeRequest($postId, $userId1);
    
    sendNotificationLikeByPost($userId1, $userId2, $check, $code, $postId);





header('Location: show-all-comment.php?postId=' . $postId);

?>