<h1>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h1> 
    <div class="box_content form_account">
        <form action="index.php?act=updatetk" method="post">
            <div>
                <p>Email</p>
                <input type="email" name="email" require placeholder="email" value="<?=$khachhang['email']?>">
            </div>
            <div>
                Tên đăng nhập
                <input type="text" name="user"  placeholder="user" value="<?=$khachhang['user']?>">
            </div>
            <div>
                Mật khẩu
                <input type="password" name="pass"  placeholder="pass" value="<?=$khachhang['pass']?>">
            </div>
            <div>
                Địa Chỉ
                <input type="text" name="address"  placeholder="address" value="<?=$khachhang['address']?>">
            </div>
            <div>
                Số Điện Thoại
                <input type="text" name="tel"  placeholder="tel" value="<?=$khachhang['tel']?>">
            </div>
                <input type="hidden" name="id" value="<?=$khachhang['id']?>">
                <input type="submit" value="Cập Nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=dskh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
            
        </form>
        <h2 class="thongbao">
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
        </h2>
    </div>
