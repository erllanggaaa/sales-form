<?php
include("includes/koneksi.php");
$form = mysqli_query($db, "SELECT * FROM form WHERE id_form");
$output = mysqli_fetch_array($form);

$web = mysqli_query($db, "SELECT * FROM web WHERE id_web");
$output2 = mysqli_fetch_array($web);
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $output2["title"]; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="./assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="./assets/vendor/inputmask/css/inputmask.css" />
    <style>
    body {
        padding-top: 30px;
    }
    #mapa {
 margin: 10px;
 width: 600px;
 height: 300px; 
 padding: 2px;
 }
 .popup{
    width: 900px;
    margin: auto;
}
.popup img{
    cursor: pointer
}
.show{
    display: none;
}
.show .overlay{
    position: absolute;
}
.show .img-show{
    width: 240px;
    height: 180px;
    background: #FFF;
    position: absolute;
    top: 75%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/

.float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
  font-size:30px;
    box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
    margin-top:16px;
}
    </style>
    <script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
    <script src="./er.js"></script>
    <script src="./aset/js/geo.js"></script>
    <script src="./aset/js/geo-min.js"></script>
    <script>
        if(geo_position_js.init()){
            geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true});
        }
        else{
            div_isi=document.getElementById("div_isi");
            div_isi.innerHTML ="Tidak ada fungsi geolocation";
        
            div_isi2=document.getElementById("div_isi2");
            div_isi2.innerHTML ="Tidak ada fungsi geolocation";
        }

        function success_callback(p)
        {
            latitude=p.coords.latitude ;
            longitude=p.coords.longitude;
            pesan1 = '<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q='+latitude +','+longitude +'&amp;key=AIzaSyBxwfY29ToB1ln9ugcO1HIeUTbWvLry25I"></iframe>';
            div_isi1=document.getElementById("div_isi1");
            //alert(pesan);
            div_isi1.innerHTML =pesan1;

            latitude=p.coords.latitude ;
            longitude=p.coords.longitude;
            pesan = '<input type="hidden" name="latitude_current" class="form-control col-lg-4" value="'+latitude +'" autocomplete="off" required/>';
            div_isi=document.getElementById("div_isi");
            //alert(pesan);
            div_isi.innerHTML =pesan;
        
            latitude=p.coords.latitude ;
            longitude=p.coords.longitude;
            pesan2 = '<input type="hidden" name="longitude_current" class="form-control col-lg-4" value="'+longitude +'" autocomplete="off" required/>';
            div_isi=document.getElementById("div_isi2");
            //alert(pesan);
            div_isi2.innerHTML =pesan2;
        }
        
        function error_callback(p)
        {
            div_isi=document.getElementById("div_isi");
            div_isi.innerHTML ='error='+p.message;
        
            div_isi2=document.getElementById("div_isi2");
            div_isi2.innerHTML ='error='+p.message;
        }        
    </script>

</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=<?php echo $output["number_wa_float"]; ?>&text=<?php echo $output["content_wa_float"]; ?>" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
  
    <div class="container col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
        <div class="card">
            <div class="card-header text-center"><span class="splash-description"><big><?php echo $output["header"]; ?></big></span></div>
            <div class="card-body">
                <?php 
    if(isset($_GET['action'])){
        if($_GET['action'] == "success"){
            echo "<div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Added Successfully!
            </div>";
         }else if($_GET['action'] == "failed"){
            echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Failed to Add!
            </div>";
        }
    }
    ?>
                <form action="add.php" method="post">
                   <!-- 
     <button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
 <p id="demo"></p>
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude + 
  "<br><b>Lokasi Telah Aktif</b>"; 
}
</script>     -->
                <div class="form-group">
                    <label>TYPE OF APPLICATION <font color="red">*</font></label>
                        <select id="app" name="application" class="form-control col-lg-3" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">-- Select --</option>
                                            <option value="NEW NEW">NEW NEW</option>
                                            <option value="MTU">MTU</option>
                                        </select>
                        <div id="mtu" style="display: none;">
                    <input type="text" name="no" placeholder="Masukkan No Del/Streamyx" class="form-control col-lg-5">
                    </div>
                </div>
                <div class="form-group">
                    <label>PROJECT NAME <font color="red">*</font></label><br>
                    <label><small>Sila nyatakan kawasan/lokasi projek unifi</small></label>
                        <input type="text" class="form-control col-lg-6" name="project_name" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>SALES CHANNEL <font color="red">*</font></label>
                    <select id="sales" name="sales_channel" class="form-control col-md-4" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Select --</option>
                        <?php
                $sc="select * from sales_channel where id_sales_channel AND status_sales_channel='active'";
                $y=mysqli_query($db,$sc);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[name_sales_channel]\" $pilih>$z[name_sales_channel]</option>";
                }
                ?>
                <option value="">OTHERS</option>
                    </select>
                    <div id="salesc" style="display: none;">
                    <input type="text" name="sales_channel2" class="form-control col-lg-4">
                    </div>
                </div>
                <div class="form-group">
                    <label>SALES PERSON NAME <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-6" name="sales_person_name" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>SALES PERSON CONTACT NO <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-4" maxLength="15" name="sales_person_contact" placeholder="" autocomplete="off" onkeypress="return hanyaAngka(event)" required>
                </div>
                <div class="form-group">
                    <label>CUSTOMER NAME <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-6" name="customer_name" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>CUSTOMER ID <font color="red">*</font></label>
                        <select id="cid" name="customer_id" class="form-control col-lg-3" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">-- Select --</option>
                                            <option value="MYKAD">MYKAD</option>
                                            <option value="PASSPORT">PASSPORT</option>
                                            <option value="BRN">BRN</option>
                                        </select>
                </div>
                <div id="mykad" style="display: none;" class="form-group">
                    <label>CUSTOMER MYKAD NO <font color="red">*</font></label>
                        <input type="text" class="form-control mykad-inputmask col-lg-6" name="customer_id_no" id="ssn-mask" placeholder="" autocomplete="off">
                </div>
                <div id="passport" style="display: none;" class="form-group">
                    <label>CUSTOMER PASSPORT NO <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-6" name="customer_id_no2" maxLength="10" placeholder="" autocomplete="off">
                </div>
                <div id="brn" style="display: none;" class="form-group">
                    <label>CUSTOMER BRN NO <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-6" name="customer_id_no3" maxLength="10" placeholder="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>EMAIL <font color="red">*</font></label>
                        <input type="text" class="form-control email-inputmask col-lg-5" id="email-mask" name="email" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>1st CONTACT NO <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-4" maxLength="15" name="contact1" placeholder="" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>2nd CONTACT NO <font color="red">*</font></label>
                        <input type="text" class="form-control col-lg-4" name="contact2" maxLength="15" placeholder="" onkeypress="return hanyaAngka(event)" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>3rd CONTACT NO <small>(Optional)</small></label>
                        <input type="text" class="form-control col-lg-4" name="contact3" maxLength="15" placeholder="" autocomplete="off" onkeypress="return hanyaAngka(event)" >
                </div>
                <div class="form-group">
                    <label>INSTALLATION ADDRESS <font color="red">*</font></label><br>
                    <label><small>Compulsory to input Lot No/House No/ SESB Meter No.</small></label>
                        <textarea class="form-control col-lg-10" name="installation_address" placeholder="" required></textarea>
                </div>
                <div class="form-group">
                <label>LOCATION <font color="red">*</font></label>
                <select id="location" name="location" class="form-control col-lg-4" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">-- Select --</option>
                                            <option value="CURRENT ADDRESS">CURRENT ADDRESS</option>
                                            <option value="OTHER ADDRESS">OTHER ADDRESS</option>
                                        </select>
                </div>
                <div id="current" style="display: none;">
                <div class="form-group">
                    <div id="div_isi1"></div><br>
                    <div id="div_isi"></div><br>
                    <div id="div_isi2"></div>       
                </div>
                </div>
                <div id="other" style="display: none;">
                    <div class="form-group"><button><a href="https://www.maps.ie/coordinates.html" target="_blank">SEARCH LAT & LONG MANUALLY</a></button></div>
                <div class="form-group">
                    <label>LATITUDE OTHER <font color="red">*</font></label>
                    <input type="text" name="latitude_other" class="form-control col-lg-4" autocomplete="off"/>     
                </div>
                <div class="form-group">
                    <label>LONGITUDE OTHER <font color="red">*</font></label>
                    <input type="text" name="longitude_other" class="form-control col-lg-4" autocomplete="off"/>
                </div>
                </div>
                <div class="form-group">
                    <label>EFORM NO <font color="red">*</font></label><br>
                    <label><small>Please input customer's IC/Passport/BRN number if you are from TM Direct Sales</small></label>
                        <input type="text" class="form-control col-lg-5" name="eform_no" placeholder="" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label>SEGMENT <font color="red">*</font></label>
                        <select id="segment" name="segment" class="form-control col-lg-3" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <option selected disabled="disabled" value="">-- Select --</option>
                                            <option value="CONSUMER">CONSUMER</option>
                                            <option value="BIZ">BIZ</option>
                                        </select>
                </div>
                <div id="packagec" style="display: none;" class="form-group">
                    <label>PACKAGE <font color="red">*</font></label><br>
                    <?php
                    $package1 = mysqli_query($db, "SELECT * FROM package WHERE segment_package='Consumer' AND status_package='active'");
                    while($row = mysqli_fetch_assoc($package1)){
                    ?>
                    <?php if ($row['name_file']): ?>
                    <div class="popup">
                    <img src="././admin/package/<?php echo $row['name_file']; ?>" alt="<?php echo $row['name_package']; ?>" title="<?php echo $row['name_package']; ?>" width="130" height="65">
                    </div>
<div class="show">
  <div class="overlay"></div>
  <div class="img-show">
    <span>X</span>
    <img src="">
  </div>
</div>
<?php endif; ?>
                    <br>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="package" value="<?php echo $row['name_package']; ?>" class="custom-control-input" required>
                        <span class="custom-control-label"><?php echo $row['name_package']; ?></span>
                    </label><br>
                    <?php } ?>
                </div>
                <div id="packageb" style="display: none;" class="form-group">
                    <label>PACKAGE <font color="red">*</font></label><br>
                    <?php
                    $package1 = mysqli_query($db, "SELECT * FROM package WHERE segment_package='Biz' AND status_package='active'");
                    while($row = mysqli_fetch_assoc($package1)){
                    ?>
                    <?php if ($row['name_file']): ?>
                    <div class="popup">
                    <img src="././admin/package/<?php echo $row['name_file']; ?>" alt="<?php echo $row['name_package']; ?>" title="<?php echo $row['name_package']; ?>" width="130" height="65">
                    </div>
<div class="show">
  <div class="overlay"></div>
  <div class="img-show">
    <span>X</span>
    <img src="">
  </div>
</div>
<?php endif; ?>
                    <br>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="package" value="<?php echo $row['name_package']; ?>" class="custom-control-input" required>
                        <span class="custom-control-label"><?php echo $row['name_package']; ?></span>
                    </label><br>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>ZBC <font color="red">*</font></label>
                        <select name="zbc" class="form-control col-md-4" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                        <option selected disabled='disabled' value=''>-- Select --</option>
                        <?php
                $zbc="select * from zbc where id_zbc AND status_zbc='active'";
                $y=mysqli_query($db,$zbc);
                while($z=mysqli_fetch_array($y)){
                echo "
                <option value=\"$z[name_zbc]\" $pilih>$z[name_zbc]</option>";
                }
                ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>REMARKS <small>(Optional)</small></label>
                        <input type="text" class="form-control col-lg-5" name="remarks" autocomplete="off" placeholder="" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $output["power_modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $output["power_modal"]; ?>Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $output["head_modal"]; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12">
                <h1 class="mb-4"><?php echo $output["content_modal"]; ?></h1>
                <img src="././admin/img/<?php echo $output["image_modal"]; ?>" width="434" height="200">
            </div>
          <div class="modal-footer">
            <a href="<?php echo $output["target_modal"]; ?>" target="_blank"><button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button></a>
          </div>
        </div>
      </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="./assets/libs/js/main-js.js"></script>
    <script src="./assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript">
    $(function () {
        $("#app").change(function () {
            if ($(this).val() == "MTU") {
                $("#mtu").show();
            } else {
                $("#mtu").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#sales").change(function () {
            if ($(this).val() == "") {
                $("#salesc").show();
            } else {
                $("#salesc").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#cid").change(function () {
            if ($(this).val() == "MYKAD") {
                $("#mykad").show();
                $("#passport").hide();
                $("#brn").hide();
                }
            else if ( this.value == 'PASSPORT')
                {
                    $("#passport").show();
                    $("#mykad").hide();
                    $("#brn").hide();
                }
            else if ( this.value == 'BRN')
                {
                    $("#brn").show();
                    $("#mykad").hide();
                    $("#passport").hide();
                }
            else {
                $("#mykad").hide();
                $("#passport").hide();
                $("#brn").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#location").change(function () {
            if ($(this).val() == "CURRENT ADDRESS") {
                $("#current").show();
                $("#other").hide();
                }
            else if ( this.value == 'OTHER ADDRESS')
                {
                    $("#other").show();
                    $("#current").hide();
                }
            else {
                $("#current").hide();
                $("#other").hide();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function () {
        $("#segment").change(function () {
            if ($(this).val() == "CONSUMER") {
                $("#packagec").show();
                $("#packageb").hide();
                }
            else if ( this.value == 'BIZ')
                {
                    $("#packageb").show();
                    $("#packagec").hide();
                }
            else {
                $("#packagec").hide();
                $("#packageb").hide();
            }
        });
    });
    </script>
    <script>
    $(function(e) {
        "use strict";
        $(".mykad-inputmask").inputmask("999999-99-9999"),
            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
    <script>
    $(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
    
    });
    </script>
<script>
$('#offf').modal('hide');
$('#onnn').modal('show');
</script>
</body>
 
</html>