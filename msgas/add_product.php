<?php 
//connection with databse
include("connection.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Add Product</title>
    <style>
        .mainform{
                  background-image:url(assets/2.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                    }
        h3{
          color: #fff;
        }
    </style>
  </head>
  <body>
  <div class="container mt-3">
      <!-- addeding top manubar  -->
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">
             
                  <div class="col-sm-12">
                   
                    <div class="mainclass">
                    <?php 
                        /* Data insert from field useing get method
                        
                        */
                          if(isset($_GET['product_name'])){
                              $product_name          = $_GET['product_name'];
                              $product_category      = $_GET['product_category'];
                              $product_code          = $_GET['product_code'];
                              $product_entry_date    = $_GET['product_entry_date'];

                              /* Mysql data insert query */
                              $sql = "INSERT INTO product(product_name, product_category, product_code, product_entry_date)VALUES ('$product_name', '$product_category', '$product_code', '$product_entry_date')";

                              /* Check connection */
                              if($conn->query($sql) ==  true){
                                  echo "Product insert successfuilly";
                              }
                              else{
                                  echo "Something wrong here";
                              }
                              //go to outside when sent a data
                              header("location:add_product.php");
                          exit;
                          }  
                      ?>

                        <?php 
                       /* Select product category from category tabe */
                          $sql = "SELECT * FROM category";
                          $query = $conn->query($sql); 
                        ?>

                        <form class="mainform shadow p-3 mb-5 bg-body rounded" action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="GET">

                            <div style="margin-left: 50px ;" class="category">
                            <h3>Product Name: </h3>
                            <input class="p-2 rounded " style="width:250px" type="text" name="product_name" placeholder="Example As 12KG"> </br> </br>

                            <h3>product Brand Name: </h3>
                            <select class="p-2 rounded " style="width:250px" name="product_category" id="">

                            <?php
                            /* Fetching category table  */
                            while( $data = mysqli_fetch_assoc($query)){
                                    $category_id = $data['category_id'];
                                    $category_name = $data['category_name'];
                                    echo "<option value='$category_id'> $category_name </option>";
                            }
                            ?>
                            </select>

                            
                            </br> </br>
                            <h3>product code: </h3>
                            <input class="p-2 rounded " style="width:250px" type="text" name="product_code" placeholder="Example As OM12"> </br> </br>
                            

                            <h3>product entry date: </h3>
                            <input class="p-2 rounded " style="width:250px" type="date" name="product_entry_date"> <br> <br>
                            
                            <button type="submit" value="submit" name="submit" class="btn btn-lg btn-success ">Submit</button>
                            </div> 
                            

                        </form>
                    </div> 
                  </div>
            </div>
        </div>
       
        <div class="container-foulid">
        <div class="footer">
            <p class="text-center">Copyright mohammad gas service</p>
        </div>    
        
        </div>

    </div>





  

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>