<?php
    ob_start();
?>
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



?>
<div style="height:350px; width:100%; ">

    <div class="card" style="background:white; ">
                    <div style="height:253px; backgroud:blue; z-index:0;">
                        <img src="img/header/Twitter-Cover-Photo-26-1500x500_1366x277.jpg" style="width:100%; height:253px; object-fit: cover;" alt="">
                    </div>

                    <div class="container" style="height:97px; z-index:1; "> 
                        <div class="row " style="height:100%;">

                            <div class="col-md-4 col-sm-4 " style="z-index:2; margin: -60px 0 0 0; padding-left:60px;">
                                <div class="showcase-left">
                                        <img style= "width:210px" class="rounded-circle" src="<?php echo $profile['avatar'];?>" >
                                </div>
                            </div>

                           <div class="col-md-8 col-sm-8 " style="height:67px;">
                                    <!---->
                                    
                                    <ul  class="d-flex flex-wrap"  style="  margin-left:0px; height:100%;">
                                        <?php if($profile['id'] == $currentUser['id']): ?>
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">Tên hiển thị  <a href="update-profile.php"><i class="fa fa-pencil "></i></a><br>
                                            <p align="center" style="font-weight:bold; color:red;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php else: ?>
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">Tên hiển thị<br>
                                            <p align="center" style="font-weight:bold; color:red;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php endif; ?>

                                        <!-- <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">Tin tức<br>
                                            <p align="center" style="font-weight:bold; color:red;">13.7N</p>
                                        </li> -->
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">
                                            <a href="friend-list.php?id=<?php echo $userId;?>">Đang theo dõi<br></a>                                           
                                        
                                            <p align="center" style="font-weight:bold; color:red;">57</p>

                                        </li>
                                        
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">Người theo dõi<br>
                                            <p align="center" style="font-weight:bold; color:red;">750</p>
                                        </li>
                                        



                                        <?php if($currentUser != $profile): ?>


                                        <li align="center" class="list-group-item border-0 dropdown" style="background:white; float:right; margin:5px 0 0 15px;  height:100%;">
                                            
                                                <?php if ($isFollower && $isFollowing): ?>
                                                    <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       <i class="fa fa-check"> ĐANG THEO DÕI</i> 
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <form action="remove-friend.php" method="POST">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                            <a class="dropdown-item" href="update-profile.php">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> BLOCK</i></button>
                                                            </a>
                                                        </form>
                                                    </div>

                                                    
                                                <?php else: ?>
                                                    <?php if($isFollowing && !$isFollower): ?>

                                                        <form action="remove-friend.php" method="POST">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-times"> XÓA YÊU CẦU</i> 
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>


                                                    <?php if(!$isFollowing && $isFollower): ?>
                                                        <div class="row">
                                                            <form action="add-friend.php" method="POST">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-check"> ĐỒNG Ý</i>
                                                                </button>
                                                            </form>
                                                            <form style="margin-left:7px;" action="remove-friend.php" method="POST">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-times"> TỪ CHỐI</i>
                                                                </button>
                                                            </form>
                                                            
                                                        </div>
                                                        


                                                    <?php endif; ?>


                                                    <?php if(!$isFollowing && !$isFollower): ?>

                                                        <form action="add-friend.php" method="POST">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-rss"> GỬI YÊU CẦU</i> 
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>


                                                <?php endif; ?>
            

                                        </li>

                                        <?php endif; ?>



                                    </ul>   
                                    <!---->
                            </div>


                        </div>
                    </div>
    </div>

 

      
</div>