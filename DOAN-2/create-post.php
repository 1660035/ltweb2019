<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    $content = $_POST['content'];
    $image = $_POST['avatar'];

            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            $fileTemp = $_FILES['avatar']['tmp_name'];
            $fileType = $_FILES['avatar']['type'];
            
            
            move_uploaded_file($fileTemp, "img/posts/".$fileName);


            
            
    $privacy = $_POST['inlineFormCustomSelect'];

//



    if($privacy == 1){
        
        $test = 1;
        createPost($currentUser['id'], $currentUser['displayName'], $content, "img/posts/".$fileName, $test);


    }
    else if($privacy == 2){
        $test = 2;

        createPost($currentUser['id'], $currentUser['displayName'], $content, "img/posts/".$fileName, $test);

    }
    else if($privacy == 3){

    
        $test = 3;

        createPost($currentUser['id'], $currentUser['displayName'], $content, "img/posts/".$fileName, $test);

    }
    


  //  createPost($currentUser['id'], $currentUser['displayName'], $content, "img/posts/".$fileName, $privacy);
//




header('Location: thongtindoan.php');

?>