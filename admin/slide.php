<?php 
    include 'header.php';
    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        foreach (selectAll("SELECT * FROM taikhoan WHERE taikhoan='$user'") as $row) {
            $permission = $row['phanquyen'];
        }
        
        if ($permission==1) {
          if (isset($_GET["id"])) {
            selectAll("DELETE FROM slide WHERE id={$_GET['id']}");
            header('location:slide.php');
          }
              
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title addfont">Slide</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="addfont" style="width: 20px">STT</th>
                                                <th class="addfont" style="width: 400px" >Tiêu Đề</th>
                                                <th class="addfont" style="width: 300px">Ảnh</th>
                                                <th class="addfont" style="width: 500px" >Mô Tả</th>
                                                <th><a type="button" class="btn btn-success btn-fw" style="width: 204px" href="addslide.php">Thêm Slide</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        $stt=1;
                                        foreach (selectAll("SELECT * FROM slide ") as $row) {
                                        ?>
                                            <tr class="addfont">
                                                <td><?= $stt++ ?></td>
                                                <td>
                                                <span><?= $row['ten'] ?></span>
                                                </td>
                                                <td>
                                                  <img src="../img/slide/<?= $row['anh'] ?>" alt="">
                                                </td>
                                                <td>
                                                  <p class="addfont" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 250px; padding-top: 12px;"><?= ($row['mota']) ?></p>
                                                </td>
                                                <td>
                                                <a type="button" class="btn btn-primary btn-icon-text" href="editslide.php?id=<?= $row['id'] ?>">
                                                <i class="mdi mdi-file-check btn-icon-prepend"></i> Sửa </a>
                                                <a type="button" class="btn btn-danger btn-icon-text" style="width: 120px" href="?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa slide này không?')">
                                                <i class="mdi mdi-cart-outline btn-icon-prepend"></i> Xóa </a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <script src="./js/search.js?v=<?php echo time()?>"></script>
            <?php
        }
    }
 include 'footer.php';
 ?>

