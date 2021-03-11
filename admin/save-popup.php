<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_form = mysqli_real_escape_string($db, $_POST['id_form']);
$head_modal = mysqli_real_escape_string($db, $_POST['head_modal']);
$content_modal = mysqli_real_escape_string($db, $_POST['content_modal']);
$target_modal = mysqli_real_escape_string($db, $_POST['target_modal']);
$power_modal = mysqli_real_escape_string($db, $_POST['power_modal']);

$image_modal = $_FILES['image_modal']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($image_modal != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $image_modal); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['image_modal']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$image_modal; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE form SET head_modal = '$head_modal', content_modal = '$content_modal', target_modal = '$target_modal', power_modal = '$power_modal', image_modal = '$nama_gambar_baru'";
                    $query .= "WHERE id_form = '$id_form'";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data edited successfully!');window.location='././Popup-Modal';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Only jpg or png!');window.location='././Popup-Modal';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE form SET head_modal = '$head_modal', content_modal = '$content_modal', target_modal = '$target_modal', power_modal = '$power_modal'";
      $query .= "WHERE id_form = '$id_form'";
      $result = mysqli_query($db, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data edited successfully!');window.location='././Popup-Modal';</script>";
      }
    }
?>