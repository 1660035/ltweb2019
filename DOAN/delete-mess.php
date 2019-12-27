<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $userId1 = $_POST['test2']; //stt
    
    $userId2 = $currentUser['id']; //

    deleteMess($userId1, $userId2);
    
header('Location: chat.php?id=' . $userId1 );

?>



