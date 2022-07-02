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
</head>
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
<body>
  <div class="container mt-3">
    <?php include_once("topbar.php"); ?>

    <div class="container-foulid">
      <div class="row">


        <div class="col-sm-12">
          <div class="mainclass">
            <?php
            //defult selected product name from store product page
            if (isset($_GET['id'])) {
              $getId = $_GET['id'];

              $sql      = " SELECT * FROM store_product WHERE store_product_id = $getId";
              $query    = $conn->query($sql);
              $data     = mysqli_fetch_assoc($query);

              $store_product_id         = $data['store_product_id'];
              $store_product_name       = $data['store_product_name'];
              $store_product_quantity   =  $data['store_product_quantity'];
              $store_product_entry_date =  $data['store_product_entry_date'];
              
            }

            //update new data 
            if (isset($_GET['store_product_name'])) {
              $new_store_product_name     = $_GET['store_product_name'];
              $new_store_product_quantity = $_GET['store_product_quantity'];
              $new_store_product_entry_date     = $_GET['store_product_entry_date'];             
              $new_store_product_id = $_GET['store_product_id'];


              $sql1  = "UPDATE store_product SET                store_product_name='$new_store_product_name', store_product_quantity	= '$new_store_product_quantity',  store_product_entry_date = '$new_store_product_entry_date' WHERE store_product_id  = ' $new_store_product_id' ";

              if ($conn->query($sql1) == TRUE) {
                echo "Update Succesfuilly";
              } else {
                echo  "Error updating record: " . $conn->error;
              }
            }

            ?>



            <form class="mainform shadow p-3 mb-5 bg-body rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
              <div class="category">


                <h3>product Name: </h3>
                <select  class="p-2 rounded " style="width:250px" name="store_product_name" id=""> <br>

                  <?php
                  //auto selecting product name from 
                  $sql = "SELECT * FROM product";
                  $query = $conn->query($sql);

                  while ($data = mysqli_fetch_assoc($query)) {
                    $product_id = $data['product_id'];
                    $product_name = $data['product_name'];
                  ?>
                    <option value='<?php echo $product_id ?>' <?php if ($store_product_name == $product_id) {
                      echo 'SELECTED';
                   } ?>>
                      <?php echo $product_name; ?>
                    </option>
                  <?php } ?>

                </select>


                </br> </br>
                <h3>product Quantity: </h3>
                <input  class="p-2 rounded " style="width:250px" type="number" name="store_product_quantity" value="<?php echo $store_product_quantity; ?>"> </br> </br>


                <h3>Store Entry : </h3>
                <input  class="p-2 rounded " style="width:250px" type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date ?>">

                <input name="store_product_id" value="<?php echo $store_product_id; ?> " hidden> <br><br>

                <button type="submit" value="submit" class="btn btn-lg btn-success ">Update</button>

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