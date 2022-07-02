<?php 
//call mysqli connection page
include("connection.php");
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

    <title>List Of Category</title>
    <style>
      
    table, th, td {
      border:1px solid #198754;
      padding:5px;
      text-align: center;
    
    }
    .mainclass{
      background: hsla(211, 96%, 62%, 1);

    background: linear-gradient(90deg, hsla(211, 96%, 62%, 1) 0%, hsla(295, 94%, 76%, 1) 100%);

    background: -moz-linear-gradient(90deg, hsla(211, 96%, 62%, 1) 0%, hsla(295, 94%, 76%, 1) 100%);

    background: -webkit-linear-gradient(90deg, hsla(211, 96%, 62%, 1) 0%, hsla(295, 94%, 76%, 1) 100%);

    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#439CFB", endColorstr="#F187FB", GradientType=1 );

    }
</style>
  </head>
  <body>
  <div class="container mt-3">
    <!-- Addeding top menu  -->
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">


                <div class="col-sm-12">
                  <div class=" mainclass shadow p-3 mb-5 bg-body rounded" >
                  

                    <?php

                      /* Showing data from database
                      category is table name
                      */
                      $sql    = "SELECT * FROM category WHERE category_entrydate >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
                      

                      $query  = $conn->query($sql);
                      echo "<table >
                      <tr >
                      <th> Category Name </th>  
                      <th>Entry Date</th> <th > Action </th></tr>"; 
                      while($data = mysqli_fetch_assoc($query)){
                          $category_id = $data['category_id'];
                          $Category_name = $data['category_name'];
                          $category_entry_date = $data['category_entrydate'];

                          /* echo  data in table row field */
                          echo " <tr> 
                          <td> $Category_name  </td> 
                          <td> $category_entry_date </td>  
                          <td><a href='edit_category.php?id=$category_id'> Edit </a></td> 
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
          <!-- Footer section -->
            <p class="text-center">Copyright mohammad gas service</p>
        </div>    
        
        </div>

    </div>


    


   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>