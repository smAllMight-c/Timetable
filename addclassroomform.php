<?php

include 'connection.php';
if (isset($_POST['CNO']) && isset($_POST['CN'])) {
    $name = $_POST['CN'];
    $cno = $_POST['CNO'];
   
} else {

    die();
}




$sql="insert into classroom values  ($cno,'$name')";


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:addclassroom.php");
    
  
}


pg_close($db);

?>