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

    // $posts1 = getMyNewFeeds($userId);
    
    $posts2 = getListFriend($userId);



?>
<?php include 'header.php'; ?>
<?php include 'sum.php'; ?>

<div class="container" style="margin-top:50px;">
   
        <div class="container">

            
            
            <!-- <figure class="figure">
            <img src="<?php echo $post['avatar'];?>" style="width:250px;" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption" ><?php echo $post['displayName'];?></figcaption>
            </figure> -->

        <div class="tabs-content">
            <div class="friend-list">
                <div class="list-ul">
                    <div align="center" class="list-li title">
                        <h1>Recently added friends</h1>
                    </div>
                    <?php foreach ($posts2 as $post):    ?>
                        <div class="list-li clearfix">
                            <div class="photo pull-left">
                                <img style="width:128px; height:128px;" src="<?php echo $post['avatar'];?>">
                            </div>
                            <div class="info pull-left" style="padding: 50px 0 0 50px; ">
                                <div class="name" style="font-size:25px; font-weight:bold; ">
                                    <a href="test.php?id=<?php echo $post['id'];?>">
                                        <?php echo $post['displayName'];?>

                                    </a>
                                </div>
                                
                            </div>
                            <div class="action pull-right" style="padding: 50px 0 0 0; ">
                                <a href="#" style="margin-left:30px;">   <i class="fa fa-star-o fa-2x"></i></a>
                                <a href="#" style="margin-left:30px;">   <i class="fa fa-comment-o fa-2x"></i></a>
                                <a href="#" style="margin-left:30px;">   <i class="fa fa-ellipsis-v fa-2x"></i></a>
                            </div>
                        </div>
                        <br>
                        
                    <?php endforeach ?>  


                    

                </div>




            </div>
        </div>


            






</div>
       
</div>