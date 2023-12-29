<?php 
    if (isset($_GET["checkout"])) {
        setcookie("user", null, -1, '/');
        header('location:index.php');
    }
    ?>
    <!--::header part start::-->
    <section class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo" style="height: 50px;"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Trang chủ</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        sản phẩm
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.html"> danh mục sản phẩm</a>
                                        <a class="dropdown-item" href="single-product.html">chi tiết sản phẩm</a>

                                    </div>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">sản phẩm</a>
                                </li>
                                
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tin Tức
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.php"> Tin Tức</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Tin Tức</a>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Liên hệ</a>
                                </li>

                                <?php 
                                    if (isset($_COOKIE["user"])) {
                                        $taikhoan = $_COOKIE["user"];
                                        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$taikhoan'") as $item) {
                                            $ten = $item['hoten'];
                                            $anh = $item['anh'];
                                            $phanquyen = $item['phanquyen'];
                                        }
                                ?>
                                
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Chào <?= $ten ?>
                                            <!-- <img id="blah" src="<?= empty($anh)?'./img/account/user.png':'./img/account/'.$anh.'' ?>" alt="your image" width="50px" height="50px" /> -->

                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                            <?php 
                                                if ($phanquyen==1) {
                                            ?>
                                                <a class="dropdown-item" href="admin">Trang quản trị</a>
                                            <?php
                                            }
                                            ?>

                                            <a class="dropdown-item" href="infor.php"> thông tin tài khoản</a>
                                            <a class="dropdown-item" href="?checkout">đăng xuất</a>
                                            
                                        </div>
                                    </li>
                                <?php
                                    }
                                    else{
                                ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            tài khoản
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                            <a class="dropdown-item" href="register.php"> đăng ký</a>
                                            <a class="dropdown-item" href="login.php">đăng nhập</a>
                                        </div>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)" style="cursor: pointer; margin: right -20px;"><i class="ti-search" style="font-size:20px"></i></a>
                            <!-- <a href=""><i class="ti-heart"></i></a> -->
                            <div >
                                <a class="" href="cart.php" id="navbarDropdown3" role="button" > <!-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->
                                    <i class="fa fa-cart-plus"style="font-size:20px"></i>
                                    <?php 
                                        if (isset($_COOKIE["user"])) {
                                            $taikhoan = $_COOKIE["user"];
                                            foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan ='$taikhoan'") as $item) {
                                                $id_nguoidung = $item['id'];
                                            }
                                            if (rowCount("SELECT * FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0")>0) {
                                                foreach (selectAll("SELECT * FROM donhang WHERE id_taikhoan=$id_nguoidung && status=0") as $items) {
                                                    $id_donhang = $items['id'];
                                                }
                                                if(rowCount("SELECT * FROM ctdonhang WHERE id_donhang=$id_donhang")>0){
                                                ?>
                                                <span class='badge badge-danger' style='vertical-align: top; margin:-10px 0px 0px -10px; font-size:10px'><?= rowCount("SELECT * FROM ctdonhang WHERE id_donhang=$id_donhang") ?></span>
                                                <?php 
                                                } else{
                                                ?>
                                                    <span></span>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                            }
                                        }
                                    ?>
                                </a>
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">

                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action="product.php" method="GET" autocomplete="off">
                    <input type="text" class="form-control" name="tim" placeholder="Nhập tên sản phẩm cần tìm">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </section>
    <!-- Header part end-->