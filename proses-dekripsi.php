<?php
require_once 'config/koneksi.php';
require_once 'config/AES.php';

$id_file = $_GET['id'];
$kunci = $_POST['kunci'];

$file;
$db_kunci;

$sql = "SELECT * FROM `tb_files` WHERE `id_file`='$id_file'";
$query = mysqli_query($connect, $sql);						
							
while ($row = mysqli_fetch_array($query)){
    $file = $row['file'];
    $db_kunci = $row['kunci'];
}

echo '<br>file encrypt: '.$file;



if($db_kunci==$kunci){

    // dekripsi
    $content_file = file_get_contents('files/'.$file);
    $aes = new AES($kunci);
    $file_open = fopen('files/'.$file, 'wb');
    $cipher  = $aes->decrypt($content_file);
    fwrite($file_open, $cipher);
    fclose($file_open);
    // end dekripsi

    $query="UPDATE `tb_files` SET `status`='2' WHERE `id_file`='$id_file'"; 
    

    if (mysqli_query($connect, $query)){   
        header("location:index.php?m=berhasil");
    }
}else{
    header("location:dekripsi.php?m=gagal&id=".$id_file);
}

?>