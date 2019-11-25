<?php
    require_once 'init.php';
    require_once 'functions.php';
    $posts = getNewFeeds();

?>
<?php include 'header.php'; ?>
<!--     
    <div class="container">
        
            <div class="container "> -->

<div class="container">
    
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

    <!-----
        <div class="row justify-content-center">
            <div class="col-4">
                One of two columns
            </div>
            <div class="col-4">
                One of two columns
            </div>
        </div>
    --->

    <!--------ERRROR----------->
    <div class="row">
        <?php foreach ($posts as $post): ?>
            <!-- <p> <img src="img/avatars/avatar<?php echo $post['displayName'];?>.jpg" alt=""></p>
            <p> <?php echo $post['displayName'];    ?>  </p>
            <p> <?php echo $post['content'];        ?>  </p>
            <p> <?php echo $post['createAt'];       ?>  </p> -->
            <div class="container">            
                <div class="row">               
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

            </div>
        <?php endforeach ?>
    </div>

</div>

<?php else: ?>

    <!-- <div class="container-fluid " >
            
            <h1></h1>
            <h2 align="center">PERSONAL INFORMATION</h2>    
            <h2>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
            </h2>  

            
    </div> -->
    <div class="container">
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

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>            </div>
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
      </div>

      
<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="cont"> 

                <div class="form sign-in">
                <h2>Welcome back,</h2>

                <label>
                <span>Email</span>
                <input type="email" />
                </label>

                <label>
                <span>Password</span>
                <input type="password" />
                </label>

                <p class="forgot-pass">Forgot password?</p>

                <button type="button" class="submit">Sign In</button>
                <button type="button" class="fb-btn">Connect with <span>facebook</span></button>

                </div> 

                <div class="sub-cont">

                <div class="img" >
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                
                <div class="img__btn">
                    <script src="js.js"></script>

                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
                </div> 
                <div class="form sign-up">
                <h2>Time to feel like home,</h2>
                <label>
                    <span>Name</span>
                    <input type="text" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" />
                </label>
                <button type="button" class="submit">Sign Up</button>
                <button type="button" class="fb-btn">Join with <span>facebook</span></button>
                </div> 
                </div> 

                </div> 







<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php endif ?>




