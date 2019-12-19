<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
    


    
    $postposet = $_POST['commnetbutton']; 

    //$listFriend = getFriendNewFeeds($currentUser['id']);


    $getpost = getPosts($postposet);
   
    $check =  getComments($postposet);
   
?>




<?php include 'header.php'; ?>

<div class="container" style="margin-top:150px; ">


    <div class="row">
            <div class="col-md-8 ol-sm-8">
                <div class="card" >
                    <img style=""   class="card-img-top" src="<?php echo $getpost['imagePost'];?>"  >
                </div>
            </div>

            <div class="col-md-4 col-sm-4" >
                <div class="row">
                     <div class="col-12">
                        <div class="card" >
                            <div style="font-weight:bold; font-size:18px;" class="card-body">
                                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $getpost['avatar'];?>" >
                                <a href="test.php?id=<?php echo $getpost['userId'];?>"><?php echo $getpost['displayName'];       ?> </a>                                             
                            </div> 
                        </div>                    

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    <?php foreach($check as $test): ?>
                    
                            <div style="font-weight:bold; font-size:18px;" class="card-body">
                                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $test['avatar'];?>" >
                                <a href="test.php?id=<?php echo $test['userId'];?>"><?php echo $test['displayName'];       ?> </a>       
                                <p style="margin:10px 0 0 10px;" class="card-text"><?php echo $test['content'];       ?>  </p>
                                      
                            </div> 

                    <?php endforeach ?>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">

                                                        <script src="js.js"></script>
                                                    
                                                            <?php $listCurrentUserLike = checkLikeFromUser($getpost['stt'], $currentUser['id']); ?>
                                                        
                                                            <?php if ($listCurrentUserLike): ?>
                                                                <form style="margin:10px 0 0 10px;" action="unlike.php" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control-file " id="unlike" name="unlike" style="display:none;" value="<?php echo $getpost['stt'];?>">                            
                                                                    <label for="unlike">        
                                                                        <button type="submit"  ><i  onclick="myFunction1(this)" class="fa fa-thumbs-up fa-2x"></i></button>

                                                                    </label>

                                                                    
                                                                    <!-- <a href="show-all-comment.php"><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></a>  -->

                                                                    
                                                                </form>

                                                            <form  action="show-all-comment.php" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $getpost['stt'];?>">   

                                                                        <label for="commnetbutton">        
                                                                            <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>

                                                                        </label>                                                
                                                                </form>

                                                                

                                                            <?php else: ?>
                                                                <form style="margin:10px 0 0 10px;" action="like.php" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" class="form-control-file " id="like" name="like" style="display:none;" value="<?php echo $getpost['stt'];?>">                            
                                                                    <label for="like">        
                                                                            <button type="submit"  ><i  onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i></button>

                                                                    </label>
                                                                    <!-- <a href="show-all-comment.php"><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></a>  -->

                                                                </form>

                                                                <form  action="show-all-comment.php" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $getpost['stt'];?>">   

                                                                        <label for="commnetbutton">        
                                                                            <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>

                                                                        </label>                                                
                                                                </form>
                                                            <?php endif; ?>

                                                            <p style="margin:10px 0 0 10px;" class="card-text"><?php echo $getpost['content'];       ?>  </p>



                                                            <p  style="margin:5px 0 0 10px; font-weight:bold; font-size:12px;"><?php echo $getpost['createAt'];       ?>  </p> 



                                                        <!-- <input style="margin:10px 0 0 0;" type="text" class="form-control" placeholder="Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">                                                -->


                                                        <form action="comment.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control-file " id="postId" name="postId" style="display:none;" value="<?php echo $getpost['stt'];?>">                            
                    
                                                                <input style="margin:10px 0 0 0;" id="comment" name="comment" type="text" class="form-control" placeholder="Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">                                               
                                                            <!-- <button type="submit" class="btn btn-primary btn-lg btn-block">POST</button>  -->
                                                        </form>








                    </div>  
                </div>

            </div>
    </div>

</div>

