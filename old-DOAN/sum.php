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

    $posts2 = getListFriend($userId);
    
$test = 0;
    foreach($posts2 as $post):
        $test += $post['num_items'];
    endforeach

    
     

?>

<div style="height:340px; width:100%;">
    <div class="card" style="background:white;">
        <div class="row">
        <!----COVER--->
            <div class="col-12" style="z-index: 2;">
                <div style="height:253px; ">
                    <!----IMAGE COVER------> 
                    <img src="<?php echo $profile['cover'];?>" style="width:100%; height:100%; object-fit: cover;" alt="">
                    <!----Button Changed Cover------>
                    <?php if($profile['id'] == $currentUser['id']): ?>
                        <div style=" margin:-240px 0 0 20px;">                        
                            <form action="edit-cover.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" class="form-control-file " id="cover" name="cover" onchange="this.form.submit()" style="display:none;">                            
                                    <label for="cover">
                                        <i class="fa fa-camera fa-2x" ></i>
                                    </label>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <!-----NAV Information------->
            <div class="col-12" > 
                <div class="container" style="z-index:1; margin-top: -123px;">
                    <div class="row"  >
                    <!-------AVATAR------>
                        <div class="col-md-3 col-sm-3" style="z-index:3;">                        
                            <div style="height:210px;  " class="d-flex align-items-end">
                                <img  style= "max-width:100%;  max-height: 100%; " class="rounded-circle" src="<?php echo $profile['avatar'];?>" >
                            </div>                           

                        </div>

                            
                        <!----------Functions Tools-------->
                        <div class="col-md-9 col-sm-9">
                            <div class="row"> <!------Current Total Height: 200px-------->
                                <!--------------Type------------------------>
                                <!-- <div class="col-12 " style="height:123px; background:pink;">
                                    <div class="dropdown" style=" height:100%;">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="fa fa-check">
                                                <strong> ĐANG THEO DÕI</strong>
                                            </i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="remove-friend.php" method="POST">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                        <a class="dropdown-item" href="update-profile.php">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fa fa-ban"> BLOCK</i>
                                                            </button>
                                                        </a>
                                                    </form>
                                            </li>                                    
                                        </ul>
                                    </div>
                                </div> -->

                                <div class="col-12 " style="height:123px; background:pink;"></div>
                                <!--------DisplayName Following Follower Type-------------------------->
                                <div class="col-12" style="height:87px; background:white; ">
                                    <ul  class="d-flex  flex-row bd-highlight "  style="  margin-left:0px; height:100%;">
                                        <!------DISPLAYNAME-------->
                                        <?php if($profile['id'] == $currentUser['id']): ?>
                                        <li align="center" class="list-group-item  p-3 bd-highlight  "  style="border-bottom:0; border-right:0; background:white;  color:black; height:100%; width:280px; font-weight:bold;">Tên hiển thị  <a href="update-profile.php"><i class="fa fa-pencil "></i></a><br>
                                                    <p align="center" style="font-weight:bold; color:red; font-size:22px;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php else: ?>
                                        <li align="center" class="list-group-item p-3 bd-highlight " style="border-bottom:0; border-right:0; background:white; color:black; height:100%; width:290px; font-weight:bold; font-size:20px;">Tên hiển thị<br>
                                                    <p align="center" style="font-weight:bold; color:red; font-size:22px;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php endif; ?>
                                        <!----------FOLLOWING---------->
                                        <li align="center" class="list-group-item  p-3 bd-highlight" style="border-bottom:0; border-right:0; background:white; color:black; height:100%; width:165px; font-weight:bold;">
                                                
                                                <a href="friend-list.php?id=<?php echo $userId;?>"  >
                                                    Bạn Bè<br>
                                                    <p align="center" >
                                                        <span class="badge badge-primary badge-pill "><?php echo $test; ?></span>
                                                    </p>
                                                </a>  
                                                                                                                                                                   
                                        </li>
                                        <!----------FOLLOWER---------->
                                        <li align="center" class="list-group-item border-1 " style="border-bottom:0; background:white; color:black; height:100%; width:165px; font-weight:bold;">Người theo dõi<br>
                                            <p align="center" style="font-weight:bold; color:red;">
                                                 <span class="badge badge-primary badge-pill "><?php echo $test; ?></span>
                                            </p>
                                        </li>
                                        <!----------TYPE---------->
                                        <?php if($currentUser != $profile): ?>
                                        <li align="center" class="list-group-item d-flex align-items-center  p-3 bd-highlight dropdown" style="border-bottom:0; border-left:0; background:white; float:right; margin:0 0 0 0;  height:100%;">
                                                    
                                                        <?php if ($isFollower && $isFollowing): ?>
                                                            <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-check"> ĐANG THEO DÕI</i> 
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                <form action="remove-friend.php" method="POST">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                    <a class="dropdown-item" href="update-profile.php">
                                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-ban"> BLOCK</i></button>
                                                                    </a>
                                                                </form>
                                                            </div>

                                                            
                                                        <?php else: ?>
                                                            <?php if($isFollowing && !$isFollower): ?>

                                                                <form action="remove-friend.php" method="POST">
                                                                    <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fa fa-times"> XÓA YÊU CẦU</i> 
                                                                    </button>
                                                                </form>
                                                            <?php endif; ?>


                                                            <?php if(!$isFollowing && $isFollower): ?>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <form action="add-friend.php" method="POST">
                                                                            <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                            <button type="submit" class="btn btn-success">
                                                                                <i class="fa fa-check"> ĐỒNG Ý</i>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <form style="margin-top:7px;" action="remove-friend.php" method="POST">
                                                                            <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                                            <button type="submit" class="btn btn-danger">
                                                                                <i class="fa fa-times"> TỪ CHỐI</i>
                                                                            </button>
                                                                        </form>
                                                                    
                                                                    </div>
                                                                    
                                                                    
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




