<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql= "INSERT INTO binhluan(noidung,iduser,idpro,ngaybinhluan) VALUES('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadall_binhluan($idpro){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idpro;
        ";
        $listbl=pdo_query($sql);
        return  $listbl;
    }
    //admin binh luan
    function loadall_bl($idpro){
        $sql= "select * from  binhluan where 1";
        if ($idpro>0) {
            $sql.=" AND idpro='".$idpro."'";
        }else{
            $sql.=" order by id desc";
        }
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($id){
        $sql= "DELETE  FROM binhluan WHERE id=".$id;
        $listbl=pdo_query($sql);
    }
?>