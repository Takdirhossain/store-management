<?php 
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

    <title>Edit Category</title>
  </head>
  <body>
  <div class="container mt-3">
        <?php include_once("topbar.php"); ?> 

        <div class="container-foulid">
            <div class="row">
                

                <div class="col-sm-12">
                   <div class="mainclass">
                   <?php 
                     /* Selecting data accrodin database id
                     $data take fetching data from databse using query
                     $category_id, $category_name, $category_entrydate value stored those
                     */
                        if(isset($_GET['id'])){
                            $getId = $_GET['id'];

                            $sql      = " SELECT * FROM category WHERE 	category_id = $getId";
                            $query    = $conn -> query($sql);
                            $data     = mysqli_fetch_assoc($query);

                            $category_id        = $data['category_id'];
                            $category_name      = $data['category_name'];
                            $category_entrydate =  $data['category_entrydate'];
                          }

                         /* 
                          updateing database using sql update query
                          using get method for date new data from user field 
                         */
                          if(isset($_GET['category_name'])){
                              $new_category_name      = $_GET['category_name'];
                              $new_category_entrydate = $_GET['category_entrydate'];
                              $new_category_id        = $_GET['category_id'];
                              $sql1                    = "UPDATE category SET      category_name='$new_category_name', category_entrydate	= '$new_category_entrydate' WHERE category_id = '$new_category_id' ";

                              if($conn->query($sql1) == TRUE){
                                  echo "Update Succesfuilly";
                              }else{
                                echo  "Error updating record: " . $conn->error;
                              }

                          }
                          
                      ?>
                      

                      <form  class="shadow p-3 mb-5 bg-body rounded" action="edit_category.php" method="GET">
                          <!-- Value is for showing data from databse -->
                          <div class="category">
                          <h3>Category Name: </h3>
                          <input class="p-2 rounded " style="width:250px" type="text" name="category_name" value="<?php echo $category_name?> "> </br> </br>

                          <h3>Category Date: </h3>
                          <input class="p-2 rounded " style="width:250px" type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>" > <br>

                          <input type="text" name="category_id" value="<?php echo $category_id?> " hidden><br>

                          <button type="submit" value="submit" class="btn btn-lg btn-success ">Update</button>
                          
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





    

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>