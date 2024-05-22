<?php
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";

    include "view/header.php";
    include "global.php";
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $name= load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case "sanphamct":
                // if(isset($_POST['guibinhluan'])){
                //     insert_binhluan($_POST['idpro'], $_POST['noidung']);
                // }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                    $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                    // $binhluan = loadall_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }else{  
                    include "view/home.php";            
                }
                break;
            case "dangky":
                $erroruser= $erroremail = $errorpass = $erroraddress = $errortel=$errorrepass= ""; 
                if(isset($_POST['dangky'])){
                    $countError = 0;
                    $repass=$_POST['repass'];
                    if (strlen($_POST['email']) === 0) { 
                        $erroremail = "email không được để trống";
                        $countError += 1;
                    }
                    if (strlen($_POST['user']) <3) {
                        $erroruser = "user không được it hon 3";
                        $countError += 1;
                    }
                    if ($_POST['pass'] <=6) { 
                        $errorpass = "pass không được ít hơn 6";
                        $countError += 1;
                    }
                    if (strlen($_POST['address'] =="")) { 
                        $countError += 1;
                        $erroraddress = "địa chỉ không được để trống";
                    }
                    if (strlen($_POST['tel']) <10) { 
                        $errortel = "số điện thoại không đúng";
                        $countError += 1;
                    }
                    if ($repass!=$_POST['pass']) {
                        $errorrepass = "confirmpassword bạn nhập không trùng với pass";
                    }
            
                    if ($countError === 0){
                        $email=$_POST['email'];
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $address=$_POST['address'];
                        $tel=$_POST['tel'];
                        insert_taikhoan($email,$user,$pass,$address,$tel);
                        $thongbao= " đã đăng ký thành công. Vui lòng đăng nhập ";
                    }
                }
                include "view/dangky.php";
                break;
            case "dangnhap" :
                if (isset($_POST['dangnhap'])&&($_POST['dangnhap'])) {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkuser=checkuser($user,$pass);
                    if (is_array($checkuser) ) {
                        $_SESSION['user']=$checkuser;
                        $thongbao= " đã đăng nhập thành công";
                        header('location: index.php');
                    }else{
                        $thongbao= " tài khoản không tồn tại";
                    }
                }
                include "view/dangky.php";
                break;
            case "edittk" :
                if (isset($_POST['edittk'])&&($_POST['edittk'])) {
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                    $id=$_POST['id'];
                    update_tk($id,$user,$pass,$email,$address,$tel);
                    $_SESSION['user']=checkuser($user,$pass);
                        header('location: index.php?act=edittk');
                }
                include "view/edittk.php";
                break;
            case "dangxuat":
                dangxuat();
                include "view/home.php";
                break;
            case "quenmk":
                if (isset($_POST['guiemail'])){
                    $email=$_POST['email'];
                    $sendmailmess = sendmail($email);
                }
                include "view/quenmk.php";
                break;
            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>