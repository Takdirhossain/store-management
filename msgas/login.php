<?php 
include("connection.php");
session_start();
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
              
               
              <h2 style="text-align:center ;">Log In </h2>

                <div class="col-sm-12">
                   
                <div class="section">
                <?php 
                /* Php Login system */
                if(isset($_POST['user_email'])){
                    $user_email         = $_POST['user_email'];
                    $user_pass          = $_POST['user_pass'];

                    $sql = "SELECT * FROM user WHERE user_email = '$user_email' AND user_pass = '$user_pass'";

                    $query = $conn->query($sql);
                    if(mysqli_num_rows($query) >0){
                        $data = mysqli_fetch_array($query);
                        $user_first_name = $data['user_first_name'];
                        $user_last_name  = $data['user_last_name'];
                        $_SESSION['user_first_name'] =  $user_first_name;
                        $_SESSION['user_last_name']  =  $user_last_name;

                        header('location:index.php');
                    } else{
                        echo "Undefind something";
                    }


                    //databse connection
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                      
                      $conn->close();
                      
                }
                
                ?>  
                
                <!-- user submiting form-->
                  <form  action="" class="mainform shadow p-3 mb-5 bg-body rounded" method="POST">
                       
                      <div class="mainclass">
                     
                        <h4 >Enter Your Email: </h4>                     
                        <input type="email" style="width:250px" class="p-2 rounded" name="user_email"> <br><br>

                        <h4 >Enter Your Password: </h4>                     
                        <input type="password" class="p-2 rounded" style="width:250px" name="user_pass"> <br><br>
                        
                        
                        <button type="submit" value="submit" class="btn btn-lg btn-success ">Login</button>
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