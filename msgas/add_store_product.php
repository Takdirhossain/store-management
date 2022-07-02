<?php
require("connection.php");
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

  <title>Add Store Product</title>

  <style>
   
        .mainform{
                  background-image:url(assets/3.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                  display: flex;
                    }
        h3{
          color: #fff;
        }
  </style>
</head>

<body>
  <div class="container mt-3">
    <?php include_once("topbar.php"); ?>

    <div class="container-foulid">
      <div class="row">

        <div class="col-sm-12">
          <div class="mainclass">
            <?php
            /* Collecting data from field using  get method */
            if (isset($_GET['store_product_name'])) {
              $store_product_name          = $_GET['store_product_name'];
              $store_product_quantity      = $_GET['store_product_quantity'];
              $store_product_entry_date    = $_GET['store_product_entry_date'];
              /* Mysql Data insert query */
              $sql1 = "INSERT INTO store_product(store_product_name, store_product_quantity, store_product_entry_date )VALUES ('$store_product_name', '$store_product_quantity', '$store_product_entry_date')";
              /* Check connection */
              if ($conn->query($sql1) ==  true) {
                echo "Product insert successfuilly";
              } else {
                echo "Something wrong here";
              }

              //go to outside when sent a  new data
              header("location:add_store_product.php");
                          exit;
            }

            ?>
            <form class=" mainform shadow p-3 mb-5 bg-body rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
              
              <div class="category">

                <h3>Product Name: </h3>
                <select class="p-2 rounded " style="width:250px" name="store_product_name" id="">

                  <?php
                  //calling datalist function 
                  data_list1('product', 'product_id', 'product_name');
                  ?>
                </select>

                </br> </br>
                <h3>Product Quantity: </h3>
                <input class="p-2 rounded " style="width:250px" type="text" name="store_product_quantity"> </br> </br>

                <h3>Arrival Date: </h3>
                <input class="p-2 rounded " style="width:250px" type="date" name="store_product_entry_date"> <br> <br>

                <button type="submit" value="submit" class="btn btn-lg btn-success ">Submit</button>
              </div>
              

            </form>

          </div>

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