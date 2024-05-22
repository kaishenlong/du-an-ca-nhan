<?php
    include "../model/pdo.php";
    include "../model/danhmucad.php";
    include "../model/sanphamad.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "header.php";   
    
    
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "adddm":
                if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao="thêm thành công";
                }
                include "./danhmuc/add.php";
                break;  
                case "listdm":
                    $listdanhmuc=loadall_danhmuc();
                    include "./danhmuc/list.php";
                    break;
                case "xoadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_danhmuc($_GET['id']);
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "./danhmuc/list.php";
                    break;
                case "suadm":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $dm=loadone_danhmuc($_GET['id']);
                    }
                    include "./danhmuc/update.php";
                    break;
                case "updatedm":
                    if(isset($_POST['capnhat'])&& ($_POST['capnhat'])){
                        $tenloai=$_POST['tenloai'];
                        $id=$_POST['id'];
                        update_danhmuc($id,$tenloai); 
                        $thongbao="cập nhật thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "./danhmuc/list.php";
                    break;
                // hang hoa
                case "addsp":
                    if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                        $iddm=$_POST['iddm'];
                        $tensp=$_POST['tensp'];
                        $price=$_POST['price'];
                        $motasp=$_POST['motasp'];
                        $hinh=$_FILES['img']['name'];
                        $target_dir ="../upload/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
                          } else {
                            // echo "Sorry, there was an error uploading your file.";
                          }
                        insert_sanpham($tensp,$price,$hinh,$motasp,$iddm);
                        $thongbao="thêm thành công";
                    }
                    $listdanhmuc=loadall_danhmuc();
                    include "./hanghoa/add.php";
                    break;  
                    case "listsp":
                        if(isset($_POST['loc'])&&($_POST['loc'])) {
                            $kyw=$_POST['kyw'];
                            $iddm=$_POST['iddm'];
                        }else {
                            $kyw='';
                            $iddm=0;
                        }
                        $listdanhmuc=loadall_danhmuc();
                        $listsanpham=loadall_sanpham($kyw,$iddm);
                        include "./hanghoa/list.php";
                        break;
                    case "xoasp":
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            delete_sanpham($_GET['id']);
                        }
                        $listsanpham=loadall_sanpham("",0);
                        include "./hanghoa/list.php";
                        break;
                    case "suasp":
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            $sanpham=loadone_sanpham($_GET['id']);
                        }
                        $listdanhmuc=loadall_danhmuc();
                        include "./hanghoa/update.php";
                        break;
                    case "updatesp":
                        if(isset($_POST['capnhat'])){
                            $id=$_POST['id'];
                            $iddm=$_POST['iddm'];
                            $tensp=$_POST['tensp'];
                            $price=$_POST['price'];
                            $motasp=$_POST['motasp'];
                            $hinh=$_FILES['img']['name'];
                            $target_dir = "../upload/";
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                // echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
                            } else {
                                // echo "Sorry, there was an error uploading your file.";
                            }
                            update_sanpham($id,$iddm,$tensp,$price,$motasp,$hinh); 
                            $thongbao="cập nhật thành công";
                        }
                        $listdanhmuc=loadall_danhmuc();
                        $listsanpham=loadall_sanpham("",0);
                        include "./hanghoa/list.php";
                        break;
                case "dskh":
                    $listtk=loadall_tk();
                    include "./khachhang/list.php";
                    break;
                case "xoatk":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        delete_tk($_GET['id']);
                    }
                    $listtk=loadall_tk();
                    include "./khachhang/list.php";
                    break;
                case "suatk":
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                        $khachhang=loadone_tk($_GET['id']);
                    }
                    $listtk=loadall_tk();
                    include "./khachhang/update.php";
                    break;
                case "updatetk":
                    if(isset($_POST['capnhat'])){
                        $id=$_POST['id'];
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];
                        $email=$_POST['email'];
                        $address=$_POST['address'];
                        $tel=$_POST['tel'];
                        update_tk($id,$user,$pass,$email,$address,$tel);
                        $thongbao="cập nhật thành công";
                    }
                    $listtk=loadall_tk();
                    include "./khachhang/list.php";
                    break;
                //binh luan
                case "dsbl":
                        $listbl=loadall_bl(0);
                        include "./binhluan/list.php";
                        break;
                case "xoabl":
                        if(isset($_GET['id'])&&($_GET['id']>0)){
                            delete_binhluan($_GET['id']);
                        }
                        $listbl=loadall_bl(0);
                        include "./binhluan/list.php";
                        break;
                case "thongke":
                    $listhongke=loadall_thongke();
                    include "./thongke/list.php";
                    break;  
                case "bieudo":
                    $listhongke=loadall_thongke();
                    include "./bieudo.php";
                    break;  
                
                default:
                    include "home.php";
                    break;
            
        }
    }else{
        include "home.php";
    }
    include "footer.php";
?>
