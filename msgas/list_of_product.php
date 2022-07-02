<?php 
//call mysqli connection page
include("connection.php");
  
?>
 <?php 
        /* fetching category id for show category name by id from category table

         */
       $sql1          = "SELECT * FROM category";
       $query1        = $conn->query($sql1);
        /* 
        The datalist array veriable store the data
        */
       $data_list     = array();
       while ($data1=  mysqli_fetch_assoc($query1)){
             $category_name = $data1['category_name'];
             $category_id   = $data1['category_id'];

             $data_list[$category_id] = $category_name;
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

    <title>List Of Product</title>
    <style>
      table, th, td {
        border:1px solid #198754;
        padding:10px;
        text-align: center;
        background-image:url(assets/7.jpg);
      background-position: center;
      background-repeat: no-repeat;
    background-size: cover;
    }
    .mainclass{
      display: flex;
      
                  
    }
</style>
  </head>
  <body>
    
  <div class="container mt-3">
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">


                <div class="col-sm-12">
                   <div class="mainclass  shadow p-3 mb-5 bg-body rounded">
                   <?php

                     /* showing product from the product table in table 
                      */ 
                      $sql    = "SELECT * FROM product WHERE product_entry_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
                      $query  = $conn->query($sql);
                      echo "<table border=''>
                      <tr >
                      <th> Product Name </th>  
                      <th>Brand Name</th> 

                      <th>product Code</th>  
                      <th> entry Date</th>  

                      <th > Action </th>
                      </tr>"; 
                      /* fetching product from product table 
                       */
                      while($data = mysqli_fetch_assoc($query)){
                          $product_id         = $data['product_id'];
                          $product_name       = $data['product_name'];
                          $product_category   = $data['product_category'];
                          $product_code       = $data['product_code'];
                          $product_entry_date = $data['product_entry_date'];
                          
                          echo " <tr> 
                          <td> $product_name  </td>
                          <td> $data_list[$product_category] </td> 
                          <td> $product_code  </td> 
                          <td> $product_entry_date </td> 
                          <td><a href='edit_product.php?id=$product_id'> Edit </a></td> 
                          </tr> ";
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







    
   

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>