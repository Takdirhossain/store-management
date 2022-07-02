<?php 
    /* login system */
    session_start();
    $user_first_name = $_SESSION['user_first_name'];
    $user_last_name  = $_SESSION['user_last_name'] ;
    if(!empty ( $user_first_name) && !empty($user_last_name)){

   
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
    
</style>

</head>
  <body>
    <div class="container mt-3">
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">
               


                <div class="col-sm-12">
                   <div  class="mt-2 p-2 d-flex justify-content-between">

                    <div class="p-2 col-sm-3">
                        <a href="add_category.php"> <i class="fa-solid fa-folder-plus fa-4x text-success"></i></a>
                        <p>Add Category</p>
                    </div>

                    <div class=" p-2 col-sm-3">
                    <a href="list_of_category.php"> <i class="fa-solid fa-folder-open fa-4x text-success"></i></a>
                        <p>List Of Category</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="add_product.php"> <i class="fa-solid fa-gas-pump fa-4x text-success"></i></a>
                        <p>Add Product</p>
                    </div>

                    <div style="margin-left: 25px;" class="col-sm-3">
                    <a href="list_of_product.php"> <i class="fa-solid fa-clipboard-list fa-4x text-success"></i></a>
                        <p>List Product</p>
                    </div>

                   </div>
                   <div class="h4 pb-2 mb-4 text-danger border-bottom border-success">
                    </div>


                   <div class="p-2 d-flex justify-content-between">

                    <div class="col-sm-3">
                        <a href="add_store_product.php"> <i class="fa-solid fa-plus fa-4x text-success"></i></a>
                        <p>Add Store <br> Product</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="list_of_entry_product.php"> <i class="fa-solid fa-list fa-4x text-success"></i></a>
                        <p>List Of <br> Product</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="add_spend_product.php"> <i class="fa-solid fa-cart-plus fa-4x text-success"></i></a>
                        <p>Sale Product</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="list_of_spend_product.php"> <i class="fa-solid fa-file fa-4x text-success"></i></a>
                        <p>Sale List</p>
                    </div>
                   </div>
                   <div class="h4 pb-2 mb-4 text-danger border-bottom border-success">
                    </div>

                    <br><div class="d-flex justify-content-between">
                    <div style="margin-left: 10px;" class="col-sm-3">
                    <a href="add_customer.php"> <i class="fa-solid fa-user-group fa-4x text-success"></i> </a><br>
                        <p>Add Customer</p>
                    </div>

                    <div style="margin-left: 25px;" class="col-sm-3">
                    <a href="list_of_customer.php"><i class="fa-solid fa-people-group fa-4x text-success"></i></a>
                    <p>List Of Customer</p>      
                    </div>

                    <div style="margin-left: 25px;" class="col-sm-3">
                        <a href="bill_collection.php"> <i class="fa-solid fa-hand-holding-dollar fa-4x text-success"></i></a>
                        <p>Due Collection</p>
                    </div>

                    <div style="margin-left: 25px;" class="col-sm-3">
                    <a href="list_of_bill_collection.php"> <i class="fa-solid fa-file-invoice-dollar fa-4x text-success"></i> </a>
                    <p>List Of bill Collection</p>
                    </div>
                   </div>
                   <div class="h4 pb-2 mb-4 text-danger border-bottom border-success">
                    </div>


                   <div class="d-flex justify-content-between">

                    <div class="col-sm-3">
                        <a href="report.php"> <i class="fa-solid fa-chart-line fa-4x text-success"></i> </a>
                        <p>Stock Report</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="login.php"> <i class="fa-solid fa-arrow-right-from-bracket fa-4x text-success"></i> </a><br>
                        <p>Log Out</p>
                    </div>

                    <div class="col-sm-3">
                    <a href="collection_report.php"> <i class="fa-solid fa-sack-dollar fa-4x text-success"></i> </a><br>
                        <p>Collection Report</p>
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
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
 }else{
   header('location:login.php');
 }
?> 