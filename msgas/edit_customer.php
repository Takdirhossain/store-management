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
                        if(isset($_GET ['id'])){
                          $getid            = $_GET ['id'];
                          $sql              = "SELECT * FROM customer WHERE customer_id = $getid";
                          $query            = $conn->query($sql);
                          $data             = mysqli_fetch_assoc($query);
                          $customer_id      = $data['customer_id'];
                          $customer_name    = $data['customer_name'];
                          $customer_address = $data['customer_address'];
                          $customer_price	  = $data['customer_price'];
                        }

                        if(isset($_GET['customer_name'])){
                          $customer_name = $_GET['customer_name'];
                          $customer_address = $_GET['customer_address'];
                          $customer_price = $_GET['customer_price'];
                          $customer_id = $_GET['customer_id'];
                          $sql = "UPDATE customer SET customer_name = '$customer_name', customer_address = '$customer_address', customer_price = '$customer_price' WHERE customer_id = '$customer_id' ";
                          if ($conn->query($sql) == TRUE) {
                            echo "Update Succesfuilly";
                          } else {
                            echo  "Error updating record: " . $conn->error;
                          }
                        }
                        ?>

                       <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mainform shadow p-3 mb-5 bg-body rounded">

                        <div class="formclass">
                            <h3>Customer Name:</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_name" type="text" placeholder=" Example As The Dining Lounge" value="<?php echo $customer_name ?>"><br><br>

                            <h3>Customer Address:</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_address" type="text" placeholder="Wori" value="<?php echo $customer_address; ?>"><br><br>

                            <h3>Product Price</h3>
                            <input class="p-2 rounded " style="width:350px" name="customer_price" type="text" placeholder="Example As 12KG 1400" value="<?php echo $customer_price ?>"><br><br>
                            <input class="p-2 rounded " style="width:350px" name="customer_id" type="text" placeholder="Example As 12KG 1400" value="<?php echo $customer_id ?>" hidden><br><br>

                            <button type="submit" value="submit" name="submit" class="btn btn-lg btn-success ">Update</button>
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
