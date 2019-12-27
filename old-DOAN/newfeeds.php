<div class="container" style="margin-top:70px;">
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
                    <?php foreach ($posts1 as $post):    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card" >
                                    <div style="font-weight:bold; font-size:18px;" class="card-body">
                                        <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $post['avatar'];?>" >
                                        <?php echo $post['displayName'];       ?>                                            
                                    </div>                        
                                    <img  class="card-img-top" src="<?php echo $post['imagePost'];?>"  >
                                    <div class="card-body">
                                        <div>

                                        
                                            <script src="js.js"></script>
                                            
                                            <!-- <i onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i> -->

                                            <form action="like.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" class="form-control-file " id="like" name="like" style="display:none;" value="1">                            
                                                <label for="like">
                                                    <button type="submit" ><i  onclick="myFunction(this)" class="fa fa-thumbs-o-up fa-2x"></i>

                                                    </button>
                                                </label>

                                            </form>




                                            <i class="fa fa-comment-o fa-2x" style="margin-left:10px;"></i>


                                        </div>

                                        
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




