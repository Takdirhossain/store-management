<?php
//connection with databse
include("connection.php");

/* Select customer name */
$sql3   = "SELECT * FROM customer";
$query3 = $conn->query($sql3);

$data_list     = array();
while ($data3 =  mysqli_fetch_assoc($query3)) {
    $customer_id   = $data3['customer_id'];
    $customer_name   = $data3['customer_name'];

    $data_list[$customer_id] = $customer_name;
}

/* Fetch product id for showing product name from product  table */
$sql4   = "SELECT * FROM product";
$query4 = $conn->query($sql4);

$data_list1     = array();
while ($data4 =  mysqli_fetch_assoc($query4)) {
    $product_id    = $data4['product_id'];
    $product_name   = $data4['product_name'];

    $data_list1[$product_id] = $product_name;
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

    <title>Report</title>

    <style>
        table,
        th,
        td {
            border:1px solid #198754;
            padding:10px;
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
                    <div class="row p-6 border-bottom success">
                        <div class="mainclass">
                            <h2>Select The Customer</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <select name="select_customer" id="">
                                <?php 
                                    $sql   = "SELECT * FROM customer";
                                    $query = $conn->query($sql);

                                    while($data = mysqli_fetch_assoc($query)){
                                        $customer_id    = $data['customer_id'];
                                        $customer_name  = $data['customer_name'];
                                    
                                ?>
                                <option value="<?php echo $customer_id ?>"><?php echo $customer_name ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" value="Generate Report">
                            </form> <br> <br>

                            <h2>Product Selling Date</h2>
                            <?php 
                                if(isset($_GET['select_customer'])){
                                    $select_customer = $_GET['select_customer'];
                                    $sql1 = "SELECT * FROM spend_product WHERE customer_name = $select_customer";
                                    $query1 = $conn->query($sql1);

                                    echo "<table>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Product Name</th>
                                                <th>Product Quantity</th>
                                               
                                                <th>Date</th>
                                                <th>Product Price</th>
                                                <th>Delivered</th>
                                                <th>Total Bill</th>
                                            </tr>";
                                $totalbill = 0; 
                                while ($data1 = mysqli_fetch_assoc($query1)){
                                    $customer_name = $data1['customer_name'];
                                    $spend_product_name = $data1['spend_product_name'];
                                    $spend_product_quantity = $data1['spend_product_quantity'];
                                    $spend_product_entry_date = $data1['spend_product_entry_date'];
                                    $product_price = $data1['product_price'];
                                    $delivery_man = $data1['delivery_man'];
                                    
                                    $totalbill += $product_price;

                                    echo "<tr> 
                                            <td>$data_list[$customer_name]</td>
                                            <td>$data_list1[$spend_product_name]</td>
                                            <td>$spend_product_quantity</td>
                                            <td>$spend_product_entry_date</td>
                                            <td>৳$product_price</td>
                                            <td>$delivery_man</td>
                                            <td>৳$totalbill</td>
                                            
                                         </tr>";
                                    }

                                echo "</table>";
                                }
                            ?> <br><br>
                            <h2>Bill Payment Report</h2>
                            <?php 
                                if(isset($_GET['select_customer'])){
                                    $select_customer = $_GET['select_customer'];
                                    $sql1 = "SELECT * FROM bill_collection WHERE name_of_customer = $select_customer";
                                    $query1 = $conn->query($sql1);

                                    echo "<table>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Payable Amount</th>
                                                <th>Payment Date</th>                               
                                                <th>Total Pay</th>                               
                                            </tr>";
                                    $totoalpay = 0;
                                    while ($data1 = mysqli_fetch_assoc($query1)){
                                    $name_of_customer = $data1['name_of_customer'];
                                    $payment_amount = $data1['payment_amount'];
                                    $payment_date	 = $data1['payment_date'];
                                    $totoalpay	 += $payment_amount;
                                    
                                    echo "<tr> 
                                            <td>$data_list[$name_of_customer]</td>
                                            
                                            <td>৳$payment_amount</td>
                                            <td>$payment_date</td>
                                            <td>৳$totoalpay</td>
                                            
                                            
                                         </tr>";
                                    }

                                echo "</table>";

                                } echo "</br><br>";
                                ini_set('display_errors', 0);

                                $stilldue = $totalbill - $totoalpay;
                                echo "<h2> Still Due  $stilldue TK </h2>";
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