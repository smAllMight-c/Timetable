<?php
include 'connection.php';

if($_POST['show_id'])
{
    $id=$_POST['show_id'];
    echo "HERE";
}
else{
    die();
}

$sql="delete from teacher where tid=$id";

$ret = pg_query($db, $sql);
if(!$ret) {
   echo pg_last_error($db);
} else {
    
       
        header("Location:addteacher.php");
    
}

pg_close($db);
?>