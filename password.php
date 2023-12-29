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
                        <form action="" method="POST">

                            <?php 
                                foreach (selectAll("SELECT * FROM taikhoan WHERE id=$id_nguoidung") as $item) {
                                    $taikhoancu = $item['taikhoan'];
                                }
                                if (isset($_POST["doimatkhau"])) {
                                    $matkhau = ($_POST["matkhau"]);
                                    $nlmatkhau = ($_POST["nlmatkhau"]);
                                    $matkhaucu = ($_POST["matkhaucu"]);
                                    if ($matkhau!==$nlmatkhau) {
                                        $error ='Nhập lại mật khẩu không chính xác!';
                                    }else{
                                        if (rowCount("SELECT * FROM taikhoan WHERE id=$id_nguoidung AND matkhau='$matkhaucu'")==1) {
                                            if ($matkhau !== $matkhaucu) {
                                                selectAll("UPDATE taikhoan SET matkhau='$nlmatkhau' WHERE id=$id_nguoidung");
                                                $success='Đổi mật khẩu thành công.';
                                            }
                                            else{
                                                $error ='Mật khẩu mới phải khác mật khẩu cũ!';
                                            }
                                        }else{
                                            $error ='Mật khẩu cũ không chính xác!';
                                        }
                                    }
                                }
                            ?>
                        
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                            <?php 
                                if (isset($error)) {
                                ?><p class="text-danger ml-3 mb-3"><?= $error ?></p><?php
                                }
                                if (isset($success)) {
                                    ?><p class="text-success ml-3 mb-3"><?= $success ?></p><?php
                                }           
                            ?>
                                <div class="col-md-12 form-group p_star">
                                    <p>Tài Khoản (Email)</p>
                                    <input type="text" class="form-control"  name="email" value="<?= $taikhoancu ?>" placeholder="Tài Khoản (Email)" readonly required >
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>Mật Khẩu Cũ*</p>
                                    <input type="password"  name="matkhaucu" class="form-control" placeholder="Nhập mật khẩu cũ" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>Mật Khẩu Mới*</p>
                                    <input type="password" class="form-control"  name="matkhau" placeholder="Mật khẩu mới" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <p>Nhập lại Mật Khẩu Mới*</p>
                                    <input type="password"  class="form-control"  name="nlmatkhau" placeholder="Nhập lại mật khẩu mới" required>
                                </div>
                                
                                
                                <div class="col-md-12 form-group">
                                <!-- <a href="#" class="genric-btn primary-border small" style="float:right">Đổi mật khẩu</a> -->
                                    <div class="col-md-12 form-group p_star">
                                        <button type="submit" name="doimatkhau" value="submit" class="btn_3">
                                            Đổi mật khẩu
                                        </button>
                                        <a href="infor.php" class="btn_3" style="text-align: center">
                                            Hủy
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </form>
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