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
  <!-- nice select CSS -->
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/price_rangs.css">
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
                            <h2>Giỏ Hàng</h2>
                        </div>
                </div>
            </div>
        </div>
    </section>
  <!-- breadcrumb end-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top1">
    <div class="container">
        <?php
        if (isset($_COOKIE["user"])) {
            $taikhoan = $_COOKIE["user"];
            foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $row) {
                $idtaikhoan = $row['id'];
                $diachitaikhoan = $row['diachi'];

            }
        ?>
            <form class="cart_inner" method="post" action="">
                <div class="table-responsive">
                    <a href="history.php" class="btn_1" style="float:right; margin-bottom:20px;">Lịch sử đặt hàng</a>

                        <?php
                         
                            if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$idtaikhoan && status=0") > 0) {
                                foreach (selectAll("SELECT * FROM donhang WHERE status=0 && id_taikhoan=$id_nguoidung") as $item) {
                                    $idDh= $item['id'];
                                }
                                if (rowCount("SELECT * FROM ctdonhang WHERE id_donhang=$idDh") > 0) {
                        ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $tongcong =0;
                                foreach (selectAll("SELECT * FROM ctdonhang WHERE id_donhang=$idDh") as $item) {
                                    $idSp = $item['id_sanpham'];
                                    $tong = $item['soluong'] * $item['gia'];
                                    $tongcong = $tongcong + $tong;
                            ?>
                            <tr>
                                <td>
                                <?php 
                                foreach (selectAll("SELECT * FROM sanpham WHERE id={$item['id_sanpham']}") as $row) {
                                    ?>
                                <div class="media">
                                    <div class="d-flex">
                                    <img src="img/product/<?= $row['anh1'] ?>" alt="" style="width:50px; height:50px;"/>
                                    </div>
                                    <div class="media-body">
                                    
                                                <p><?= $row['ten'] ?></p>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <h5><?= number_format($item['gia']) ?>đ</h5>
                                </td>
                                <td>
                                <div class="product_count">
                                    <input class="input-number" type="number" name="soluong" value="<?= $item['soluong'] ?>" min="1" max="100"/>

                                </div>
                                </td>
                                <td>
                                <h5><?= number_format($tong) ?>đ</h5>
                                </td>
                                <td>
                                    <a class="genric-btn primary circle" href="?removeproduct=<?= $item['id_sanpham'] ?>">Xóa</a>
                                </td>
                                
                            </tr>
                            <?php
                                }
                            ?>
                            <tr class="bottom_button">
                                
                                <td>
                                <!-- <a class="btn_1" href="?updatecart=<?= $item['id_donhang'] ?>">Cập nhật</a> -->
                                </td>
                                <td></td>
                                <td>
                                    <h5>Tổng cộng: </h5>
                                </td>
                                <td>
                                    <h5><?= number_format($tongcong) ?>đ</h5>
                                </td>
                                <td>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="checkout_btn_inner">
                                        <h5>Nhập địa chỉ nhận hàng: </h5>
                                        <textarea name="diachi" id="" cols="70" rows="4" placeholder="Nhập địa chỉ nhận hàng" required> <?= $diachitaikhoan ?></textarea>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                <h5></h5>
                                </td>
                                <td>
                                <h5></h5>
                                </td>
                                <td></td>
                            </tr>
                           
                            </tbody>
                        </table>
                
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="product.php">Tiếp Tục Mua Sắm</a>
                    <input class="btn_1" type='submit' name="dathang" value="Đặt Hàng" style="border: none"/>
                </div>
                </div>
                <?php
                    } else {
                    ?>
                        <a href="product.php" class="btn_1" style="float:right; margin:0px 20px 20px 0px;">Mua Ngay</a>
                        <h2>Giỏ hàng của bạn đang trống</h2>
                        
                    <?php
                    }
                    ?>
            </form>
        <?php
        } else {
        ?>
        <h2>Giỏ hàng của bạn đang trống</h2>
        <?php
        }
        if (isset($_GET['removeproduct'])) {
            selectAll("DELETE FROM ctdonhang WHERE id_donhang=$idDh && id_sanpham={$_GET['removeproduct']}");
            header('location:cart.php');
        } 
        ?>
    <?php
    }
    ?>
    <?php
     
        if (isset($_POST["dathang"])) {
            $diachi = $_POST["diachi"];
            selectall("UPDATE donhang SET diachi='$diachi',thoigian='$today', tongtien= $tongcong, status=1 WHERE id_taikhoan=$idtaikhoan && status=0");
            echo "<script>alert('Đặt hàng thành công')
                location.href='product.php'
            </script>";
        }
    ?>
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