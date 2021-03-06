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

?>
<?php include 'header.php'; ?>
<?php include 'sum.php'; ?>

<!---------------------------
    FORM 1
    ----------------------->



<!---------------------------
    FORM 2
    ----------------------->
<div class="row" style="background:url('img/bg3.jpeg');">
    <div class="col-12">
    
   
<div class="container" style="margin-top:50px; ">
    <div class="row">
        <div class="col-md-9 col-sm-9">
            <div class="row">
                <div class="col-12">
                    <div class="card" >                        
                        <form action="create-post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group green-border-focus"> 
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <label for="content " style="padding:10px;">Information</label>
                                    </div>
                                    <div class="col-auto my-1">
                                    <?php if($profile['id'] == $currentUser['id']): ?>
                                        <select  class="custom-select mr-sm-2" name="inlineFormCustomSelect" id="inlineFormCustomSelect">
                                            <!-- <option selected>Choose Primacy</option> -->
                                            <option  value="1">Public</option>
                                            <option  value="2">Friend</option>
                                            <option  value="3">Only</option>
                                        </select>
                                    <?php else: ?>
                                        <select  class="custom-select mr-sm-2" name="inlineFormCustomSelect" id="inlineFormCustomSelect">
                                            <!-- <option selected>Choose Primacy</option> -->
                                            <option  value="1">Public</option>
                                            <option  value="2">Friend</option>                                            
                                        </select>
                                    <?php endif; ?>

                                    </div>                                        
                                </div>                                
                                <textarea name="content" id="content"  class="form-control"  rows="4" placeholder="What do you think? What do you think? What do you think?"></textarea>
                                <input type="file" class="form-control-file " id="avatar" name="avatar"  style=" border-radius: 25px; padding:10px;">
                            </div>                           
                            <button type="submit" class="btn btn-primary btn-lg btn-block">POST</button> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <br>
                </div>
            </div>
            <div class="row">
                <?php foreach ($posts1 as $post):    ?>                                    
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" >
                                    <div style="font-weight:bold; font-size:18px;" class="card-body">
                                        <!-- <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $post['avatar'];?>" >
                                        <a href="test.php?id=<?php echo $post['userId'];?>"><?php echo $post['displayName'];       ?> </a>  
                                        <?php if($post['privacy'] == 1): ?>
                                            <i class="fa fa-globe" ></i>
                                        <?php elseif($post['privacy'] == 2): ?>
                                            <i class="fa fa-users" ></i>
                                        <?php else: ?>
                                            <i class="fa fa-lock"></i>
                                        <?php endif; ?> -->

                                        <div class="form-row align-items-center">
                                            <div class="col-auto my-1">
                                                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $post['avatar'];?>" >
                                            </div> 

                                            <div class="col-auto my-1">
                                                <a href="test.php?id=<?php echo $post['userId'];?>"><?php echo $post['displayName'];       ?> </a>  
                                            </div>  

                                            <div class="col-auto my-1">
                                                <?php if($post['privacy'] == 1): ?>
                                                    <i class="fa fa-globe" ></i>
                                                <?php elseif($post['privacy'] == 2): ?>
                                                    <i class="fa fa-users" ></i>
                                                <?php else: ?>
                                                    <i class="fa fa-lock"></i>
                                                <?php endif; ?>
                                                                                        
                                            </div>    
                                            <div class="col-auto my-1">
                                                <?php if($profile['id'] == $currentUser['id']): ?>
                                                <form action="change-privacy.php" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control-file " id="postIdChangePrivacy" name="postIdChangePrivacy" style="display:none;" value="<?php echo $post['stt'];?>">                            
                                                        <select onchange="this.form.submit()"  class="custom-select mr-sm-2" name="inlineFormCustomSelect" id="inlineFormCustomSelect">
                                                            <!-- <option selected>
                                                                <?php if($post['privacy'] == 1): ?>
                                                                    Public
                                                                <?php elseif($post['privacy'] == 2): ?>
                                                                    Friend
                                                                <?php else: ?>
                                                                    Only
                                                                <?php endif; ?>
                                                            </option>
                                                            <option  value="1">Public</option>
                                                            <option  value="2">Friend</option>
                                                            <option  value="3">Only</option> -->

                                                            <?php if($post['privacy'] == 1): ?>                                                        
                                                                <option selected>Public</option>
                                                                <option  value="2">Friend</option>
                                                                <option  value="3">Only</option>
                                                            <?php elseif($post['privacy'] == 2): ?>                                                
                                                                <option selected>Friend</option>
                                                                <option  value="1">Public</option>
                                                                <option  value="3">Only</option>
                                                            <?php else: ?>
                                                                <option selected>Only</option>
                                                                <option  value="1">Public</option>
                                                                <option  value="2">Friend</option>
                                                            <?php endif; ?>


                                                        </select>
                                                </form>
                                                <?php endif; ?>  

                                            </div>                                        
                                        </div>                                
                                    </div>                        
                                    <img style="width:100%; max-height:387px;"   class="card-img-top" src="<?php echo $post['imagePost'];?>"  >
                                    <div class=" ">
                                        <script src="js.js"></script>                                        
                                            <?php $listCurrentUserLike = checkLikeFromUser($post['stt'], $currentUser['id']); ?>                                            
                                                <?php if ($listCurrentUserLike): ?>    
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto my-1">
                                                        <form style="margin:10px 0 0 10px;   " action="unlike.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control-file " id="unlike" name="unlike" style="display:none;" value="<?php echo $post['stt'];?>">                            
                                                            <label for="unlike">        
                                                                <button type="submit"  ><i  onclick="myFunction1(this)" class="fa fa-thumbs-up fa-2x"></i></button>
                                                            </label>
                                                        </form>
                                                    </div>       
                                                    <div class="col-auto my-1">          
                                                        <form style=" margin:10px 0 0 0px; width:50px;"  action="show-all-comment.php" method="POST" >
                                                            <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $post['stt'];?>">   
                                                            <label for="commnetbutton">        
                                                                <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>
                                                            </label>                                                
                                                        </form>
                                                    </div>                                                       
                                                </div>                                        
                                                <?php else: ?>
                                                    <div class="form-row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <form style="margin:10px 0 0 10px;" action="like.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control-file " id="like" name="like" style="display:none;" value="<?php echo $post['stt'];?>">                            
                                                                <label for="like">        
                                                                    <button type="submit"  ><i  onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i></button>
                                                                </label>
                                                            </form>
                                                        </div>
                                                        <div class="col-auto my-1">
                                                            <form  action="show-all-comment.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $post['stt'];?>">   
                                                                <label for="commnetbutton">        
                                                                    <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>
                                                                </label>                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <p style="margin:10px 0 0 10px;" class="card-text"><?php echo $post['content'];       ?>  </p>
                                                <p  style="margin:5px 0 0 10px; font-weight:bold; font-size:12px;"><?php echo $post['createAt'];       ?>  </p> 
                                                
                                                <div class="overflow-auto card " style="overflow-y:auto;  height:130px;">
                                                    <?php $get_Comment =getComments($post['stt']); ?>                                                
                                                    <?php foreach($get_Comment as $check): ?>                                                                                            
                                                        <div style="font-weight:bold; height-line:3px; word-wrap: break-word; font-size:14px; padding:10px 0 0 10px; " >
                                                            <?php if($currentUser['id'] == $check['userId']): ?>
                                                                <i style=" " class="fa fa-times"></i>                                        
                                                                <a style="margin-left:5px;" href="test.php?id=<?php echo $check['userId'];?>"> 
                                                                <img style= "width: 25px; height:25px;" class="rounded-circle" src="<?php echo $check['avatar'];?>" >                                                              
                                                                <?php echo $check['displayName'];  ?>   </a> 
                                                                <?php echo $check['content'];       ?>  
                                                            <?php else: ?>
                                                                <i style=" " class="fa fa-times"></i>
                                                                <a style="margin-left:5px;" href="test.php?id=<?php echo $check['userId'];?>">                                                         
                                                                <img style= "width: 25px; height:25px;" class="rounded-circle" src="<?php echo $check['avatar'];?>" >      
                                                                <?php echo $check['displayName'];  ?>   </a> 
                                                                <?php echo $check['content'];       ?>                                                                                                          
                                                            <?php endif; ?>
                                                        </div>                                                                                                                                                        
                                                    <?php endforeach ?>                                                
                                                </div> 

                                                <form action="comment.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" class="form-control-file " id="postId" name="postId" style="display:none;" value="<?php echo $post['stt'];?>">                                      
                                                        <input style="margin:10px 0 0 0;" id="comment" name="comment" type="text" class="form-control" placeholder="Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">                                               
                                                </form>
                                    </div>                                                                            
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <br>
                            </div>
                        </div>
                    </div>                
                <?php endforeach ?>
            </div>
        </div> 

        <!-- <div class="col-md-3 col-sm-3">
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
        </div> -->
        <div class="col-md-3 col-sm-3 "  >
           
                
               
            <!-- <div class="row" style=" position:fixed;">
                <div class="col-12"> -->
                    <div class="row " >                
                        <div class="col-12" style="width:380px;  " >
                            <!-- <div class="" style="background-color: transparent;">
                                <div class="card-body" >
                                    <img  class="card-img-top" src="img/pexels-photo-2506923.jpeg" >                              
                                </div>
                            </div>                       -->


                            <div class="overflow-auto  card" style="overflow-y:auto;  height:300px;">
                                <div class="card text-center">
                                    <div class="card-header">
                                        <h2>Notifications</h2>
                                    </div>
                                </div>
                                <div class="card-body" >
                                <?php $get_test =  getNotificationsLikeByPost($currentUser['id']); ?>
                                        <?php foreach($get_test as $gt):  ?>
                                        

                                        <div id="toast4" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                            <div class="toast-header">
                                                <img src="<?php echo $gt['avatar']; ?>" style="width:20px; height:20px;" class="rounded-circle" alt="">
                                                <strong style="margin-left:5px;" class="mr-auto"><?php echo $gt['displayName']; ?></strong>
                                                <small ><?php echo $gt['createAt']; ?></small>
                                                <!-- <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button> -->

                                                <form style="" action="toast.php" method="POST" enctype="multipart/form-data">                                
                                                    <input type="hidden" class="form-control-file " id="test1" name="test1" style="display:none;" value="<?php echo $currentUser['id'];?>">   
                                                    <input type="hidden" class="form-control-file " id="test2" name="test2" style="display:none;" value="<?php echo $gt['userId2'];?>">                              
                                                    

                                                    <button type="submit" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                        <span onclick="myFunction(this)" aria-hidden="true">×</span>
                                                    </button>
                                                    
                                                </form>

                                            
                                            </div>
                                            <div class="toast-body" id="sam" name="sam">
                                            (Bai Viet <?php echo $gt['postId']; ?>) <?php echo $gt['title']; ?>
                                            </div>
                                        </div>

                                <?php endforeach ?>

                                </div>
                            </div>
                            


                        </div>                 
                    </div>

                    <div class="row" >
                        <br>
                    </div>

                    <div class="row " >                
                        <div class="col-12" style="width:380px;">
                            <div class=" " style="background-color: transparent;">
                                <div class="card-body">
                                    <img  class="card-img-top" src="<?php echo $currentUser['cover']; ?>" >                              
                                    <h5 class="card-title">
                                        <img style= "width: 100px" class="card-img-top" src="<?php echo $currentUser['avatar'];?>" class="card-img-top" alt="<?php echo $currentUser['displayName']; ?>">
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <?php echo $currentUser['displayName'];       ?>
                                    </h6>
                                    <h6 class="card-subtitle mb-2 text-muted" style="font-style: italic;">
                                        <p>Fly Me To The Moon</p>
                                        <p>Let Me Play Among The Stars</p>
                                        <p>Let me see what spring is like</p>
                                        <p>On A-Jupiter And Mars</p>
                                        <p>In Other Words, Hold My Hand</p>
                                        <p>In Other Words, Darling, Kiss Me</p>
                                        <br>

                                    </h6>

                                    


                                    <a href="https://www.youtube.com/watch?v=mQR0bXO_yI8"  target="_blank" class="btn btn-default  showcase-btn">Read More</a>






                                </div>
                            </div>

                        </div>                 
                    </div>
                <!-- </div>

            </div> -->


            


        </div>
    </div>

</div>


 </div>
</div>

<?php include 'footer.php'; ?>