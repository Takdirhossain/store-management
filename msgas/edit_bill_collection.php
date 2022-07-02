<?php
require("connection.php");
require("function.php")
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bill Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
  <body>
    <div class="container mt-3">
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">

                <div class="col-sm-9">
                <div class="mainclass">

                <?php 
                if(isset($_GET['id'])){
                    $getid = $_GET['id'];
                    $sql = "SELECT * FROM bill_collection WHERE bill_collection_id  = $getid";
                    $query = $conn->query($sql);
                    $data = mysqli_fetch_assoc($query);

                    $bill_collection_id = $data['bill_collection_id'];
                    $name_of_customer   = $data['name_of_customer'];
                    $payment_amount     = $data['payment_amount'];
                    $payment_date       = $data['payment_date'];
                }

                if(isset($_GET['payment_date'])){
                    $new_name_of_customer   = $_GET['name_of_customer'];
                    $new_payment_amount     = $_GET['payment_amount'];
                    $new_payment_date       = $_GET['payment_date'];
                    $new_bill_collection_id = $_GET['bill_collection_id'];

                    $sql = "UPDATE bill_collection SET name_of_customer = '$new_name_of_customer', payment_amount ='$new_payment_amount', payment_date = '$new_payment_date' WHERE bill_collection_id = '$new_bill_collection_id' ";

                    if ($conn->query($sql) == TRUE) {
                        echo "Update Succesfuilly";
                      } else {
                        echo  "Error updating record: " . $conn->error;
                      }
                }
                ?>

                    <?php
                    
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 150px; margin-right:250px;" class="shadow p-3 mb-5 bg-body rounded" method="GET">

                        <h3>Name Of Customer</h3>
                        <select name="name_of_customer" class="p-2 rounded " style="width:250px" id="">
                        <?php
                            //auto selecting product name from 
                            $sql = "SELECT * FROM customer";
                            $query = $conn->query($sql);

                            while ($data = mysqli_fetch_assoc($query)) {
                                $customer_id = $data['customer_id'];
                                $customer_name = $data['customer_name'];
                            ?>
                                <option value='<?php echo $customer_id ?>' <?php if ($name_of_customer == $customer_id) {
                                echo 'SELECTED';
                            } ?>>
                                <?php echo $customer_name; ?>
                                </option>
                            <?php } ?>
                            </select> <br><br>
                            <h3>Payable Amount</h3>
                            <input class="p-2 rounded " style="width:250px" type="text" name="payment_amount" value="<?php echo $payment_amount; ?>" ><br><br>

                            <h3>Payment Date</h3>
                            <input class="p-2 rounded " style="width:250px" type="date" name="payment_date" value="<?php echo $payment_date; ?>" ><br><br>

                            <input class="p-2 rounded " style="width:250px" type="text" name="bill_collection_id" value="<?php echo $bill_collection_id; ?>" hidden >

                            <input type="submit" value="Submit" class="btn btn-lg btn-success ">
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
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
