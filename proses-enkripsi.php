<?php

// start waktu eksekusi
// ----------------------------------------
$awal = microtime(true);
$bil = 2;
$hasil = 1;
for ($i=1; $i<=10000000; $i++)
{
     $hasil .= $bil;
}
// ----------------------------------------

require_once 'config/koneksi.php';
require_once 'config/path.php';
require_once 'config/AES.php';


$upload_dir = $upload_path;
$server_url = 'http://localhost';

$kunci = $_POST['kunci'];
$file = $_FILES["file"]["name"];
$file_tmp_name = $_FILES["file"]["tmp_name"];

$final_file = $upload_dir.strtolower(rand(1000,1000000).'_'.$file);
$path = preg_replace('/\s+/', '-', $final_file);

// file information
$filesize = $_FILES["file"]["size"];
$filesize = round($filesize / 1024, 2);
$fileExtension = getFileExtension($file);
$file_name = explode('/',$final_file);
$final_file_name = $file_name[count($file_name)-1];

// finish waktu eksekusi
// ----------------------------------------
$akhir = microtime(true);
$lama = ($akhir - $awal)*1000/60;
// ----------------------------------------


if(move_uploaded_file($file_tmp_name , $path)) {

    // enkripsi
    $content_file = file_get_contents('files/'.$final_file_name);
    $aes = new AES($kunci);
    $file_open = fopen('files/'.$final_file_name, 'wb');
    $cipher  = $aes->encrypt($content_file);
    fwrite($file_open, $cipher);
    fclose($file_open);
    // end enkripsi

    $query="INSERT INTO `tb_files`(`file`, `size`, `tipe_file`, `waktu_enkripsi`,  `status`, `kunci`) VALUES ('$final_file_name', '$filesize', '$fileExtension', '$lama', '1','$kunci')"; 

    if (mysqli_query($connect, $query)){   
        header("location:tambah-file.php?m=berhasil");
    }

}else
{
   echo 'Gagal';
}




function replace_extension($filename, $new_extension) {
    $info = pathinfo($filename);
    return $info['filename'] . '.' . $new_extension;
}

function getFileExtension($s) {
    $n = strrpos($s,".");
    if($n===false) 
      return "";
    else
      return substr($s,$n+1);
  }


?>