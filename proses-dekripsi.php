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

$final_file = $upload_dir.$file;
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

$db_kunci;

$sql = "SELECT * FROM `tb_files` WHERE `file`='$final_file_name'";
$query = mysqli_query($connect, $sql);						
							
while ($row = mysqli_fetch_array($query)){
    $file = $row['file'];
    $db_kunci = $row['kunci'];
}

if($db_kunci==$kunci){
    if(move_uploaded_file($file_tmp_name , $path)) {

        // dekripsi
        $content_file = file_get_contents('files/'.$file);

        //prosess
        $cipher_algo = "AES-128-CTR"; //The cipher method, in our case, AES 
        $iv_length = openssl_cipher_iv_length($cipher_algo); //The length of the initialization vector
        $option = 0; //Bitwise disjunction of flags
        $decrypt_iv = '8746376827619797'; //Initialization vector, non-null
        $decrypt_key = $kunci; // The encryption key|
        $file_open = fopen('files/'.$file, 'wb');
        $decrypted_string=openssl_decrypt ($content_file, $cipher_algo, $decrypt_key, $option, $decrypt_iv);

        $cipher  = $decrypted_string;
        fwrite($file_open, $cipher);
        fclose($file_open);
        // end dekripsi

        $query="INSERT INTO `tb_files`(`file`, `size`, `tipe_file`, `waktu_enkripsi`,  `status`, `kunci`) VALUES ('$final_file_name', '$filesize', '$fileExtension', '$lama', '1','$kunci')"; 

        if (mysqli_query($connect, $query)){   
            header("location:index.php?m=berhasil");
        }

    }else{
        echo 'Gagal';
    }

}else{
    // header("location:dekripsi.php?m=gagal&id=".$id_file);
    echo 'gagal dekrip';
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