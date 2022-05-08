<?php

    include 'config/koneksi.php';

    $id_file = $_GET['id'];

    
    $query="DELETE FROM `tb_files` WHERE `id_file`=".$id_file; 

    
    if (mysqli_query($connect, $query)){   
        header("location:index.php");
       
    }
    
?>