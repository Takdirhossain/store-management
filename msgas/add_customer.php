<?php 
//connection with databse
include("connection.php");
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
  .mainform{
    background-image:url(assets/8.jpg);
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
                        /* Collect  data from field using get method */
                        if(isset($_GET['customer_name'])){
                            $customer_name      = $_GET['customer_name'];
                            $customer_address   = $_GET['customer_address'];
                            $customer_price     = $_GET['customer_price'];

                            $sql = "INSERT INTO customer(customer_name, customer_address, customer_price) VALUES ('$customer_name', '$customer_address', '$customer_price')";

                            //ceheck connection
                            if($conn->query($sql) ==  true){
                              echo "Product insert successfuilly";
                          }
                          else{
                              echo "Something wrong here";
                          }
                          //go to outside when sent a data
                          header("location:add_customer.php");
                          exit;
                        }
                        ?>

                       <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mainform shadow p-3 mb-5 bg-body rounded">

                        <div class="formclass">
                            <h3>Customer Name:</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_name" type="text" placeholder="Pizza Town"><br><br>

                            <h3>Customer Address:</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_address" type="text" placeholder="Nazma Tower 4th floor"><br><br>

                            <h3>Product Price</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_price" type="text" placeholder="12KG 1400"><br><br>

                            <button type="submit" value="submit" name="submit" class="btn btn-lg btn-success ">Submit</button>
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
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
