<?php
include 'connection.php';

if($_POST['show_id'])
{
    $id=$_POST['show_id'];
  
}
else{
    die();
}

$sql="delete from department where did=$id";

$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:adddepartment.php");
    
}

pg_close($db);
?>