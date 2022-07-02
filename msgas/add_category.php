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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <title>Add Category</title>
<style>
  .mainform{
    background-image:url(assets/1.jpg);
    background-position: center;
background-repeat: no-repeat;
background-size: cover;
  }
</style>
  
  </head>
  <body>

  <!-- addeding header navigation -->
  <div class="container mt-3">
        <?php include_once("topbar.php"); ?> 

        
        <div class="container-foulid">
            <div class="row">
              
               


                <div class="col-sm-12">
                   
                <div class="section">
                  <?php 
                  //insert new brand name in databse 
                      if(isset($_GET['category_name'])){
                          $category_name      = $_GET['category_name'];
                          $category_entrydate = $_GET['category_entrydate'];
                          $sql = "INSERT INTO category(category_name, category_entrydate)         VALUES ('$category_name', '$category_entrydate')";

                          

                          //databse connection
                          if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                          } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                          }
                          
                          $conn->close();
                          //go to outside while send a data 
                          header("location:add_category.php");
                          exit;
                      }
                    

                  ?>
                
                <!-- user submiting form-->
                  <form  action="add_category.php" class="mainform shadow p-3 mb-5 bg-body rounded" method="GET">

                      <div style=" padding:50px;" class="mainclass">
                      <h4 style="color: white;">Add New Brand: </h4>
                        <div class="inputbox">
                        
                          <input class="p-2 rounded " style="width:250px"  type="text" name="category_name" placeholder="Example As Omera " >
                          
                        </div> </br>
                       

                        <h4 style="color: white;">Entry Date: </h4>
                        <div class="inputbox">
                        <input type="date" class="p-2 rounded" style="width:250px" name="category_entrydate"> 
                        
                        </div><br>
                        
                        
                        <button type="submit" value="submit" class="btn btn-lg btn-success ">Submit</button>
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