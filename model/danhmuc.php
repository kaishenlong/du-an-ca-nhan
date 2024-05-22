<?php
function loadall_danhmuc(){
    $sql="select * from danhmuc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql="select * from sanpham where id=".$iddm;
        $dm=pdo_query_one($sql);
        //extract($dm);
        // return $name;
    }else{
        return "";
    }
}
?>