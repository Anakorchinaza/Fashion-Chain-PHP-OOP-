<?php
     $page_title = "Home";
     include_once "header.php";
     include_once "slider.php";
?>
<style type="text/css">
  .card:hover{
    box-shadow:2px, 3px, 6px, grey;
    text-shadow:2px, 3px, 6px, grey;

  }

</style>

<div class="row mt-4">
        <div class="col">
            <h1 style="text-align:center; font-size:25px; padding:30px; font-weight:700; text-shadow:1px 2px 3px grey">
                The All-in-One platform for connecting Designers, Brands and fashion Consumers together
                in one community. 
            </h1>
            <div style="text-align:center; font-size:large; font-weight:bold;
              margin-bottom: 40px; border-radius:20% 20%;">
              <button class="btn btn-lg"style="background-color:brown; box-shadow:2px 3px 5px grey"><a href="signup.php" class="a" style="color:white;
                ">JOIN OUR COMMUNTIY</a></button>
            </div>
        </div>
     </div>

      <!-- display products by category-->
        <div class="container-fluid mt-4 mb-5">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Shop By Categories</h1>
              <hr>
              <div class="row">
                <?php
                  include_once "fash/product.php";
                  //create obj of it
                  $obj = new Product();
                  $category = $obj->getAllCategory();

                  if (count($category) > 0) {
                    foreach ($category as $key => $value) {
                ?>
                  <div class="col-md-2 mb-3">
                    <a href="products.php?category=<?php echo $value['category_id'] ?>">
                      <div class="card w-75 h-100 shadow" id="cat">
                        <div class="card-body">
                          <img src="category/<?php echo $value['category_img'] ?>" alt="category image" class="img-fluid" style="height:75px">
                          <h3 class="mt-4" style="font-size:18px;"><?php echo $value['category_name'] ?></h3>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php
                    }
                  }


                ?>
              </div>  

            </div>
          </div>
        </div>


      <!-- display products by category-->

    
     <div class="row justify-content-evenly">
        <div class="col-md-6">
          <div style="box-shadow:2px 3px 5px grey; padding:20px; margin-top:20px; height:450px;">
            <h4 style="font-size: 30px; margin-top:70px; font-weight:bold;">
              PROMOTE YOUR BRANDS</h4>
            <p style="font-size:20px; margin:20px;">
              Useful tool you can leverage your brand’s advertising and marketing strategies. 
              If people believe they share values with a company, they will stay loyal to the brand.
              Sell the problem you solve. Not the product you make.
            </p>
            <button class="btn btn-lg" style="background-color:brown; margin-left:200px; box-shadow:2px 3px 5px grey">
              <a href="signup.php" class="a" style="color:white;">SIGN UP</a></button>
          </div>
          
        </div>

        <div class="col-md-6">
          <div style="background-color:rgb(240, 114, 114); height:450px;">
           <p></p>
            <img src="images/pic1.jpeg" class="img-fluid" alt="picture" 
          style="margin-left:10px;">
          </div>
        </div>
        
    </div>

    <div class="row mt-4 mb-4">
      <div class="col-md-12" style="background-color:white;">
        <div style="text-align:center; font-size:25px; padding:30px; 
        font-weight:700; text-shadow:1px 2px 3px grey">
          <h2>Digitalize Your Brand Plus Business</h2>
           <h2>Promote your collections 24/7, Take your sales to the next level.(Fasten the sales process
          with our platform).</h2>
        </div>
      </div>
    </div>
   
     

    <div class="row mt-4 justify-content-evenly">

      <div class="col-md-4 mt-5" style=" background-color: rgb(255, 252, 247); height:300px; width:200px;
         box-shadow:2px 3px 5px grey; border-radius:20px 0px;">
          <img src="images/kids2.jpg" alt="Kids fashion" class="img-fluid mt-3" >
        </div>

        <div class="col-md-4" style=" background-color: rgb(255, 252, 247); height:300px; width:200px;
         box-shadow:2px 3px 5px grey; border-radius:20px 0px;">
          <p style="font-size:18px; font-weight:500; padding:10px; margin:10px;">
            "What you wear is how you present yourself to the world, especially today, 
            when human contacts are so quick
            ".
          </p>
        </div>

        <div class="col-md-4 mt-5" style=" background-color: rgb(255, 252, 247); height:300px; width:200px;
         box-shadow:2px 3px 5px grey; border-radius:20px 0px;">
          <img src="images/africa.jpg" alt="african fashion" class="img-fluid mt-3">
        </div>

        <div class="col-md-4" style=" background-color: rgb(255, 252, 247); height:300px; width:200px;
         box-shadow:2px 3px 5px grey; border-radius:20px 0px;">
           <p style="font-size:20px; font-weight:500; padding:10px; margin:10px;">
            Fashion is the armor to survive the reality of life.</p>
            <p style="font-size:22px; font-weight:500; padding:10px; margin:10px;">
            Fashion is instant language.
          </p>
        </div>
    </div>


    <div class="row mt-4 mb-4">
      <div class="col-md-12" style="background-color:white;">
        <div style="text-align:center; font-size:25px; padding:30px; 
        font-weight:bold; text-shadow:1px 2px 3px grey">
          <h2>OUR MOTTO: CONNECTIVITY AND UNITY</h2>
        </div>
      </div>
    </div>


    <div class="row mt-4 mb-4">
      <div class="col-md-9">
        <img src="images/apparel.jpg" class="img-fluid" alt="picture">
      </div>

        <div class="col-md-3 mb-4">
        <div style="background-color:rgb(243, 233, 233); height: 500px;;">
        </div>
          <div style="margin-top:-350px; margin-left:-300px; background-color: rgb(255, 252, 247);
          height:250px; width:500px;
          box-shadow:2px 3px 5px grey; padding:20px; border-radius:10px 60px;">
            <h4 style="font-size: 30px; margin-top:10px; margin-left:50px; font-weight:bold;">
              Built - In - Connection
            </h4>
            <p style="font-size:22px; margin:20px;">
              Where Fashion Designers and Fashion Consumers Connects to Create Interesting and Inspiring
              stories for meeting each others needs.
            </p>
          </div>
    </div>

      <div class="row mt-4">
        <div class="col-md-12" style="background-color:rgb(232, 136, 136); text-align:center;  padding:80px;">
              <h3 style="font-size:30px; font-weight:Bold;">Connect with Fashion Designers and Consumers in your Location.<h3>
              <p style="font-size:25px; font-weight:200px;">Fashion Chain has made it Easier for you.</p>
              <button class="btn btn-lg"style="background-color:brown; box-shadow:2px 3px 5px grey"><a href="signup.php" class="a" style="color:white;
                ">JOIN OUR COMMUNTIY</a></button>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col">
            <p style="text-align:center; font-size:25px; padding:30px; font-weight:700; text-shadow:1px 2px 3px grey">
                The All-in-One platform for connecting Designers, Brands and fashion Consumers together
                in one community. 
            </p>
        </div>
     </div>

     <div class="container mb-3" style="margin:10px">
        <a href="" class="btn btn-success btn-lg mt-2" style="border-radius:50px;">Men's Wear</a>
        <a href="" class="btn btn-primary btn-lg" style="border-radius:50px;">Kids Outfit</a>
        <a href="" class="btn btn-danger btn-lg" style="border-radius:50px;">Women's Wear</a>
        <a href="" class="btn btn-warning btn-lg" style="border-radius:50px;">Plus Size</a>
        <a href="" class="btn btn-light btn-lg" style="border-radius:50px;">Wedding Dress</a>
        <a href="" class="btn btn-dark btn-lg" style="border-radius:50px;">Senator Wears</a>
        <a href="" class="btn btn-success btn-lg" style="border-radius:50px;">Denim Jeans</a>
        <a href="" class="btn btn-info btn-lg" style="border-radius:50px;">Formal Wears</a>
      
     </div>



     <div class="row mt-4 mb-4">
      <div class="col-md-9">
        <img src="images/apparel.jpg" class="img-fluid" alt="picture">
      </div>

        <div class="col-md-3 mb-4">
        <div style="background-color:rgb(243, 233, 233); height: 500px;;">
        </div>
          <div style="margin-top:-350px; margin-left:-300px; background-color: rgb(255, 252, 247);
          height:250px; width:500px;
          box-shadow:2px 3px 5px grey; padding:20px; border-radius:10px 60px;">
            <h4 style="font-size: 30px; margin-top:10px; margin-left:50px; font-weight:bold;">
              Built - In - Connection
            </h4>
            <p style="font-size:22px; margin:20px;">
              Where Fashion Designers and Fashion Consumers Connects to Create Interesting and Inspiring
              stories for meeting each others needs.
            </p>
          </div>
    </div>



<?php
    include_once "footer.php";
?>