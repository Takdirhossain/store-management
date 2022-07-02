<?php
require("connection.php");
require("function.php");
?>
<?php 
    
    //selecting product from product table table
    $sql1          = "SELECT * FROM customer";
    $query1        = $conn->query($sql1);
    
    $data_list     = array();
    while ($data1 =  mysqli_fetch_assoc($query1)) {
      $customer_id    = $data1['customer_id'];
      $customer_name   = $data1['customer_name'];
    
      $data_list[$customer_id ] = $customer_name;
    }
    
    

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Of Bill Collection</title>
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
            

                <div class="col-sm-12">
                   <div class="mainclass shadow p-3 mb-5 bg-body rounded" >
                   <h2>List Of Bill Collection</h2>
                       <?PHP 
                        // showing data from databse

                        $sql = "SELECT * FROM bill_collection WHERE payment_date >= DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
                        $query = $conn -> query($sql);
                        echo "<table>
                                <tr>
                                <th> Name Of Customer</th>
                                <th> Payable Amount</th>
                                <th> Date</th>
                                <th> Action</th>
                                </tr>";
                        while($data = mysqli_fetch_assoc($query)){
                            $name_of_customer    = $data['name_of_customer'];
                            $payment_amount      = $data['payment_amount'];
                            $payment_date        = $data['payment_date'];
                            $bill_collection_id  = $data['bill_collection_id'];
                            echo "<tr>
                                    <td>$data_list[$name_of_customer]</td>
                                    <td>৳$payment_amount</td>
                                    <td>$payment_date</td>
                                    <td><a href='edit_bill_collection.php?id=$bill_collection_id'> Edit </a></td>
                                </tr>";
                        }
                        echo "</table>";
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
