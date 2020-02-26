<?php

include 'connection.php';
if (isset($_POST['DNO']) && isset($_POST['DN'])) {
    $name = $_POST['DN'];
    $dno = $_POST['DNO'];
   
} else {

    die();
}




$sql="insert into department values  ($dno,'$name')";


$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:adddepartment.php");
    
  
}


pg_close($db);

?>