
    <!-- Conncetion with database !-->
    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "store_db";
    // create connection
    $conn       = new mysqli($servername, $username, $password, $dbName);
    //check connection
    if($conn->connect_error){
        die ("Connection failed: " . $conn->connect_error);
    }
    


    
?>