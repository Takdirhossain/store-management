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

    <title>Khondorkar</title>


  </head>
  <body>
    <?php 
    //insert new brand name in databse 
        if(isset($_GET['date'])){
            $date      = $_GET['date'];
            $_12kgfiilled = $_GET['12kgfiilled'];






            $sql = "INSERT INTO category(category_name, category_entrydate)         VALUES ('$category_name', '$category_entrydate')";

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
    <form action="add_category.php" method="GET">
        <div class="khondokar">
        <h4>Entry Date: </h4>
        <input type="date" name="date"> <br><br>

        <h4>12KG Filled cylinder </h4>
        <input type="text" name="12kgfiilled"> <br><br>

        <h4>12KG Empty cylinder </h4>
        <input type="text" name="12kgempty"> <br><br>

        <h4>25KG Filled cylinder : </h4>
        <input type="text" name="25kgfiilled"> <br><br>

        <h4>25KG Empty cylinder: </h4>
        <input type="text" name="25empty"> <br><br>

        <h4>35KG Filled cylinder: </h4>
        <input type="text" name="35kgfiilled"> <br><br>

        <h4>35KG Empty cylinder: </h4>
        <input type="text" name="35empty"> <br><br>

        <h4>45KG Filled cylinder: </h4>
        <input type="text" name="45kgfiilled"> </br> <br>

        <h4>45KG Empty cylinder: </h4>
        <input type="text" name="45empty"> </br><br>
        
        </div>
        <button type="submit" value="submit" class="btn btn-outline-primary submit">Submit</button>

    </form>

   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>