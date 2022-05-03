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

$final_file = $upload_dir.strtolower($file);
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

$sql = "SELECT * FROM `tb_files` WHERE `kunci`='$kunci'";
$query = mysqli_query($connect, $sql);       
$cek = mysqli_num_rows($query);

if($cek == 0){
  if(move_uploaded_file($file_tmp_name , $path)) {

    // enkripsi
    $content_file = file_get_contents('files/'.$final_file_name);
    
    //prosess
    $cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
    $iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
    $option = 0; //Bitwise disjunction of flags
    $encrypt_iv = '8746376827619797'; //Initialization vector, non-null
    $encrypt_key = $kunci; // The encryption key
    // Use openssl_encrypt() encrypt the given string

    $file_open = fopen('files/'.$final_file_name, 'wb');
    $encrypted_string = openssl_encrypt($content_file, $cipher_algo, $encrypt_key, $option, $encrypt_iv);
    fwrite($file_open, $encrypted_string);
    fclose($file_open);

    // end enkripsi

    $query="INSERT INTO `tb_files`(`file`, `size`, `tipe_file`, `waktu_enkripsi`,  `status`, `kunci`) VALUES ('$final_file_name', '$filesize', '$fileExtension', '$lama', '0','$kunci')"; 

    if (mysqli_query($connect, $query)){   
        header("location:index.php?m=berhasil");
    }

  }else{
    echo 'Gagal';
  }
}else{
  header("location:enkripsi-file.php?m=gagal");
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