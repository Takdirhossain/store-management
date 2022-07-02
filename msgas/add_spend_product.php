<?php
//connection with databse
require("connection.php");
//calling function page
require("function.php");
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

  <title>Spend Product</title>
</head>
<style>
  .mainform{
                  background-image:url(assets/2.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                  display: flex;
                    }
        h3{
          color: #fff;
        }
</style>
<body>
  <div class="container mt-3">
    <?php include_once("topbar.php"); ?>

    <div class="container-foulid">
      <div class="row">
        
        <div class="col-sm-12">
          <div class="mainclass">
          <?php
           /* Collect data from field using get method */
            if (isset($_GET['spend_product_name'])) {
              $customer_name                    = $_GET['customer_name'];
              $spend_product_name               = $_GET['spend_product_name'];
              $spend_product_quantity           = $_GET['spend_product_quantity'];
              $spend_product_entry_date         = $_GET['spend_product_entry_date'];
              $product_price                    = $_GET['product_price'];
              $delivery_man                     = $_GET['delivery_man'];
              $empty_cylinder                   = $_GET['empty_cylinder'];
              /* Mysql data insert query */
              $sql1 = "INSERT INTO spend_product(Customer_name, spend_product_name, spend_product_quantity, spend_product_entry_date, product_price, delivery_man, empty_cylinder )VALUES ('$customer_name','$spend_product_name', '$spend_product_quantity', '$spend_product_entry_date', '$product_price', '$delivery_man', $empty_cylinder )";


                //ceheck connection
                if($conn->query($sql1) ==  true){
                  echo "Product insert successfuilly";
                }
                else{
                  echo "Something wrong here";
                }
              

              //go to outside when sent a data
              header("location:add_spend_product.php");
                          exit;
            }
          ?>


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="mainform shadow p-3 mb-5 bg-body rounded" method="GET">

            
           
              <div class="category">
                <h3>Customer Name</h3>
              

                <select name="customer_name" class="p-2 rounded " style="width:250px" name="spend_product_name" id="">

                  <?php
                  //calling datalist function 
                  data_list1 ('customer', 'customer_id', 'customer_name');
                 
                 

                  ?>
                </select> <br><br>

                <h3>product Name: </h3>
                <select  class="p-2 rounded " style="width:250px" name="spend_product_name" id="">

                  <?php
                  //calling datalist function 
                  data_list1('product', 'product_id', 'product_name');
                  ?>
                </select>

                
                


                </br> </br>
                <h3>Product Quantity: </h3>
                <input  class="p-2 rounded " style="width:250px" type="text" name="spend_product_quantity"> </br> </br>
                
                <h3>Product Price: </h3>
                <input  class="p-2 rounded " style="width:250px" type="text" name="product_price"> </br> </br>

                <h3>Delivered By : </h3>
                <input class="p-2 rounded " style="width:250px" type="text" name="delivery_man"> <br><br>

                <h3>Empty Cylinder</h3>
                <input class="p-2 rounded " style="width:250px" type="text" name="empty_cylinder"> <br><br>
                
                <h3>Spend Date : </h3>              
                <input class="p-2 rounded " style="width:250px" type="date" name="spend_product_entry_date"> <br><br>

                <button type="submit" value="submit" class="btn btn-lg btn-success ">Submit</button>
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