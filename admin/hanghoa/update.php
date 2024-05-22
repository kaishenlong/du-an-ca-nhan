
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
           <label> Danh Muc </label> <br>
           <select name="iddm">
                <option value="0">Tất Cả</option>
            <?php 
                foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  if($sanpham['iddm']==$danhmuc['id']) echo '<option value="'.$danhmuc['id'].'"selected>'.$name.'</option>';
                  else echo '<option value="'.$danhmuc['id'].'">'.$name.'</option>';
                }
              ?>
            </select>
           </div>
           <div class="row2 mb10">
            <label>Tên hàng hóa </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên" value="<?=$sanpham['name']?>">
           </div>
           <div class="row2 mb10">
            <label>price </label> <br>
            <input type="text" name="price" placeholder="nhập vào giá" value="<?=$sanpham['price']?>">
           </div>
           <div class="row2 mb10">
            <label>img </label> <br>
            <input type="file" name="img" >
            <?=$sanpham['img']?>
           </div>
           <div class="row2 mb10">
            <label>mô ta </label> <br>
            <textarea name="motasp"  cols="170" rows="10"><?=$sanpham['mota']?></textarea>
           </div>
           <div class="row mb10 ">
           <input type="hidden" name="id" value="<?=$sanpham['id']?>">
           <input class="mr20" type="submit" value="Cập nhật" name="capnhat">
           <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
           <?php
            if(isset($thongbao)&&($thongbao)!=""){
              echo $thongbao;
            }
           ?>
          </form>
         </div>
        </div>