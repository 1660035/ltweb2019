<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $content = $_POST['search'];
    
               

    $profile = findUserByDisplayName($content);

    



header('Location: test.php?id=' . $profile['id']);

?>