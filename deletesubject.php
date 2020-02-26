<?php
include 'connection.php';

if($_POST['show_id'])
{
    $id=$_POST['show_id'];
  
}
else{
    die();
}

$sql="delete from subjects where sid=$id";

$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:addsubject.php");
    
}

pg_close($db);
?>