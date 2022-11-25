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
  #cat{
    border-right: 3px solid brown;
    border-bottom: 3px solid brown;
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
        <div class="container mt-4 mb-5">
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
                  <div class="col-lg-3 mb-3">
                    <a href="products.php?category=<?php echo $value['category_id'] ?>">
                      <div class="card w-75 h-100" id="cat">
                        <div class="card-body">
                          <img src="category/<?php echo $value['category_img'] ?>" alt="category image" 
                          class="img-fluid" style="height:75px; margin-left:60px">
                          <h1 class="mt-4 text-center" style="font-size:18px;"><?php echo $value['category_name'] ?></h1>
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

    
     <div class="row h-100 g-0">
      <div class="card-group">
        <div class="col-lg-5">
          <div style="box-shadow:2px 3px 5px grey; padding:20px;">
            <h4 style="font-size: 30px; margin-top:45px; font-weight:bold;">
              PROMOTE YOUR BRANDS</h4>
            <p style="font-size:20px; margin:20px;">
              Useful tool you can leverage your brand’s advertising and marketing strategies. 
              If people believe they share values with a company, they will stay loyal to the brand.
              Sell the problem you solve. Not the product you make.
            </p>
            <button class="btn btn-lg" style="background-color:brown; box-shadow:2px 3px 5px grey">
              <a href="signup.php" class="a" style="color:white;">SIGN UP</a></button>
          </div>    
        </div>

        <div class="col-lg-5">
            <img src="images/pic1.jpeg" class="img-fluid shadow" alt="picture">
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

            <!--feature Products-->
            <div class="container mb-4">
              <div class="row">
                <div class="col-md-12">
                    <h3  class="text-center">
                        FEATURE PRODUCTS
                    </h3>
                    <hr>

                  <div class="row align-items-center">
                      <?php
                          include_once "fash/product.php";

                          $obj = new Product();
                          $products = $obj->featureProduct();

                    if (count($products) > 0) {
                        foreach ($products as $key => $value) {
                ?>
                    <div class="col-md-3 mb-3">
                        <a href="productview.php?productid=<?php echo $value['product_id'] ?>">
                            <div class="card w-100 shadow">
                                <div class="card-body">
                                    <img src="upload/<?php echo $value['img_url'] ?>" alt="product image" 
                                    class="img-fluid" height="30" width="35%" style="margin-left:80px">
                                    <h4 class="mt-2 text-center"><?php echo $value['product_name'] ?></h4>
                                      <hr>
                                    <h5 class="text-center">&#8358;<?php echo number_format($value['product_price'], 2) ?></h5>
                                     <hr>
                                    <a href="productview.php?productid=<?php echo $value['product_id'] ?>" 
                                    class="btn btn-outline-primary btn-sm" style="margin-left:80px">View Details</a>
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


            <!--feature products-->

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
        <div class="row">
          <div class="col-md-12">
            <a href="" class="btn btn-success btn-md" style="border-radius:50px; color:white !important">Men's Wear</a>
            <a href="" class="btn btn-primary btn-md" style="border-radius:50px; color:white !important">Kids Outfit</a>
            <a href="" class="btn btn-danger btn-md" style="border-radius:50px; color:white !important">Women's Wear</a>
            <a href="" class="btn btn-warning btn-md" style="border-radius:50px; color:white !important">Plus Size</a>
            <a href="" class="btn btn-light btn-md" style="border-radius:50px;">Wedding Dress</a>
            <a href="" class="btn btn-dark btn-md" style="border-radius:50px; color:white !important">Senator Wears</a>
            <a href="" class="btn btn-success btn-md" style="border-radius:50px; color:white !important">Denim Jeans</a>
            <a href="" class="btn btn-info btn-md" style="border-radius:50px; color:white !important">Formal Wears</a>
      
          </div>
        </div>
     </div>



<?php
    include_once "footer.php";
?>