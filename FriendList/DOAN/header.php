<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>STRANDING </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
  <!-- navbar-dark bg-dark -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg    ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <img src="img/icons/pie-chart.png" style="padding:8px; margin-right:0px;"  class="navbar-brand" alt="">
          <a class="navbar-brand" style="font-size:16px;" href="index.php">Sample Sample</a>
          <a class="navbar-brand" style="font-size:16px;" href="index.php">Main Page</a>
          
          

          <!-- <form class="form-inline  justify-content-end">
            <input class="form-control "  type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success " type="submit">Search</button>                     
          </form> -->
            
            
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <form class="form-inline " >
                  <input  class="form-control "  style="  border-radius: 30px; 
                                                          border: 1.5px solid red;  
                                                          border-color: red; 
                                                          height:40px; 
                                                          margin: 5px 10px 5px 0; 
                                                          width:250px; 
                                                          text-align:center;"  
                          type="search" 
                          placeholder="Search" 
                          aria-label="Search">
                  <!-- <button class="btn btn-outline-success " type="submit">Search</button>                      -->
                        <a href="#" style=" position: absolute;
                                            right: 30px; ;"
                        >
                          <i class="fa fa-search" style="color:black;"></i>
                        </a>

              </form>
            </li>
            <?php if (!$currentUser): ?>
              <li class="nav-item <?php echo $page == 'login' ? 'active' : ''?> ">
                <a class="nav-link" href="login.php">LOGIN</a>
              </li>
              <li class="nav-item <?php echo $page == 'register' ? 'active' : ''?> ">
                <a class="nav-link" href="register.php">REGISTER</a>
              </li>
            <!---DANG DANG NHAP USER--->
            <?php else: ?>
              <!-- <li class="nav-item <?php echo $page == 'sum' ? 'active' : ''?> ">
                <a class="nav-link" href="sum.php">SUM</a>
              </li> -->
              <!-- <li class="nav-item <?php echo $page == 'update-profile' ? 'active' : ''?> ">
                <a class="nav-link" href="update-profile.php">PROFILE</a>
              </li> -->
              <!-- <li class="nav-item <?php echo $page == 'change-password' ? 'active' : ''?> ">
                <a class="nav-link" href="change-password.php">CHANGE-PASSWORD</a>
              </li> -->
              <!-----------------26-11-->  
              
              <li class="nav-item ">
                <img style= "width: 40px; height:40px;" class="rounded-circle" src="<?php echo $currentUser['avatar'];?>" >
              </li>
              <!-- <li class="nav-item <?php echo $page == 'logout' ? 'active' : ''?> "> -->
                <!-- <a class="nav-link" href="logout.php">LOGOUT <?php echo $currentUser ? ' (' . $currentUser['displayName'] . ') ' : '' ?></a> -->
                <!-- <a class="nav-link" href="logout.php"><?php echo $currentUser ? ' (' . $currentUser['displayName'] . ')' : '' ?></a> -->
                <!-- <a class="nav-link" href="logout.php"><?php echo $currentUser ?   $currentUser['displayName']  : '' ?></a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $currentUser ?   $currentUser['displayName']  : '' ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!-- <a class="dropdown-item" href="update-profile.php">Profile</a> -->
                  <a class="dropdown-item btn btn-success" href="test.php?id=<?php echo $currentUser['id'];?>"">Trang cá nhân</a>
                                                               

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item btn btn-danger" href="logout.php">LogOut</a>
                </div>
              </li>

              <li class="nav-item dropdown" style="margin:7px 0 0 7px;">
                <i class="fa fa-bell fa-2x nav-link dropdown-toggle" href="#" id="navbarDropdown"  data-toggle="dropdown" ></i>


                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item btn btn-success" href="test.php?id=<?php echo $currentUser['id'];?>"">Trang cá nhân</a>
                                                              
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item btn btn-danger" href="logout.php">LogOut</a>
                </div>

              </li>



            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- <section id="showcase">
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
              <p>Google Home voice-activated speaker.consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
            <br>
            <a class="btn btn-default btn-lg showcase-btn">Read More</a>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonial">
      <div class="container">
        <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud"</p>
        <p class="customer">- John Doe</p>
      </div>
    </section>

    <section id="info1">
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
    </section>
    <hr>
    <section id="info2">
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
    </section>

    <section id="contact">
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
    </section>

    <footer>
      <p class="text-center">TechScroll Copyright &copy; 2017</p>
    </footer>

    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.sr = ScrollReveal();
        sr.reveal('.navbar', {
          duration: 2000,
          origin:'bottom'
        });
        sr.reveal('.showcase-left', {
          duration: 2000,
          origin:'top',
          distance:'300px'
        });
        sr.reveal('.showcase-right', {
          duration: 2000,
          origin:'right',
          distance:'300px'
        });
        sr.reveal('.showcase-btn', {
          duration: 2000,
          delay: 2000,
          origin:'bottom'
        });
        sr.reveal('#testimonial div', {
          duration: 2000,
          origin:'bottom'
        });
        sr.reveal('.info-left', {
          duration: 2000,
          origin:'left',
          distance:'300px',
          viewFactor: 0.2
        });
        sr.reveal('.info-right', {
          duration: 2000,
          origin:'right',
          distance:'300px',
          viewFactor: 0.2
        });
    </script>

    <script>
    $(function() {
      // Smooth Scrolling
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
    </script> -->
