<?php 
//call mysqli connection page
include("connection.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Of Coustomer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      
      
table, th, td {
  border:1px solid #198754;
  padding:10px;
  text-align: center;
  background-color: #516395;
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
                   <div class="mainclass shadow p-3 mb-5 bg-body rounded">
                   <H2 class="text-center">List Of Customer And Price</H2>
                       <?php 
                       /* Select data from customer table for show */
                        $sql = "SELECT * FROM customer";
                        $query  = $conn->query($sql);
                        echo "<table>
                        <tr>
                        <th>Customer Name </th>
                        <th>Customer Address </th>
                        <th>Customer Product Price </th>
                        <th>Action </th>
                        </tr>";
                        while($data=mysqli_fetch_assoc($query)){
                            $customer_name      = $data['customer_name'];
                            $customer_address   = $data['customer_address'];
                            $customer_price     = $data['customer_price'];
                            $customer_id        = $data['customer_id'];

                            echo "<tr>
                            <td> $customer_name </td>
                            <td> $customer_address </td>
                            <td> $customer_price </td>
                            <td><a href='edit_customer.php?id=$customer_id'> Edit </a></td> 
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
