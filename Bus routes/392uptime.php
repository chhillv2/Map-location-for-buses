<?php    
 $db_host = "localhost";    
 $db_username = "root";    
 $db_pass = "root";   
 $db_name = "392upp";  

 @($GLOBALS["___mysqli_ston"] = mysqli_connect("$db_host",  "$db_username",  "$db_pass")) or die("can not connect to mysql"); 
 @mysqli_select_db($GLOBALS["___mysqli_ston"], $db_name) or die("no database"); 
 echo "successful connection"; 
 $result_query = "SELECT * FROM `392upp`"; 
     
    $run_result = mysqli_query($GLOBALS["___mysqli_ston"], $result_query); 
     
    if(mysqli_num_rows($run_result)<1){ 
     
    echo "<center><b>Oops! sorry, nothing was found in the database!</b></center>"; 
    exit(); 
     
    } 
     
    while($row_result=mysqli_fetch_array($run_result)){ 
         
        $site_title=$row_result['AveragePrice']; 
        $site_link=$row_result['stop']; 
        $site_link1=$row_result['date']; 
        $site_link2=$row_result['time']; 
       

     
    echo "<div> 
         
        <h2>$site_title $site_link $site_link1 - $site_link2</h2> 
        </div>"; 

        }
 ?> 
<!DOCTYPE html>
<html>
<head>
    <title>392up time</title>
    <style type="text/css">
        body{
            background-color: #f5deb3;
        }
    </style>
</head>
<body>

</body>
</html>

