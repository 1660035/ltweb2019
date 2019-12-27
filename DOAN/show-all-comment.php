<?php 
require_once "init.php";
if(!$currentUser)   {
    header('Location: index.php');
}
?>
<?php
       
    $userId = $_GET['postId'];
    
    //$postposet = $_POST['commnetbutton']; 

    //$listFriend = getFriendNewFeeds($currentUser['id']);


    $getpost = getPosts($userId);
   
    $check =  getComments($userId);

    $getListLikes = getListLike($userId);
   
?>

<?php include 'header.php'; ?>

<div class="container" style="margin-top:150px; ">

    <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="overflow-auto  card" style="overflow-y:auto;  height:300px;">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5>List Likes</h2>
                        </div>
                    </div>
                    <div class="card-body" >
                    <?php foreach($getListLikes as $getLiLi): ?>
                    <div style="font-weight:bold; height-line:3px; word-wrap: break-word; font-size:14px; padding:10px 0 0 0; " >
                        <a style="margin-left:5px;" href="test.php?id=<?php echo $getLiLi['userId'];?>"> 
                            <img style= "width: 25px; height:25px;" class="rounded-circle" src="<?php echo $getLiLi['avatar'];?>" >                                                                  
                            <?php echo $getLiLi['displayName'];  ?>   
                        </a>                                                 
                    </div>                                                        
                    
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6" style="margin:0px; padding:0px;">
                <div class="card" >
                    <img style=""   class="card-img-top" src="<?php echo $getpost['imagePost'];?>"  >
                   
                </div>
            </div>

            <div class="col-md-4 col-sm-4" style="margin:0px; padding:0px;">
                <div class="row">
                     <div class="col-12">
                        <div class="card" >
                            <div style="font-weight:bold; font-size:18px;" class="card-body">
                                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $getpost['avatar'];?>" >
                                <a href="test.php?id=<?php echo $getpost['userId'];?>"><?php echo $getpost['displayName'];       ?> </a>    
                                <?php if($getpost['privacy'] == 1): ?>
                                                <i class="fa fa-globe" ></i>
                                            <?php elseif($getpost['privacy'] == 2): ?>
                                                <i class="fa fa-users" ></i>
                                            <?php else: ?>
                                                <i class="fa fa-lock"></i>
                                            <?php endif; ?>                                         
                            </div> 
                        </div>                    

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                    <!-- <?php foreach($check as $test): ?>
                    
                            <div style="font-weight:bold; font-size:18px;" class="card-body">
                                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $test['avatar'];?>" >
                                <a href="test.php?id=<?php echo $test['userId'];?>"><?php echo $test['displayName'];       ?> </a>       
                                <p style="margin:10px 0 0 10px;" class="card-text"><?php echo $test['content'];       ?>  </p>
                                      
                            </div> 

                    <?php endforeach ?> -->
                    <div class="overflow-auto card " style="overflow-y:auto;  height:190px;">
                    <?php foreach($check as $test): ?>                                                       
                     <div style="font-weight:bold; height-line:3px; word-wrap: break-word; font-size:14px; padding:10px 0 0 10px; " >
                                                            <?php if($currentUser['id'] == $test['userId']): ?>
                                                                <i style=" " class="fa fa-times"></i>                                        
                                                                <a style="margin-left:5px;" href="test.php?id=<?php echo $test['userId'];?>"> 
                                                                <img style= "width: 25px; height:25px;" class="rounded-circle" src="<?php echo $test['avatar'];?>" >                                                                  
                                                                <?php echo $test['displayName'];  ?>   </a> 
                                                                <?php echo $test['content'];       ?>  
                                                            <?php else: ?>
                                                                <i style=" " class="fa fa-times"></i>
                                                                <a style="margin-left:5px;" href="test.php?id=<?php echo $test['userId'];?>">                                                         
                                                                <img style= "width: 25px; height:25px;" class="rounded-circle" src="<?php echo $test['avatar'];?>" >      
                                                                <?php echo $test['displayName'];  ?>   </a> 
                                                                <?php echo $test['content'];       ?>                                                                                                  
                                                            <?php endif; ?>
                                                        </div>                                                                                                                                                          
                                                    <?php endforeach ?>                                                    
                    </div> 




                    <!------------------------>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                            
                                                        <script src="js.js"></script>
                                                    
                                                            <?php $listCurrentUserLike = checkLikeFromUser($getpost['stt'], $currentUser['id']); ?>
                                                        
                                                            <?php if ($listCurrentUserLike): ?>                                                                                                    
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto my-1">
                                                        <span style="margin-left:15px;" class="badge badge-primary badge-pill ">
                                                            <?php $countcount = count(checkLikeFromPost($getpost['stt']));?>
                                                            <?php echo $countcount; ?>
                                                        </span>

                                                    </div>
                                                    <div class="col-auto my-1">
                                                        <form style="margin:10px 0 0 0;   " action="unlike-show.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control-file " id="unlike" name="unlike" style="display:none;" value="<?php echo $getpost['stt'];?>">   

                                                            <label for="unlike">        
                                                                <button type="submit"  ><i  onclick="myFunction1(this)" class="fa fa-thumbs-up fa-2x"></i></button>
                                                            </label>                                                             
                                                        </form>
                                                    </div>       
                                                    <div class="col-auto my-1">          
                                                        <form style=" margin:10px 0 0 0px; width:50px;"  action="show-all-comment.php" method="POST" >
                                                            <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $getpost['stt'];?>">   
                                                            <label for="commnetbutton">        
                                                                <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>
                                                            </label>                                                
                                                        </form>
                                                    </div>                                                       
                                                </div>   
                                                                             
                                            <?php else: ?>
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto my-1">
                                                    <span style="margin-left:15px;" class="badge badge-primary badge-pill ">
                                                            <?php $countcount = count(checkLikeFromPost($getpost['stt']));?>
                                                            <?php echo $countcount; ?>
                                                        </span>

                                                    </div>
                                                    <div class="col-auto my-1">
                                                        <form style="margin:10px 0 0 0;" action="like-show.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control-file " id="like" name="like" style="display:none;" value="<?php echo $getpost['stt'];?>">  
                                                            <input type="hidden" class="form-control-file " id="notiLike" name="notiLike" style="display:none;" value= "1">    
                                                            <input type="hidden" class="form-control-file " id="userPost" name="userPost" style="display:none;" value= <?php echo $getpost['userId'];?>>                            
                        
                          
                                                                  
                                                                <button type="submit"  ><i  onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i></button>
                                                            
                                                        </form>
                                                    </div>
                                                    <div class="col-auto my-1">
                                                        <form style=" margin:10px 0 0 0px;"  action="show-all-comment.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" class="form-control-file " id="commnetbutton" name="commnetbutton" style="display:none;" value="<?php echo $getpost['stt'];?>">   
                                                            <label for="commnetbutton">        
                                                                <button type="submit"  ><i style="color:black; margin-left:5px;" class="fa fa-comment-o fa-2x" ></i></button>
                                                            </label>                                                
                                                        </form>
                                                    </div>
                                                </div>
                                               
                                            <?php endif; ?>
                                                <p style="margin:10px 0 0 10px;" class="card-text"><?php echo $getpost['content'];       ?>  </p>
                                                <p  style="margin:5px 0 0 10px; font-weight:bold; font-size:12px;"><?php echo $getpost['createAt'];       ?>  </p> 
                                                
                                                
                                        <form action="comment-show-all.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control-file " id="postId" name="postId" style="display:none;" value="<?php echo $getpost['stt'];?>">                                    
                                            <input type="hidden" class="form-control-file " id="notiComment" name="notiComment" style="display:none;" value= "2">    
                                            <input type="hidden" class="form-control-file " id="userPost" name="userPost" style="display:none;" value= <?php echo $getpost['userId'];?>>                           
                                            <input style="margin:10px 0 0 0;" id="comment" name="comment" type="text" class="form-control" placeholder="Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">                                               
                                        </form>


                    </div>  
                </div>

            </div>
    </div>

</div>

