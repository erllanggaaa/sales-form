<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_web = mysqli_real_escape_string($db, $_POST['id_web']);
$title = mysqli_real_escape_string($db, $_POST['title']);

$logo = $_FILES['logo']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($logo != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $logo); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['logo']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$logo; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE web SET title = '$title', logo = '$nama_gambar_baru'";
                    $query .= "WHERE id_web = '$id_web'";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data edited successfully!');window.location='././dashboard';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Only jpg or png!');window.location='././dashboard';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE web SET title = '$title'";
      $query .= "WHERE id_web = '$id_web'";
      $result = mysqli_query($db, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data edited successfully!');window.location='././dashboard';</script>";
      }
    }
?>