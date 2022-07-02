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

              $sql      = " SELECT * FROM spend_product WHERE spend_product_id  = $getId";
              $query    = $conn->query($sql);
              $data     = mysqli_fetch_assoc($query);

              $spend_product_id           = $data['spend_product_id'];
              $customer_name              = $data['customer_name'];
              $spend_product_name         =  $data['spend_product_name'];
              $spend_product_quantity     =  $data['spend_product_quantity'];
              $empty_cylinder             =  $data['empty_cylinder'];
              $product_price              =  $data['product_price'];
              $spend_product_entry_date   =  $data['spend_product_entry_date'];
              
            }

            //update new data 
            if (isset($_GET['spend_product_name'])) {
              $new_customer_name              = $_GET['customer_name'];
              $new_spend_product_name         = $_GET['spend_product_name'];
              $new_spend_product_quantity     = $_GET['spend_product_quantity'];
              $new_empty_cylinder             = $_GET['empty_cylinder'];
              $new_product_price              = $_GET['product_price'];

              $new_spend_product_entry_date   = $_GET['spend_product_entry_date'];
              $new_spend_product_id           = $_GET['spend_product_id'];

              //updating query
              $sql1  = "UPDATE spend_product SET  customer_name='$new_customer_name', spend_product_name	= '$new_spend_product_name',  spend_product_quantity = '$new_spend_product_quantity', product_price = '$new_product_price', empty_cylinder = '$new_empty_cylinder', spend_product_entry_date = '$new_spend_product_entry_date'  WHERE spend_product_id = '$new_spend_product_id' ";

              if ($conn->query($sql1) == TRUE) {
                echo "Update Succesfuilly";
              } else {
                echo  "Error updating record: " . $conn->error;
              }
            }

            ?>



            <form class="shadow p-3 mb-5 bg-body rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
              <div class="category">


                <h3>Customer name: </h3>
                <select class="p-2 rounded " style="width:250px" name="customer_name" id="">
                <?php
                            //auto selecting product name from 
                            $sql = "SELECT * FROM customer";
                            $query = $conn->query($sql);

                            while ($data = mysqli_fetch_assoc($query)) {
                                $customer_id = $data['customer_id'];
                                $customer_name1 = $data['customer_name'];
                            ?>
                                <option value='<?php echo $customer_id ?>' <?php if ($customer_name == $customer_id) {
                                echo 'SELECTED';
                            } ?>>
                                <?php echo $customer_name1; ?>
                                </option>
                            <?php } ?>
                </select> <br><br>

                <h3> Spend product Name: </h3>
                <select class="p-2 rounded " style="width:250px" name="spend_product_name" id="">

                  <?php
                  //auto selecting product name from 
                  $sql = "SELECT * FROM product";
                  $query = $conn->query($sql);

                  while ($data = mysqli_fetch_assoc($query)) {
                    $product_id = $data['product_id'];
                    $product_name = $data['product_name'];
                  ?>
                    <option value='<?php echo $product_id ?>' <?php if ($spend_product_name == $product_id) {
                                                                echo 'SELECTED';
                                                              } ?>>
                      <?php echo $product_name; ?>
                    </option>
                  <?php } ?>

                </select>


                </br> </br>
                <h3>Spend product Quantity: </h3>
                <input class="p-2 rounded " style="width:250px" type="number" name="spend_product_quantity" value="<?php echo $spend_product_quantity; ?>"> </br> </br>

                <h3>Empty cylinder : </h3>
                <input class="p-2 rounded " style="width:250px" type="text" name="empty_cylinder" value="<?php echo $empty_cylinder ?>"><br><br>

                <h3>Product price : </h3>
                <input class="p-2 rounded " style="width:250px" type="text" name="product_price" value="<?php echo $product_price ?>"> <br><br>

                <h3>Spend Store Entry : </h3>
                <input class="p-2 rounded " style="width:250px" type="date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date ?>">

                <input class="p-2 rounded " style="width:250px" name="spend_product_id" value="<?php echo $spend_product_id; ?>" hidden> <br><br>

                <button type="submit" value="submit" class="btn btn-lg btn-success ">Update</button>
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