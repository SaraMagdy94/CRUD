<?php
    require("conn.php");
    $id = $_GET['id'];
    $sql="delete from car where id='$id'";

    $res= mysqli_query($dbconn,$sql);

    if($res){
        header("Location:index.php"); 
        echo 'data deleted';
    }
    else {
        'error';
    }

?>