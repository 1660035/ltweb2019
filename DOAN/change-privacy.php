<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
   
    $postId = $_POST['postIdChangePrivacy'];
           
               
    $privacy = $_POST['inlineFormCustomSelect'];

    if($privacy == 1){
        
        $test = 1;
        changePrivacyPostCurrentUser($postId, $currentUser['id'], $privacy);


    }
    else if($privacy == 2){
        $test = 2;

        changePrivacyPostCurrentUser($postId, $currentUser['id'], $privacy);

    }
    else if($privacy == 3){

    
        $test = 3;

        changePrivacyPostCurrentUser($postId, $currentUser['id'], $privacy);

    }
    


header('Location: test.php?id=' . $currentUser['id']);

?>