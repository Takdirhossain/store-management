<?php

include("connection.php");

?>
<?php
//selecting product from product table table
$sql1          = "SELECT * FROM product";
$query1        = $conn->query($sql1);

$data_list     = array();
while ($data1 =  mysqli_fetch_assoc($query1)) {
  $product_id  = $data1['product_id'];
  $product_name   = $data1['product_name'];

  $data_list[$product_id] = $product_name;
}

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

  <title>List Of Product</title>
  <style>
    table,
    th,
    td {
      border:1px solid #198754;
      padding:10px;
      text-align: center;
    }
    .mainclass{
                  background-image:url(assets/1.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                  display: flex;
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
          <div class="mainclass shadow p-3 mb-5 bg-body rounded" >
            
            
          
            
            <?php

            //showing stored Product list from database 
            $sql    = "SELECT * FROM store_product WHERE store_product_entry_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
            $query  = $conn->query($sql);
            echo "<table border=''>
            <tr >
              <th> Product Name </th>  
              <th>Product Quantity</th> 

              
              <th> entry Date</th>  

              <th > Action </th>
            </tr>";
            
            while ($data = mysqli_fetch_assoc($query)) {
              $store_product_id         = $data['store_product_id'];
              $store_product_name       = $data['store_product_name'];
              $store_product_quantity   = $data['store_product_quantity'];
              $store_product_entry_date = $data['store_product_entry_date'];
              //$product_entry_date = $data['product_entry_date'];

            echo " <tr> 
    
                <td> $data_list[$store_product_name] </td> 
                <td> $store_product_quantity  </td> 
                <td> $store_product_entry_date </td> 
                <td><a href='edit_store_product.php?id=$store_product_id'> Edit </a></td> 
                </tr> ";
            }
            echo "</table>";
            ?>
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