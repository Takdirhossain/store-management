<?php
include_once("connection.php");
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <?php include_once("leftside.php"); ?>


                <div class="col-sm-12">
                   <div class="mainclass shadow p-3 mb-5 bg-body rounded" >

                   <!-- search form -->
                   <form action="search.php" method="get">
                    <input class="p-2 rounded " style="width:250px" type="text" name="search" value="" id="">
                    <input class="btn btn-lg btn-success " type="submit" value="submit">
                   </form>

                    <?php  
                    // search condition
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM  spend_product WHERE CONCAT (customer_name, spend_product_entry_date) LIKE '%$search%'";
                        $query = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($query) > 0){
                            echo "<table border='1'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Delivery By</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                
                                </tr>
                            </thead>";
                            // this loop will check all value 
                            while($data = mysqli_fetch_assoc($query)){

                            
                            $spend_product_id  = $data['spend_product_id'];
                            $customer_name  = $data['customer_name'];
                            $spend_product_name = $data['spend_product_name'];
                            $spend_product_quantity = $data['spend_product_quantity'];
                            $empty_cylinder = $data['empty_cylinder'];
                            $product_price = $data['product_price'];
                            $delivery_man = $data['delivery_man'];
                            $spend_product_entry_date = $data['spend_product_entry_date'];
                            
                            echo "<tr>
                                    <td>$spend_product_id</td>;
                                    <td>$data_list1[$customer_name]</td>;
                                    <td>$data_list[$spend_product_name]</td>;
                                    <td>$spend_product_quantity</td>;
                                    <td>$empty_cylinder</td>;
                                    <td>$product_price</td>;
                                    <td>$delivery_man</td>;
                                    <td>$spend_product_entry_date</td>;
                                    <td><a href='edit_spend_product.php?id=$spend_product_id'> Edit </a></td>;
            
                            </tr>";
                        }
                        echo "</table>";
                      }
                    }
                    ?>


                   
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
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
