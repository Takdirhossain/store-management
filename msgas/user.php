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

</style>
  
  </head>
  <body>

  <!-- addeding header navigation -->
  <div class="container mt-3">
       

        
        <div class="container-foulid">
            <div class="row">
              
               


                <div class="col-sm-12">
                   
                <div class="section">
                <?php 
                if(isset($_GET['user_first_name'])){
                    $user_first_name    = $_GET['user_first_name'];
                    $user_last_name     = $_GET['user_last_name'];
                    $user_email         = $_GET['user_email'];
                    $user_pass          = $_GET['user_pass'];

                    $sql = "INSERT INTO user (user_first_name, user_last_name, user_email, user_pass) VALUE ('$user_first_name', '$user_last_name', '$user_email', '$user_pass')";

                    //databse connection
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                      
                      $conn->close();
                       //go to outside while send a data 
                       header("location:user.php");
                       exit;
                }
                
                ?>  
                
                <!-- user submiting form-->
                  <form  action="user.php" class="mainform shadow p-3 mb-5 bg-body rounded" method="GET">
                       
                      <div class="mainclass">
                      <h4>Enter Your First Name: </h4>            
                          <input class="p-2 rounded " style="width:250px"  type="text" name="user_first_name"  ><br><br>
                                    
                        <h4 >Enter Your Last Name: </h4>                
                        <input type="text" class="p-2 rounded" style="width:250px" name="user_last_name"> <br><br>
                        
                        <h4 >Enter Your Email: </h4>                     
                        <input type="email" style="width:250px" class="p-2 rounded" name="user_email"> <br><br>

                        <h4 >Enter Your Password: </h4>                     
                        <input type="password" class="p-2 rounded" style="width:250px" name="user_pass"> <br><br>
                        
                        
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