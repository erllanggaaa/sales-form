<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_package = mysqli_real_escape_string($db, $_POST['id_package']);
$name_package = mysqli_real_escape_string($db, $_POST['name_package']);
$segment_package = mysqli_real_escape_string($db, $_POST['segment_package']);
$status_package = mysqli_real_escape_string($db, $_POST['status_package']);

$name_file = $_FILES['name_file']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($name_file != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $name_file); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['name_file']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$name_file; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'package/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE package SET name_package = '$name_package', segment_package = '$segment_package', status_package = '$status_package', name_file = '$nama_gambar_baru'";
                    $query .= "WHERE id_package = '$id_package'";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data edited successfully!');window.location='././Pack';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Only jpg or png!');window.location='././Pack';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE package SET name_package = '$name_package', segment_package = '$segment_package', status_package = '$status_package'";
      $query .= "WHERE id_package = '$id_package'";
      $result = mysqli_query($db, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data edited successfully!');window.location='././Pack';</script>";
      }
    }
?>