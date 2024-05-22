
<main class="catalog  mb ">
<div class="boxleft">

<div class="box_title">Đăng ký thành viên</div>
    <div class="box_content form_account">
        <form action="index.php?act=dangky" method="post">
            <div>
                <p>Email</p>
                <input type="email" name="email" placeholder="email" >
                <span style="color:red"><?=$erroremail?></span>
            </div>
            <div>
                Tên đăng nhập
                <input type="text" name="user"  placeholder="user" >
                <span style="color:red"><?=$erroruser?></span>
            </div>
                Mật khẩu
            <div>
                    <input type="password" name="pass"  placeholder="pass" >
                    <span style="color:red"><?=$errorpass?></span>
            </div>
                Nhập lại Mật khẩu
            <div>
                    <input type="password" name="repass"  placeholder="Nhập lại Mật khẩu" >
                    <span style="color:red"><?=$errorrepass?></span>
            </div>
                Nhập địa chỉ
            <div>
                    <input type="text" name="address" placeholder="địa chỉ" >
                    <span style="color:red"><?=$erroraddress?></span>
            </div>
                Nhập số điện thoại
            <div>
                    <input type="text" name="tel" placeholder="số điện thoại" >
                    <span style="color:red"><?=$errortel?></span>
            </div>
                <input type="submit" value="Đăng ký" name="dangky">
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