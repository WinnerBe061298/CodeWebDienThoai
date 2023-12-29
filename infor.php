<?php 
    include './connect.php';
?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Smobile</title>
    <link rel="icon" href="img/logos.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
.header_bg {
    background-color: #ecfdff;
    height: 230px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.padding_top1{
    padding-top:20px;
}
.a1{
    padding-top:130px;
}

.a2{
    height: 230px;

}
</style>

<body>

    <?php include 'header.php';?>

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb header_bg">
        <div class="container">
            <div class="row justify-content-center a2">
                <div class="col-lg-8 a2">
                        <div class="a1">
                            <h2>Thông Tin Tài Khoản</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================login_part Area =================-->
    <section class="login_part" style="font-family: arial">
        <div class="container">
            <!-- <div class="row align-items-center "> -->
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a href="#" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-6" style="margin:auto;">
                    <div class="login_part_form" style="padding-top:20px;">            
                        <div class="login_part_form_iner">
                            <?php 
                                foreach (selectAll("SELECT * FROM taikhoan WHERE id=$id_nguoidung") as $item) {
                                    $tencu = $item['hoten'];
                                    $taikhoancu = $item['taikhoan'];
                                    $sdtcu = $item['sdt'];
                                    $anh = $item['anh'];
                                    $loaitk = $item['phanquyen'];
                                    $diachicu = $item['diachi'];
                                }
                                if (isset($_POST["doithongtin"])) {
                                    $hoten = $_POST["hoten"];
                                    $sdt = $_POST["sdt"];
                                    $diachi = $_POST["diachi"];
                                    $anh1 = $_FILES['anh1']['name'];
                                    $tmp1 = $_FILES['anh1']['tmp_name'];
                                    $type1 = $_FILES['anh1']['type'];
                                    $dir = './img/account/';
                                    move_uploaded_file($tmp1, $dir . $anh1);
                                    if (empty($anh1)) {
                                    selectAll("UPDATE taikhoan SET hoten='$hoten',sdt='$sdt', diachi='$diachi' WHERE id=$id_nguoidung");
                                    }
                                    else{   
                                        selectAll("UPDATE taikhoan SET hoten='$hoten', anh='$anh1', sdt='$sdt', diachi='$diachi' WHERE id=$id_nguoidung");
                                    }
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                            ?>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                <!-- <div class="col-md-12 form-group p_star">
                                    <p>Loại Tài khoản</p>
                                    <?php
                                    if($loaitk == 0){
                                        ?>
                                        <input type="text" id="sdt" class="form-control"  name="sdt" value="Khách Hàng" placeholder="SDT" readonly>
                                    <?php
                                    }else {
                                    ?>
                                        <input type="text" id="sdt" class="form-control"  name="sdt" value="Admin" placeholder="SDT" readonly>
                                        <?php
                                    }
                                    ?>
                                </div> -->
                                <div class="col-md-12 form-group p_star">
                                    <p>Tài Khoản (Email)</p>
                                    <input type="text" class="form-control"  name="email" value="<?= $taikhoancu ?>" placeholder="Tài Khoản (Email)" readonly required >
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>Họ Tên*</p>
                                    <input type="text" id="hoten" class="form-control" name="hoten" required value="<?= $tencu ?>" placeholder="Họ Tên" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>SDT*</p>
                                    <input type="text" id="sdt" class="form-control"  name="sdt" value="<?= $sdtcu ?>" placeholder="SDT" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>Địa Chỉ*</p>
                                    <textarea type="text" id="diachi" class="form-control" cols="70" rows="2"  name="diachi" placeholder="Nhập địa chỉ" required ><?= $diachicu ?></textarea>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                        <p>Ảnh Đại Diện</p>
                                        <label for="exampleInputEmail1">Chọn Ảnh</label>
                                        <label for="imgInp" style="cursor:pointer">
                                            <img id="blah" src="<?= empty($anh)?'./img/account/user.png':'./img/account/'.$anh.'' ?>" alt="your image" width="50px" height="50px" />
                                        </label>
                                        <input hidden type="file" name="anh1" accept="image/*" id="imgInp" class="form-control" >
                                </div>
                                
                                <div class="col-md-12 form-group">
                                <a href="password.php" class="genric-btn primary-border small" style="float:right">Đổi mật khẩu</a>
                                    <div class="col-md-12 form-group p_star">
                                        <button type="submit" name="doithongtin" class="btn_3">
                                            Cập nhật
                                        </button>
                                        <a href="index.php" class="btn_3" style="text-align: center">
                                            Hủy
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <?php
                            ?>
                            <script>
                                imgInp.onchange = evt => {
                                    const [file] = imgInp.files
                                    if (file) {
                                        blah.src = URL.createObjectURL(file)
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </section>
    <!--================login_part end =================-->

    <?php 
        include 'footer.php';
    ?>

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>