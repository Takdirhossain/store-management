<?php
//Databse connection
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
<?php 
//selecting product from product table table
$sql2          = "SELECT * FROM customer";
$query2        = $conn->query($sql2);

$data_list1     = array();
while ($data2 =  mysqli_fetch_assoc($query2)) {
  $customer_id   = $data2['customer_id'];
  $customer_name   = $data2['customer_name'];

  $data_list1[$customer_id] = $customer_name;
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

  <title>List Of spend Product</title>
  <style>
    table,
    th,
    td {
      border: 1px solid #198754;
      padding: 10px;
      text-align: center;
    }
   
  </style>
</head>

<body>
  <div class="container mt-3">
    <?php include_once("topbar.php"); ?>

    <div class="container-foulid">
      <div class="row">


        <div class="col-sm-12">
          <div class="mainclass  shadow p-3 mb-5 bg-body rounded" >
            <h2 class="text-center">List Of Sale Product</h2><br>
              <!-- search form  -->
            <form action="search.php" method="get">
              <input class="p-2 rounded " style="width:150px" type="text" placeholder="Search For a Customer" name="search" id="">
              <input class="btn btn-lg btn-success " type="submit" value="Search"> <br> <br>
            </form>


            <?php
            //showing stored Product list from database 
            $sql    = "SELECT * FROM spend_product WHERE spend_product_entry_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
            $query  = $conn->query($sql);
            echo "<table class='table table-striped table-hover'>
            <tr >
            <th> Customer Name </th>  
            <th> Product Name </th>  
            <th>Product Quantity</th> 
            <th>Product Price</th> 
            <th>Delivered By </th> 
            <th>Empty Cylinder </th>         
            <th> entry Date</th>  

            <th > Action </th>
            </tr>";
            while ($data = mysqli_fetch_assoc($query)) {
              $spend_product_id         = $data['spend_product_id'];
              $customer_name            = $data['customer_name'];
              $spend_product_name       = $data['spend_product_name'];
              $spend_product_quantity   = $data['spend_product_quantity'];
              $empty_cylinder           = $data['empty_cylinder'];
              $spend_product_entry_date = $data['spend_product_entry_date'];
              $product_price            = $data['product_price'];
              $delivery_man             = $data['delivery_man'];
              //$product_entry_date = $data['product_entry_date'];

              echo " <tr> 
            <td> $data_list1[$customer_name] </td>
            <td> $data_list[$spend_product_name]</td> 
             
            <td > $spend_product_quantity  </td> 
            <td > $empty_cylinder  </td> 
            <td> $product_price  </td> 
            <td> $delivery_man  </td> 
            <td> $spend_product_entry_date </td> 
            <td><a href='edit_spend_product.php?id=$spend_product_id'> Edit </a></td> 
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

  <script type="text/javascript">

  </script>


</body>

</html>