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

?>
<?php include 'header.php'; ?>




<!-- position: relative; -->
<div style="height:320px; width:100%; ">

    <div class="card" style="background:white; ">
                    <div style="height:253px; backgroud:blue; z-index:0;">
                        <img src="img/header/Twitter-Cover-Photo-26-1500x500_1366x277.jpg" style="width:100%; height:253px; object-fit: cover;" alt="">
                    </div>
        
                    <!-- <div class="container" style="height:67px;   ">
                        
                        <ul  class="d-flex flex-wrap"  style=" margin-left:400px; height:100%;">

                                <li align="center" class="list-group-item border-0" style=" height:100%; font-weight:bold;">News<br>
                                <p align="center" style="font-weight:bold; color:red;">13.7N</p>
                                </li>
                                <li align="center" class="list-group-item border-0" style=" height:100%; font-weight:bold;">Following<br>
                                <p align="center" style="font-weight:bold; color:red;">57</p>
                                </li></li>
                                <li align="center" class="list-group-item border-0" style=" height:100%; font-weight:bold;">Follower<br>
                                <p align="center" style="font-weight:bold; color:red;">750</p>
                                </li></li>
                                <li align="center" class="list-group-item border-0" style=" height:100%" font-weight:bold;>Like<br>
                                <p align="center" style="font-weight:bold; color:red;">11.2K</p>
                                </li></li>
                                <li align="center" class="list-group-item border-0 " style="float:right; margin-left: 150px;  height:100%;">
                                    <button type="submit" class="btn btn-primary" style="padding:0px; margin: 12px 0 0 0; width:47px;">Follow</button>
                                </li>
                        </ul>   

                    </div> -->




<!-- <ul class="caption-style-4 ">
            <li>
                <img style= "width:240px" class="rounded-circle" src="img/avatars/25188427_891003521066010_907981000_n.jpg" >
                <div class="caption rounded-circle">
                    <div class="blur"></div>
                    <div class="caption-text">
                        <h1>Amazing Caption</h1>
                        <p>Lorem Ipsum Dolor Set Amet</p>
                    </div>
                </div>
            </li>			
        </ul> -->


            
            <!-- <div class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $currentUser ?   $currentUser['displayName']  : '' ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="update-profile.php">Profile</a>
                        <a class="dropdown-item" href="mainpage.php">Main</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">LOGOUT</a>
                    </div>
                </li>
            </div> -->

            



                

                    <div class="container" style="height:67px; z-index:1; "> 
                        <div class="row " style="height:100%;">

                            <div class="col-md-4 col-sm-4 " style="z-index:2; margin: -60px 0 0 0; padding-left:60px;">
                                <div class="showcase-left">
                                        <img style= "width:210px" class="rounded-circle" src="<?php echo $currentUser['avatar'];?>" >
                       </div>
                            </div>

                           <div class="col-md-8 col-sm-8 " style="height:67px;">
                                    <!---->
                                    
                                    <ul  class="d-flex flex-wrap"  style="  margin-left:0px; height:100%;">

                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">NEWS<br>
                                            <p align="center" style="font-weight:bold; color:red;">13.7N</p>
                                        </li>
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">FOLLOWING<br>
                                            <p align="center" style="font-weight:bold; color:red;">57</p>
                                        </li></li>
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">FOLLOWER<br>
                                            <p align="center" style="font-weight:bold; color:red;">750</p>
                                        </li></li>
                                        <li align="center" class="list-group-item border-0" style="background:white; color:black; height:100%; font-weight:bold;">LIKE<br>
                                            <p align="center" style="font-weight:bold; color:red;">11.2K</p>
                                        </li></li>


                                        <!--Join User Friend (1.Friend[Friend, Delete], 2.Invite[Y, N], 3.Else[Follow])-->
                                            <!--------------->
                                            <!-- <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <i class="fa fa-rss" aria-hidden="true"></i> -->

                                       
                                        
                                        <li align="center" class="list-group-item border-0 dropdown" style="background:white; float:right; margin-left: 150px;  height:100%;">
                                            <!-- <button type="submit" class="btn btn-primary" style=" padding:0px; margin: 7px 0 0 0; width:100px; height:35px;">  
                                                <p style="font-size:20px;" >Follow</p>                                         
                                            </button> -->

                                            <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <?php echo $currentUser ?   $currentUser['displayName']  : '' ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        
                                                <a class="dropdown-item" href="update-profile.php">Profile</a>
                                                <a class="dropdown-item" href="mainpage.php">Main</a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="logout.php">LOGOUT</a>
                                            </div>



                                        </li>



                                    </ul>   
                                    <!---->
                            </div>


                        </div>
                    </div>
    </div>

    <!-- <div style=" margin: 0 0 0 510px; padding-top: 130px;  z-index:1;">
        <img style= "width:240px" class="rounded-circle" src="img/avatars/25188427_891003521066010_907981000_n.jpg" >
    </div> -->





      
</div>

<!-- <div style="  margin: 0 0 0 510px; padding-top: 130px;">
    <img style= "width:240px" class="rounded-circle" src="img/avatars/25188427_891003521066010_907981000_n.jpg" >


</div> -->


<div class="container" style="margin-top:130px;">
    <?php if($currentUser):     ?>

        <div class="container" >
            <div class="row ">
                <div class="col-md-8 col-sm-8 ">
                    <div class="row ">
                        <div class="col-12" style="width:100%;">
                            <div class="card" >                        
                                <form action="create-post.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group green-border-focus">                             
                                        <label for="content " style="padding:10px;">Information</label>
                                        <textarea name="content" id="content"  class="form-control"  rows="4" placeholder="What do you think? What do you think? What do you think?"></textarea>
                                        <input type="file" class="form-control-file " id="avatar" name="avatar"  style=" border-radius: 25px; padding:10px;">
                                    </div>                           
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">POST</button> 
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="showcase-left ">
                        <div class="card" >                        
                            <form action="create-post.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group green-border-focus">                             
                                    <label for="content " style="padding:10px;">Information</label>
                                    <textarea name="content" id="content"  class="form-control"  rows="4" placeholder="What do you think? What do you think? What do you think?"></textarea>
                                    <input type="file" class="form-control-file " id="avatar" name="avatar"  style=" border-radius: 25px; padding:10px;">
                                </div>                           
                                <button type="submit" class="btn btn-primary btn-lg btn-block">POST</button> 
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <div class="row " >
                        <div class="col-12" style="width:380px;  " >
                            <div class="card">
                                <div class="card-body">
                                    <img  class="card-img-top" src="img/pexels-photo-2506923.jpeg" >                              
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-8"><br></div>
                <div class="col-md-4 col-sm-4 "><div class="row"><br></div></div>
            </div>
        </div>

        <div class="container">
            <div class="row"> 
                <div class="col-md-8 col-sm-8">
                    <?php foreach ($posts as $post):    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card" >
                                    <div style="font-weight:bold; font-size:18px;" class="card-body">
                                        <img style= "width: 40px" class="rounded-circle" src="<?php echo $post['avatar'];?>" >
                                        <?php echo $post['displayName'];       ?>                                            
                                    </div>                        
                                    <img  class="card-img-top" src="<?php echo $post['imagePost'];?>"  >
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $post['content'];       ?>  </p>
                                        <div style="font-weight:bold; font-size:12px;">
                                            <?php echo $post['createAt'];       ?>  
                                        </div>
                                    </div>                                                                            
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <br>
                        </div>
                    <?php endforeach ?>   
                </div>             
                <div class="col-md-4 col-sm-4 ">
                    <div class="row " >
                        <div class="col-12" style="width:380px;">
                            <div class="card " >
                                <div class="card-body">
                                    <img  class="card-img-top" src="img/posts/anime-girl-car-drinking-coffee-co.jpg" >                              
                                    <h5 class="card-title">
                                        <img style= "width: 100px" class="card-img-top" src="<?php echo $post['avatar'];?>" class="card-img-top" alt="<?php echo $post['displayName']; ?>">
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?php echo $post['displayName'];       ?>
                                    </h6>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?php echo $post['createAt'];       ?>
                                    </h6>
                                    <?php echo $post['content'];       ?>  </p>
                                </div>
                            </div>
                            <a class="btn btn-default btn-lg showcase-btn">Read More</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    <?php endif ?>
</div>



<!-- <div style="position:relative; z-index:1; margin: 0 0 0 510px; padding-top: 130px;" class="rounded-circle">


</div> -->



<!-- <div style="position:relative; z-index:1; margin: 0 0 0 510px; padding-top: 130px;" >
        <ul class="caption-style-4 ">
            <li>
                <img style= "width:240px" class="rounded-circle" src="img/avatars/25188427_891003521066010_907981000_n.jpg" >
                <div class="caption rounded-circle">
                    <div class="blur"></div>
                    <div class="caption-text">
                        <h1>Amazing Caption</h1>
                        <p>Lorem Ipsum Dolor Set Amet</p>
                    </div>
                </div>
            </li>			
        </ul>
</div>  -->



