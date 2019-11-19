<?php
    require_once 'init.php';
    require_once 'functions.php';
    $posts = getNewFeeds();

?>
<?php include 'header.php'; ?>



<?php if($currentUser):     ?>
    <!-- <p> <?php echo $currentUser['displayName']; ?> </p> -->
    <!-- <p> <?php echo $currentUser['id'];          ?> </p> -->
    <!-- <p> <img src="img/avatars/1.jpg" alt=""></p> -->
    
   
    <div class="row">
            
        <form action="create-post.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="content">Information</label>
                <textarea name="content" id="content"  class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="avatar">Image</label>
                <input type="file" class="form-control-file" id="avatar" name="avatar" >
            </div>
            <button type="submit" class="btn btn-primary">POST</button> 

        </form>
       

        <div class="w-100"></div>

    </div>


    <!--------ERRROR----------->
    <div class="row">

        <?php foreach ($posts as $post): ?>
            <!-- <p> <img src="img/avatars/avatar<?php echo $post['displayName'];?>.jpg" alt=""></p>
            <p> <?php echo $post['displayName'];    ?>  </p>
            <p> <?php echo $post['content'];        ?>  </p>
            <p> <?php echo $post['createAt'];       ?>  </p> -->
            <div class="container">
            
            
                <div class="row">
                <!-- col-12 col-md-8
                col-6 col-md-4 -->
                <div class="col-3 col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <!-- <img style= "width: 100px" class="card-img-top" src="img/avatars/avatar<?php echo $post['userId'];?>.jpg" class="card-img-top" alt="<?php echo $post['displayName']; ?>"> -->
                                <img style= "width: 100px" class="card-img-top" src="<?php echo $post['avatar'];?>" class="card-img-top" alt="<?php echo $post['displayName']; ?>">

                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $post['displayName'];       ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo $post['createAt'];       ?>
                            </h6>
                            <!-- <p class="card-text"><?php echo $post['content'];       ?>  </p> -->

                        </div>
                    </div>
                </div>
                <div class="col-15 col-md-10">
                    <!-- <div calss="card">
                        <div class="card-body">
                        
                            <img style= "width: 600px"  class="card-img-top" src="<?php echo $post['imagePost'];?>" class="card-img-top" >
                        </div>
                    </div> -->

                     <div class="card" >
                     
                        <img  class="card-img-top" src="<?php echo $post['imagePost'];?>"  >
                        <div class="card-body">
                            <p class="card-text"><?php echo $post['content'];       ?>  </p>
                        </div>
                    </div>
                </div>



               

                    
                </div>
                <!-- <div class="card">
                    <img src="img/avatars/avatar<?php echo $post['userId'];?>.jpg" class="card-img-top" alt="<?php echo $post['displayName']; ?>">
                    <div class="card-body">     
                        <h5 class="card-title"><?php echo $post['displayName']; ?>  </h5>
                        <p class="card-text"><?php echo $post['content'];       ?>  </p>
                        <a href="#" class="btn btn-primary">Go somewhere            </a>
                    </div>
                </div> -->

            <?php endforeach ?>
    </div>

</div>



<?php else: ?>

    <div class="container">
            <h1></h1>
            <h2>PERSONAL INFORMATION</h2>      
    </div>
<?php endif ?>


<?php include 'footer.php'; ?>