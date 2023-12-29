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
                            <h2>Đăng Ký</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

    <!--================login_part Area =================-->
    <section class="login_part ">
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
                    <div class="login_part_form">
                        
                        <div class="login_part_form_iner">
                            <h3>Tạo Tài Khoản</h3>

                            <?php 
                            if (isset($_POST["dangky"])) {
                                $ten = $_POST["ten"];
                                $email = $_POST["email"];
                                $sdt = $_POST["sdt"];
                                $matkhau = ($_POST["matkhau"]);
                                $nlmatkhau = ($_POST["nlmatkhau"]);
                                if($ten !=""){
                                    if($email !=""){
                                        if($sdt !=""){
                                            if($matkhau !=""){
                                                if ($matkhau!==$nlmatkhau) {
                                                    $error ='Nhập lại mật khẩu không chính xác';
                                                }else{
                                                    if (rowCount("SELECT * FROM taikhoan WHERE taikhoan='$email'")>0) {
                                                        $error ='Tài khoản đã có người sử dụng';
                                                    }else{
                                                        selectAll("INSERT INTO taikhoan VALUES (NULL,'$email','$matkhau','$ten','','$sdt','','0','0')");
                                                        $success='Đăng ký thành công, vui lòng đăng nhập';
                                                    }
                                                    header('location:login.php');
                                                }
                                            }
                                            else{
                                                $error ='Mật khẩu không được để trống';
                                            }
                                        }
                                        else{
                                            $error ='SDT không được để trống';
                                        }
                                    }
                                    else{
                                        $error ='Email không được để trống';
                                    }
                                }
                                else{
                                    $error ='Họ tên không được để trống';
                                }
                                
                            }
                        ?>

                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                            
                            <?php 
                                    if (isset($error)) {
                                      ?><p class="text-danger ml-3 mb-3" style=" text-align: center;"><?= $error ?></p><?php
                                    }
                                    if (isset($success)) {
                                        ?><p class="text-success ml-3 mb-3"><?= $success ?></p><?php
                                    }
                                ?>

                                <div class="col-md-12 form-group p_star">
                                    <input type="text" name="ten" class="form-control" required value="" placeholder="Họ Tên" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control"  name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control"  name="sdt" value="" placeholder="SDT" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"  name="matkhau" value="" placeholder="Mật Khẩu" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control"  name="nlmatkhau" value="" placeholder="Nhập Lại Mật Khẩu" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <!-- <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" name="dangky" value="submit" class="btn_3">
                                        đăng ký
                                    </button>
                                    <!-- <a class="lost_pass" href="#">forget password?</a> -->
                                    <div class="col-md-12 form-group p_star">
                                        <a href="login.php" class="btn_3" style="text-align: center">
                                            Quay về Đăng Nhập
                                        </a>
                                    </div>
                                </div>
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