<?php
    function insert_sanpham($tensp,$price,$hinh,$motasp,$iddm){
        $sql= "INSERT INTO sanpham(name,price,img,mota,iddm) VALUES('$tensp','$price','$hinh','$motasp','$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql= "DELETE  FROM sanpham WHERE id=".$id ;
        $listsanpham=pdo_query($sql);
    }
    function loadall_sanpham($kyw,$iddm){
        $sql= "SELECT * FROM sanpham WHERE 1 ";
        if($kyw!=""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm >0){
            $sql.=" and iddm= '".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function loadone_sanpham($id){
        $sql= "SELECT * FROM sanpham WHERE id=".$id;
            $sanpham=pdo_query_one($sql);
            return $sanpham;
    }
    function update_sanpham($id,$iddm,$tensp,$price,$motasp,$hinh){
        if($hinh!="")
            $sql= "UPDATE sanpham SET iddm='".$iddm."',name='".$tensp."',price='".$price."',mota='".$motasp."',img='".$hinh."' WHERE id= ".$id;
        else
            $sql= "UPDATE sanpham SET iddm='".$iddm."',name='".$tensp."',price='".$price."',mota='".$motasp."' WHERE id= ".$id;
        pdo_execute($sql);   
    }
    

?>