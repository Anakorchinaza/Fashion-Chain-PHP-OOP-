<?php ob_start() ?>
<!DOCTYPE html>
<html lang='en'>
<head>
<?php
        include_once "fash/constants.php";
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="descriptipn" content="it's a platform that provides connectivity between fashion 
    designers/brands and fashion consumers in Africa and global to manage and scale through
    the process of meeting each others needs.">
	<meta name="keywords" content="fashion designers, online shopping, brands awareness, 
    fashion consumers, business of fashion, marketing platforms for Fashion brands">
	<meta name="author" content="Ruby Anakor">
    
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/name.ico">
    
    <!-- <link href="animate.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
	<!-- <link href="index.css" rel="stylesheet" type="text/css"> -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Poppins&display=swap" rel="stylesheet">
  
    <title>
        <?php if(isset($page_title)){echo $page_title. " | ";} ?>
        <?php if(defined('APP_NAME')){echo APP_NAME;} ?>
    </title>
  
	
	<style type="text/css">
    h1,h2,h3,h4,h5,h6,span,li,a{
      font-family: 'Alkalami', serif;
    }
    p{
      font-family: 'Poppins', sans-serif; 
    }

    #head1{
    background-color:rgb(46, 3, 3);
    color:white;
    height:30px;
    text-align:center;
    font-size:18px;
    }
    #sticky{
        position:sticky;
        top:0;
    }
    #head2{
        font-size:40px;
        color:black;
        text-align:center;
        margin-top:10px;
        height: 70px;
    }
    .sign{
        text-decoration: none;
        color:rgb(46, 3, 3);
        font-weight: 500;
        padding:-10px;
        height: 50px;  
    }
    .nav-link{
        color:brown;
    } 
    
    .a{
        text-decoration:none;
        color:whitesmoke !important
    }
   
    a{
        color:brown !important; 
        text-decoration:none;
    }
   


	
	</style>

</head>
<body style="background-color:white ;">
	<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="head1">
            <marquee>
            <p>
                Shop from different African Fashion brands - Ask questions related to fashion and 
                get feedbacks. Join our community.
            </p>
        </marquee>
      </div>
    </div>

    <div class="row mt-32">
        <div class="col-md-9 mt-4" id="head2">
            <h2 style="font-size: 45px; background-color:white; text-shadow:1px 2px 3px grey
            "><i class="fa-solid fa-link me-2"></i>FASHION <span style="color:brown">CHAIN</span></h2>
        </div>
        <div class="col-md-3 mt-4">
            <a href="login.php" style="font-size:25px;" class="sign"><i class="fa-solid fa-user me-2"></i>Login /</a>
            <a href="signup.php" style="font-size:25px;" class="sign"><i class="fa-solid fa-right-to-bracket me-2"></i> Register</a>
        </div>
    </div>
    
    
    <div class="row" style="border-top:3px solid brown;">
			<div class="col-md-12">
			
			<!-- begin nav-->
    <nav class="navbar sticky-top navbar-expand-md shadow" id="stick">
     <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="color:white"><i class="fa-solid fa-link"></i><i class="fa-solid fa-link"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ms-4" aria-current="page" href="index.php">HOME</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              CATEGORIES
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Women</a></li>
              <li><a class="dropdown-item" href="#">Men</a></li>
              <li><a class="dropdown-item" href="#">Kids</a></li>
              <li><a class="dropdown-item" href="#">Wedding Dresses</a></li>
            </ul>
          </li>
          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-4" type="search" id="searcharea"
          placeholder="Search" aria-label="Search">
          <div id="#result" class="row mt-3"></div>
          </form>
        </div>
      </div>
    </nav>
        
      
			<!-- end nav-->
		</div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript">
      $(document).ready(function(){
        $("#searcharea").keyup(function(){
          var search = $(this).val();
          //console.log(search);
          $.ajax({
            url: "searchplace.php",
            data: 'searchstr='+search,
            type: 'POST',
            success: function(response){
              //console.log(response);
              $("#result").html(response);
            },
            error: function(err){
              console.log(err);
            }
          })
        })
      })
  

    </script>
