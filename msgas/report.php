<?php
//connection with databse
include("connection.php");


$sql3   = "SELECT * FROM product";
$query3 = $conn->query($sql3);

$data_list     = array();
while ($data3 =  mysqli_fetch_assoc($query3)) {
    $product_id  = $data3['product_id'];
    $product_name   = $data3['product_name'];

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

    <title>Report</title>

    <style>
        table,
        th,
        td {
            border:1px solid #198754;
            padding:2px;
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
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

                                <h2>Select an Iteam</h2>
                                <select name="select_product" id="">
                                    <?php

                                    //Selecting product 
                                    $sql    = "SELECT * FROM product";
                                    $query  = $conn->query($sql);


                                    while ($data = mysqli_fetch_assoc($query)) {
                                        $product_id         = $data['product_id'];
                                        $product_name       = $data['product_name'];


                                    ?>

                                        <option value="<?php echo $product_id; ?>"><?php echo $product_name; ?></option>

                                    <?php } ?>
                                </select>


                                <input type="submit" value="Generate Report"> <br> <br>

                            </form>
                            <h2>Stored Product</h2>
                            <?php

                            //selecting product for geting stored product report
                            if (isset($_GET['select_product'])) {
                                $select_product = $_GET['select_product'];
                                $sqli1 = "SELECT * FROM store_product WHERE store_product_name = $select_product";

                               // $sqli1 = "SELECT * FROM store_product WHERE store_product_entry_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";

                                $query1 = $conn->query($sqli1);
                                echo "<table border=''>
                                <tr >
                                <th> Product Name </th>  
                                <th>Product Quantity</th> 
                                
                                
                                <th> entry Date</th>  
                                <th> Total</th>  

                                
                                </tr>";
                                //totoal veriable for sum all product and get totoal stored product report
                                $total = 0;
                                //shoing product stored list 
                                while ($data1 = mysqli_fetch_assoc($query1)) {
                                    $store_product_name         = $data1['store_product_name'];
                                    $store_product_quantity     = $data1['store_product_quantity'];
                                    $store_product_entry_date   = $data1['store_product_entry_date'];

                                    //sum totoal value
                                    $total += $store_product_quantity;

                                    echo "
           
                                <tr> 
                                    <td> $data_list[$store_product_name] </td> 
                                    <td> $store_product_quantity  </td> 
                                    <td> $store_product_entry_date </td> 
                                    <td>  $total </td> 
                                    
                                    
                                </tr> ";
                                }
                                echo "</table>  </br></br>";
                            }

                            ?>
                            <?php

                            ?>
                            <h2>Sale Product</h2>
                            <?php
                            error_reporting(0);

                            //select selled product from database
                            if (isset($_GET['select_product'])) {
                                $select_product = $_GET['select_product'];
                               // $sqli4 = "SELECT * FROM spend_product WHERE spend_product_name = $select_product";

                                $sqli4 = "SELECT * FROM spend_product WHERE spend_product_entry_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";

                                $query4 = $conn->query($sqli4);
                                echo "<table border=''>
                                <tr >
                                <th> Product Name </th>  
                                <th>Product Quantity</th> 
                                
                                
                                <th> entry Date</th>  

                                <th > Total </th>
                                </tr>";

                                //sellproduct variable for sum totoal sell product
                                $sellproduct = 0;

                                //showing all selling list from databse 
                                while ($data4 = mysqli_fetch_assoc($query4)) {
                                    $spend_product_name         = $data4['spend_product_name'];
                                    $spend_product_quantity     = $data4['spend_product_quantity'];
                                    $spend_product_entry_date   = $data4['spend_product_entry_date'];

                                    //sum totoal selled product
                                    $sellproduct += $spend_product_quantity;

                                    echo " <tr> 
                                        <td> $data_list[$spend_product_name] </td> 
                                        <td> $spend_product_quantity  </td> 
                                        <td> $spend_product_entry_date </td> 
                                        <td> $sellproduct </td> 
                                        </tr> ";
                                }
                                echo "</table> <br> ";
                            }
                            //get instock product 
                            $instock = $total -  $sellproduct;
                            echo "<h2>product In stock $instock </h2>";
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