<div class="boxright">

    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <div class="box_content form_account">
        <?php 
            if (isset($_SESSION['user'])) {
                extract($_SESSION['user']);
        ?>
            <h4>Xin chào</h4><br>
            <?=$user?>
            <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li class="form_li"><a href="index.php?act=edittk">Thông tin tài khoản</a></li>
            <?php if($role==1) { ?>
            <li class="form_li"><a href="admin/index.php">Đăng nhập Admin</a></li>
            <?php } ?>
            <li class="form_li"><a href="index.php?act=dangxuat">Thoát</a></li>
            <br>    
        <?php
            }else {
        ?>
        <form action="index.php?act=dangnhap" method="POST">
            <h4>Tên đăng nhập</h4><br>
            <input type="text" name="user" id="">
            <h4>Mật khẩu</h4><br>
            <input type="password" name="pass" id=""><br>
            <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
            <br>
            <input type="submit" value="Đăng nhập" name="dangnhap">
            <br>
        </form>
            <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
            <br>
        </div>
        <?php } ?>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                      foreach($dsdm as $danhmuc){
                          extract($danhmuc);
                          $linkdm="index.php?act=sanpham&iddm=".$id;
                          echo '<li><a href="'.$linkdm.'">'.$name.' </a></li>';
                      }
                      ?>
                <!--                     <li><a href="">Đồng hồ </a></li>-->
                <!--                     <li><a href="">Laptop</a></li>-->
                <!--                     <li><a href="">Điện thoại</a></li>-->
                <!--                     <li><a href="">Ipad</a></li>-->
                <!--                     <li><a href="">Tivi</a></li>-->
            </ul>
        </div>
        <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
                <input type="text" placeholder="Từ khóa tìm kiếm" name="keyword">
            </form>
        </div>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php
                    foreach($dstop10 as $sp){
                        extract($sp);
                        $linksp="index.php?act=sanphamct&idsp=".$id;
                        $img=$img_path.$img;
                        echo'<div class="selling_products" style="width:100%;">
                  <img src="'.$img.'" alt="anh">
                  <a href="'.$linksp.'">'.$name.'</a>
                </div>';
                    }
                    ?>
            <!--                <div class="selling_products" style="width:100%;">-->
            <!--                  <img src="./img/clockforgirl.jpg" alt="anh">-->
            <!--                  <a href="">Đồng hồ đeo tay nữ</a>-->
            <!--                </div>-->
            <!--                <div class="selling_products" style="width:100%;">-->
            <!--                  <img src="./img/clockforgirl.jpg" alt="anh">-->
            <!--                  <a href="">Đồng hồ đeo tay nữ</a>-->
            <!--                </div>-->
            <!--                <div class="selling_products" style="width:100%;">-->
            <!--                  <img src="./img/clockforgirl.jpg" alt="anh">-->
            <!--                  <a href="">Đồng hồ đeo tay nữ</a>-->
            <!--                </div>-->
            <!--                <div class="selling_products" style="width:100%;">-->
            <!--                  <img src="./img/clockforgirl.jpg" alt="anh">-->
            <!--                  <a href="">Đồng hồ đeo tay nữ</a>-->
            <!--                </div>-->
            <!--                <div class="selling_products" style="width:100%;">-->
            <!--                  <img src="./img/clockforgirl.jpg" alt="anh">-->
            <!--                  <a href="">Đồng hồ đeo tay nữ</a>-->
            <!--                </div>-->
        </div>
    </div>
</div>