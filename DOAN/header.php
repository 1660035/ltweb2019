<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>STRANDING </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>


  <?php

    $postNotifications = getNotifications($currentUser['id'], 0);


    $rowCount = count($postNotifications);


    $getListFriends = getListFriend($currentUser['id']);

    $rowCount_1 = count($getListFriends);



    
  ?>


  <body>
  <!-- navbar-dark bg-dark -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg    "  style="background:url('img/posts/neon_backlight_wall_127757_3840x2400.jpg');">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <img src="img/icons/pie-chart.png" style="padding:8px; margin-right:0px;"  class="navbar-brand" alt="">
          <a class="navbar-brand" style="font-size:16px; " href="index.php"><p style="color:white;">1660035 - 1660041</p></a>
          
                   
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <form action="find-user.php" method="POST" enctype="multipart/form-data">

                <!-- <form class="form-inline " > -->
                  <input  class="form-control "  style="  border-radius: 30px; 
                                                          border: 1.5px solid red;  
                                                          border-color: red; 
                                                          height:40px; 
                                                          margin: 5px 10px 5px 0; 
                                                          width:250px; 
                                                          text-align:center;
                                                          "  
                                                type="search" 
                                                placeholder="Search" 
                                                aria-label="Search"
                                                id="search" name="search">

                  <!-- <button class="btn btn-outline-success " type="submit">Search</button>                      -->
                  <a href="#"  style=" position: absolute; right: 30px; margin-top:-35px;">
                    <i class="fa fa-search" style="color:black;"></i>
                  </a>

              </form>
            </li>
            <?php if (!$currentUser): ?>
              <li class="nav-item <?php echo $page == 'login' ? 'active' : ''?> ">
                <a  style="color:white;" class="nav-link" href="login.php">LOGIN</a>
              </li>
              <li class="nav-item <?php echo $page == 'register' ? 'active' : ''?> ">
                <a style="color:white;" class="nav-link" href="register.php">REGISTER</a>
              </li>
            <!---DANG DANG NHAP USER--->
            <?php else: ?>
              
              <!-----------------26-11-->  
              
              

              <li class="nar-item dropdown">
                <button style="color:white; margin:5px 15px 0 5px; border-radius:30px; background-color:#009999;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                  <!-- <i  class="fa fa-commenting-o ">(<?php echo $rowCount_1;?>)</i> -->
                  <i  class="fa fa-commenting-o "></i>

                </button>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:360px;">
                    <a class="dropdown-item" style="margin-bottom:5px;">Messages !</a>

                    <a class="dropdown-item " >
                      <div class="overflow-auto card" style="overflow-y:auto;  height:300px; background-color: transparent;">
                      
                        <div class="card-body" >
                        <?php foreach($getListFriends as $gt): ?>
                        
                            <div  id="toast10" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                                <div class="toast-header">
                                    <img src="<?php echo $gt['avatar']; ?>" style="width:22px; height:22px;" class="rounded-circle" alt="">
                                    <strong style="margin-left:5px; font-size:14px;" class="mr-auto"><?php echo $gt['displayName']; ?></strong>  
                                      
                                      
                                      
                                      <i style="color:red;" class="fa fa-circle ml-2 mb-1"></i>



                                     
                
                                </div>
                                <div class="toast-body" id="sam" name="sam" style="font-size:12px;">

                                   

                                    <?php if(checkValueMessage($gt['id'], $currentUser['id'])): ?>
                                    <?php $lastone = getMessagesOneLastTime($currentUser['id'], $gt['id']); ?>

                                                      <a href="chat.php?id=<?php echo $gt['id']; ?>" name="chatchat" id="chatchat " style="color:black; text-decoration: none;" ><?php echo $lastone['content']; ?></a>
                                                      <?php else: ?>
                                                      <?php $lastone = getMessagesOneLastTime($currentUser['id'], $gt['id']); ?>

                                                      <a href="chat.php?id=<?php echo $gt['id']; ?>" name="chatchat" id="chatchat " style="color:black; text-decoration: none;" >NULL</a>
                                                      <?php endif; ?>


                                </div>

                            </div>
                        <?php endforeach ?>
                        </div>
                      </div>

                    </a>

                </div>
                
              </li>







              <li class="nav-item ">
                <img style= "width: 40px; height:40px; margin-top:5px;" class="rounded-circle" src="<?php echo $currentUser['avatar'];?>" >
              </li>
              <!-- <li class="nav-item <?php echo $page == 'logout' ? 'active' : ''?> "> -->
                <!-- <a class="nav-link" href="logout.php">LOGOUT <?php echo $currentUser ? ' (' . $currentUser['displayName'] . ') ' : '' ?></a> -->
                <!-- <a class="nav-link" href="logout.php"><?php echo $currentUser ? ' (' . $currentUser['displayName'] . ')' : '' ?></a> -->
                <!-- <a class="nav-link" href="logout.php"><?php echo $currentUser ?   $currentUser['displayName']  : '' ?></a>
              </li> -->
              <li class="nav-item dropdown">
                <a style="color:white; " class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $currentUser ?   $currentUser['displayName']  : '' ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- <a class="dropdown-item" href="update-profile.php">Profile</a> -->
                  <a class="dropdown-item btn btn-success" href="test.php?id=<?php echo $currentUser['id'];?>">Personal Page</a>
                                                               

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item btn btn-danger" href="logout.php">LogOut</a>
                </div>
              </li>

              <li class="nar-item dropdown">
                <button style="margin:5px 0 0 5px; border-radius:30px; background-color:#009999;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                  <i class="fa fa-bell">(<?php echo $rowCount;?>)</i>
                </button>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:480px;">
                    <a class="dropdown-item" style="margin-bottom:5px;">You have no notification!</a>

                    <?php foreach($postNotifications as $posttest): ?>
                        <?php $userSendRequest = findUserById($posttest['userId1']); ?>

                    <a class="dropdown-item " >
               
                     


                      <div class="form-row align-items-center">
                        <div class="col-auto my-1" style="width:200px;">
                          <a href="test.php?id=<?php echo $userSendRequest['id'];?>" style="margin-left:10px;">
                            <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $userSendRequest['avatar'];?>" >
                              <?php echo   $userSendRequest['displayName'] ;?>
                          </a>
                        </div>  
                        

                        <div class="col-auto my-1">
                          <form action="add-friend-notifi.php" method="POST" style="padding-left:60px;">
                                      <input type="hidden" name="id" id="id" value="<?php echo $userSendRequest['id']; ?>">
                                      <button type="submit" class="btn btn-success">
                                          <i class="fa fa-check"> Add</i>
                                      </button>
                          </form>
                        </div>

                        <div class="col-auto my-1">
                          <form style="" action="remove-friend-notifi.php" method="POST">
                                      <input type="hidden" name="id" id="id" value="<?php echo $userSendRequest['id']; ?>">
                                      <button type="submit" class="btn btn-danger">
                                          <i class="fa fa-times"> Deny</i>
                                      </button>
                          </form> 
                        </div>

                      </div>
                
                    </a>                                                            
                    <div class="dropdown-divider"></div>
                    
                    <?php endforeach ?>   
                                                        
                </div>              
              </li>




              <!-- <li class="nav-item dropdown" style="margin:7px 0 0 7px;">
                <i class="fa fa-bell fa-2x nav-link dropdown-toggle" href="#" id="navbarDropdown"  data-toggle="dropdown" ></i>


                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item btn btn-success" href="test.php?id=<?php echo $currentUser['id'];?>"">Trang cá nhân</a>
                                                              
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item btn btn-danger" href="logout.php">LogOut</a>
                </div>

              </li> -->



            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
   