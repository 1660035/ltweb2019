<?php
    require_once 'init.php';
    require_once 'functions.php';
    $posts = getNewFeeds();


    // $userDisplayName = $_POST['displayName'];
    // $profile = findUserByDisplayName($userDisplayName);


    //Hiện thị bài viết của bạn bè

    $listFriend = getFriendNewFeeds($currentUser['id']);
    // $gettest = getFriendNewFeeds($listFriend);


    //Hien thi danh sach cac bai viet ma currentUser da like

    // $listCurrentUserLike = checkLikeFromUser($currentUser['id']);






?>
<?php include 'header.php'; ?>
<div style="background:blue;">

<div class="container">
<?php if($currentUser):     ?>

<!---- ĐĂNG BÀI VIẾT ----->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="showcase-left">
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
            <div class="col-md-4 col-sm-4 ">
                <div class="row position-fixed" >
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

<!---- NEW-FEEDS ----->

    <div class="container">
        <div class="row"> 
            <div class="col-md-8 col-sm-8">
                <?php foreach ($listFriend as $post):   ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" >
                                <div style="font-weight:bold; font-size:18px;" class="card-body">
                                    <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $post['avatar'];?>" >
                                    <a href="test.php?id=<?php echo $post['userId'];?>"><?php echo $post['displayName'];       ?> </a>                                             
                                </div>                        
                                <img  class="card-img-top" src="<?php echo $post['imagePost'];?>"  >
                                <div class="card-body">
                                        <script src="js.js"></script>

                                        
                                            <?php $listCurrentUserLike = checkLikeFromUser($post['stt'], $currentUser['id']); ?>
                                           

                                            <?php if ($listCurrentUserLike): ?>
                                                <form action="unlike.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control-file " id="unlike" name="unlike" style="display:none;" value="<?php echo $post['stt'];?>">                            
                                                    <label for="unlike">        
                                                                    <button type="submit"  ><i  onclick="myFunction1(this)" class="fa fa-thumbs-up fa-2x"></i></button>

                                                    </label>
                                                </form>
                                            <?php else: ?>
                                                <form action="like.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control-file " id="like" name="like" style="display:none;" value="<?php echo $post['stt'];?>">                            
                                                    <label for="like">        
                                                            <button type="submit"  ><i  onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i></button>

                                                    </label>
                                                </form>
                                            <?php endif; ?>


                                                <i class="fa fa-comment-o fa-2x" style="margin-left:10px;"></i>

                                           

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
                <div class="row position-fixed" >
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

<!---- sample ----->

    <!-- <?php foreach ($posts as $post):    ?>

        <div class="container">
            <div class="row">
                
            

                <div class="col-md-8 col-sm-8">
                                <div class="showcase-left">
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
                
            
                    
                <div class="col-md-4 col-sm-4">
                            <div class="showcase-right">
                                    <div class="card">
                                            <div class="card-body">
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

            <div class="row">
                <br>
            </div>
        </div>


    <?php endforeach ?>--->


<?php else: ?>

            <!-- <img style="width:100%;" src="img/pexels-photo-2506923.jpeg" > -->




        <!-- <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-left">
                        <img src="img/image1.jpg">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="showcase-right">
                        <h1>Hands-free help from the Google Assistant</h1>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>            
                    </div>
                    <br>
                    <a class="btn btn-default btn-lg showcase-btn">Read More</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="info-left">
                        <img src="img/image2.png">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="info-right">
                        <h2>Get To Know Google Home</h2>
                        <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                        <br>
                        <a class="btn btn-default btn-lg">Read More</a>
                    </div>
                </div>
            </div>
        </div>  

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="info-left">
                    <h2>Info Block One</h2>
                    <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                
                <div class="col-md-6 col-sm-6">
                    <div class="info-right">
                    <h2>Info Block Two</h2>
                    <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <form>
                    <div class="form-group">
                        <label>Name: </label>
                        <input class="form-control" type="text" name="" value="" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" type="text" name="" value="" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Message: </label>
                        <textarea class="form-control" name="" value="" placeholder="Enter Message"></textarea>
                    </div>
                    <button class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="col-md-7 col-sm-7">

                </div>
            </div>
        </div> -->



    
<!------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php endif ?>


</div>

</div>

