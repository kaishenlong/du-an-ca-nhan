<main class="catalog  mb ">
<div class="boxleft">

<div class="box_title">Cập nhật tài khoản</div>
    <div class="box_content form_account">
        <?php
            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                extract($_SESSION['user']);
            }
        
        ?>
        <form action="index.php?act=edittk" method="post">
            <div>
                <p>Email</p>
                <input type="email" name="email" require placeholder="email" value="<?=$email?>">
            </div>
            <div>
                Tên đăng nhập
                <input type="text" name="user"  placeholder="user" value="<?=$user?>">
            </div>  
            <div>
                 Mật khẩu
                <input type="password" name="pass" value="<?=$pass?>">
            </div>
            <div>
                 Địa chỉ
                <input type="text" name="address"  placeholder="address" value="<?=$address?>">
            </div>
            <div>
                 Số điện thoại
                <input type="text" name="tel"  placeholder="tel" value="<?=$tel?>">
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" value="Cập nhật" name="edittk">
                <input type="reset" value="Nhập lại">
            
        </form>
        <h2 class="thongbao">
        <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
        </h2>
    </div>

    </div>
        <?php include "view/boxright.php";?>
</main>