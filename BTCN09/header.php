<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <title>Hello, world!</title>
  </head>
  <body>
        
      <!-- <section>
          <div class="container text-center">
              <h2>sadasdkasjdlakjdsalkdjaslkdasjkdaj</h2>
          </div>
      </section> -->
      <!--w-100 justify-content-end-->
       <!-- fixed-top -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark sticky-top">
            <!-- <div class="container"> -->
            <a class="navbar-brand" href="index.php">HCMUS</a>
            <!-- <a class="navbar-brand" href="#">
                <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            </a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
            
                <form class="form-inline  w-100 justify-content-end">
                    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit">Search</button> 
                    
                </form>

                
                <!-- <div class="input-group mb-3 w-100 justify-content-end">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button">Button</button>
  </div>
</div> -->
     
           
                
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item <?php echo $page == 'index' ? 'active' : ''?> " >
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <!----CHUA DANG NHAP USER----->
                    <?php if (!$currentUser): ?>
                        <li class="nav-item <?php echo $page == 'login' ? 'active' : ''?> ">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item <?php echo $page == 'register' ? 'active' : ''?> ">
                            <a class="nav-link" href="register.php">REGISTER</a>
                        </li>
                    <!---DANG DANG NHAP USER--->
                    <?php else: ?>
                        <li class="nav-item <?php echo $page == 'sum' ? 'active' : ''?> ">
                            <a class="nav-link" href="sum.php">SUM</a>
                        </li>
                        <li class="nav-item <?php echo $page == 'update-profile' ? 'active' : ''?> ">
                            <a class="nav-link" href="update-profile.php">CHANGE-PROFILE</a>
                        </li>
                        <li class="nav-item <?php echo $page == 'change-password' ? 'active' : ''?> ">
                            <a class="nav-link" href="change-password.php">CHANGE-PASSWORD</a>
                        </li>
                        <li class="nav-item ">
                            <img style= "width: 40px" class="rounded-circle" src="<?php echo $currentUser['avatar'];?>" >
                        </li>
                        <li class="nav-item <?php echo $page == 'logout' ? 'active' : ''?> ">
                            <!-- <a class="nav-link" href="logout.php">LOGOUT <?php echo $currentUser ? ' (' . $currentUser['displayName'] . ') ' : '' ?></a> -->
                            <a class="nav-link" href="logout.php"><?php echo $currentUser ? ' (' . $currentUser['displayName'] . ') ' : '' ?></a>

                        </li>

                    <?php endif; ?>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->


                </ul>

                <!-- <form class="form-inline  my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                   
                </form> -->

            </div>
    <!---------------------------->

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
                
                
                <!-- </div> -->
        </nav>
        
     

   <section class="content">

    <div class="container">

    