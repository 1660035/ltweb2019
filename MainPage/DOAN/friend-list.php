<?php
    require_once 'init.php';
    require_once 'functions.php';
    $posts = getNewFeeds();

    

    if(!$currentUser) {
        header('Location: index.php');
        exit();
    }

    $userId = $_GET['id'];
    $profile = findUserById($userId);

    $isFollowing = getFriendShip($currentUser['id'], $userId);
    $isFollower =  getFriendShip($userId, $currentUser['id']);

    $posts1 = getMyNewFeeds($userId);
    
    $posts2 = getListFriend($userId);



?>
<?php include 'header.php'; ?>
<?php include 'nav-information.php'; ?>

<div class="container">
    <div class="row">
    <?php foreach ($posts2 as $post):    ?>

        
        
        <figure class="figure">
        <img src="<?php echo $post['avatar'];?>" style="width:250px;" class="figure-img img-fluid rounded" alt="...">
        <figcaption class="figure-caption" ><?php echo $post['displayName'];?></figcaption>
        </figure>

    <?php endforeach ?>   

    </div>
</div>