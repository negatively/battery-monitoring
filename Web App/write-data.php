<?php

    //Variabel database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testiot";

    $conn = mysqli_connect("$servername", "$username", "$password","$dbname");

    // Prepare the SQL statement

    $var1 = $_GET["data1"];
    $var2 = $_GET["data2"];
    $var3 = $_GET["data3"];
    $var4 = $_GET["data4"];
    $var5 = $_GET["data5"];
    $var6 = $_GET["data6"];
    
    $result = mysqli_query ($conn,"INSERT INTO datasensor (battery1, battery2, battery3, battery4, battery5, battery6)
                                    VALUES ('$var1','$var2','$var3','$var4','$var5','$var6')");    
    
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($conn));
        }  
?>