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

    <style>
  .mainform{
    background-image:url(assets/9.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
                <div class="mainclass">

                <?php 
                /* Collect data from field */

                if(isset($_GET['name_of_customer'])){
                    $name_of_customer   = $_GET['name_of_customer'];
                    $payment_amount     = $_GET['payment_amount'];
                    $payment_date       = $_GET['payment_date'];
                    $sql = "INSERT INTO bill_collection(name_of_customer, payment_amount, payment_date) VALUE ('$name_of_customer', '$payment_amount', '$payment_date')";

                    //ceheck connection
                if($conn->query($sql) ==  true){
                    echo "Product insert successfuilly";
                  }
                  else{
                    echo "Something wrong here";
                  }
                
  
                //go to outside when sent a data
                header("location:bill_collection.php");
                            exit;
                }
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class=" mainform shadow p-3 mb-5 bg-body rounded" method="GET">

                        <h3>Name Of Customer</h3>
                        <select name="name_of_customer" class="p-2 rounded " style="width:250px" id="">
                          <?php
                            //calling datalist function for select customer name
                            data_list1 ('customer', 'customer_id', 'customer_name');
                            ?>
                            </select> <br><br>
                            <h3>Payable Amount</h3>
                            <input class="p-2 rounded " style="width:250px" type="text" name="payment_amount" ><br><br>

                            <h3>Payment Date</h3>
                            <input class="p-2 rounded " style="width:250px" type="date" name="payment_date" ><br><br>

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
