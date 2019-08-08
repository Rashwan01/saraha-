
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>intenational </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--  ">
  -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min"></script>
      <script src="js/respond.min"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light  fixed-top ltr">




        <div class="collapse navbar-collapse" id="navbarSupportedContent">
			 <a class="navbar-brand float-right d-block" href="#">  
			<img class="svgImg" src="img/logo300.png"></a>
			<form class="form-inline my-2 my-lg-0">
				<div class="form-group input-group-sm">
				      <input  id = "search" class="form-control input-lg mr-sm-2"   style ="width:300px;"type="search" placeholder="Search" aria-label="Search">
</div>
				
    </form>

            <!--      code to be run correctly we should put header fike after top code php in all pages to see that there is session id-->
            <?php  if(!isset($_SESSION["ID"])){

      ?>
            <ul class="navbar-nav ml-auto flex-row" >


                <li class="nav-item">
                    <a class="nav-link ml-2 " href="login.php" tabindex="-1" aria-disabled="true">دخول</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ml-2  " href="register.php" tabindex="-1" aria-disabled="true">تسجيل</a>
                </li>


            </ul>
            <?php } ?>
   <?php  if(isset($_SESSION["ID"])){ ?>
            <ul class="nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="main.php?do=home"><i class="fa fa-home mr-1"></i> home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php?do=message"> <i class="far fa-envelope mr-1"></i> message <span class="badge badge-light"><?php getCountMsg($_SESSION["ID"]);?> </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.php"><i class="fas fa-cog mr-1"></i> settings <span class="badge badge-light">9</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php?do=logout"><i class="fas fa-sign-out-alt mr-1"></i> logout</a>
                </li>

            </ul>
  <?php } ?>
			
			 
        </div>
    </nav>

