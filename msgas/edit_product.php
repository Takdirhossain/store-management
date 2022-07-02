<?php
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

  <title>Edit Product</title>
</head>
<style>
  .mainform{
                  background-image:url(assets/2.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                  color: #fff;
                  display: flex;
                    }
                    
        
</style>
<body>
  <div class="container mt-3">
    <!-- addeding top manu ber -->
    <?php include_once("topbar.php"); ?>

    <div class="container-foulid">
      <div class="row">
        <!-- addeding leftside ber  -->
        <div class="col-sm-12">
          <div class="mainclass">
            <?php
                //select data from database 

                if (isset($_GET['id'])) {
                  $getId = $_GET['id'];

                  $sql      = " SELECT * FROM product WHERE 	product_id = $getId";
                  $query    = $conn->query($sql);
                  $data     = mysqli_fetch_assoc($query);

                  $product_id         = $data['product_id'];
                  $product_name       = $data['product_name'];
                  $product_category   =  $data['product_category'];
                  $product_code       =  $data['product_code'];
                  $product_entry_date =  $data['product_entry_date'];
                }

                //update new data 
                if (isset($_GET['product_name'])) {
                  $new_product_name       = $_GET['product_name'];
                  $new_product_category   = $_GET['product_category'];
                  $new_product_code       = $_GET['product_code'];
                  $new_product_entry_date = $_GET['product_entry_date'];
                  $new_product_id         = $_GET['product_id'];


                  $sql1                    = "UPDATE product SET      product_name='$new_product_name', product_category	= '$new_product_category',  product_code = '$new_product_code', product_entry_date	= '$new_product_entry_date' WHERE product_id = ' $new_product_id' ";

                  if ($conn->query($sql1) == TRUE) {
                    echo "Update Succesfuilly";
                  } else {
                    echo  "Error updating record: " . $conn->error;
                  }
                }

            ?>

            <?php
            //auto show product brand name from database 
            $sql = "SELECT * FROM category";
            $query = $conn->query($sql);

            ?>

            <form  class="mainform shadow p-3 mb-5 bg-body rounded" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
              <div class="category">
                <h3>Product Name: </h3>
                <input class="p-2 rounded " style="width:250px"  type="text" value="<?php echo $product_name; ?>" name="product_name"> </br> </br>

                <h3>product Brand Name: </h3>
                <select class="p-2 rounded " style="width:250px"  name="product_category" value="<?php echo $product_category; ?>" id="">

                  <?php
                  //auto show product brand name from database 
                  while ($data = mysqli_fetch_assoc($query)) {
                    $category_id = $data['category_id'];
                    $category_name = $data['category_name'];

                    echo "<option value='$category_id'> $category_name </option>";
                  }
                  ?>
                </select>


                </br> </br>
                <h3>product code: </h3>
                <input class="p-2 rounded " style="width:250px"  type="text" value="<?php echo $product_code; ?>" name="product_code"> </br> </br>


                <h3>product entry date: </h3>
                <input class="p-2 rounded " style="width:250px"  type="date" value="<?php echo $product_entry_date; ?>" name="product_entry_date">

                <input type="text" name="product_id" value="<?php echo $product_id ?> " hidden> <br><br>
                  
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