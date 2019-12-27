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
                    
                        <!-- <img src="img/posts/anime-girl-car-drinking-coffee-co.jpg" style="width:100%; height:253px; object-fit: cover;" alt=""> -->
                        <!-- <img src="img/header/pHyPIkU.jpg" style="width:100%; height:253px; object-fit: cover;" alt=""> -->
                        <img src="<?php echo $profile['cover'];?>" style="width:100%; height:253px; object-fit: cover;" alt="">

                        
                        
                        <div style="z-index:1; margin:-240px 0 0 20px;">
                            <!-- <input type="file" class="form-control-file"  id="avatar1" name="avatar1" style="display:none;">

                            <label for="avatar1">
                                <i class="fa fa-camera fa-2x"  ></i>

                            </label> -->



                            <form action="edit-cover.php" method="POST" enctype="multipart/form-data">
                                    <input type="file" class="form-control-file " id="cover" name="cover" onchange="this.form.submit()" style="display:none;">                            
                                    <label for="cover">
                                        <i class="fa fa-camera fa-2x"  ></i>

                                    </label>


                            </form>



                        </div>

                        <div style="z-index:1; float:right;  width:auto; margin: 145px 0 0 0  ;   " >
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-check"><strong> ĐANG THEO DÕI</strong></i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                        <li>
                                        <form action="remove-friend.php" method="POST">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $profile['id']; ?>">
                                                            <a class="dropdown-item" href="update-profile.php">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> BLOCK</i></button>
                                                            </a>
                                                        </form>
                                        </li>
                                        
                                        </ul>
                                    </div>

                                     



                        </div>
                        
                    </div>

                    <div class="container" style="height:77px;  "> 
                        <div class="row " style="height:100%;">

                            <div class="col-md-3 col-sm-3 col " style="margin-top">
                                <div style=" height:210px; ">

                                    <img  style= "max-width:100%;  max-height: 100%; " class="rounded-circle" src="<?php echo $profile['avatar'];?>" >

                                </div>
                            </div>

                           <div class="col-md-9 col-sm-9 " style="height:77px;">
                                    
                                    <ul  class="d-flex  flex-row bd-highlight "  style="  margin-left:0px; height:100%;">
                                        <?php if($profile['id'] == $currentUser['id']): ?>
                                        <li align="center" class="list-group-item  p-3 bd-highlight " style="background:white; color:black; height:100%; width:280px; font-weight:bold;">Tên hiển thị  <a href="update-profile.php"><i class="fa fa-pencil "></i></a><br>
                                            <p align="center" style="font-weight:bold; color:red; font-size:22px;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php else: ?>
                                        <li align="center" class="list-group-item p-3 bd-highlight " style="background:white; color:black; height:100%; width:290px; font-weight:bold; font-size:20px;">Tên hiển thị<br>
                                            <p align="center" style="font-weight:bold; color:red; font-size:22px;"><?php echo $profile['displayName'];?></p>
                                        </li>
                                        <?php endif; ?>

                                        <!-- <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">Tin tức<br>
                                            <p align="center" style="font-weight:bold; color:red;">13.7N</p>
                                        </li> -->
                                        <li align="center" class="list-group-item  align-items-center  p-3 bd-highlight" style=" background:white; color:black; height:100%; width:165px; font-weight:bold;">
                                            <a href="friend-list.php?id=<?php echo $userId;?>"  >
                                                Bạn Bè <span class="badge badge-primary badge-pill ">14</span>
                                            </a>                                           
                                        

                                        </li>
                                        
                                        <li align="center" class="list-group-item border-1 " style="background:white; color:black; height:100%; width:165px; font-weight:bold;">Người theo dõi<br>
                                            <p align="center" style="font-weight:bold; color:red;">750</p>
                                        </li>
                                        



                                        <?php if($currentUser != $profile): ?>


                                        <li align="center" class="list-group-item d-flex align-items-center  p-3 bd-highlight dropdown" style="background:white; float:right; margin:0 0 0 0;  height:100%;">
                                            
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
                             
                             
                             
                            </div>


                        
                        
                        
                        
                        
                        </div>
                    </div>
    </div>

 

      
</div>