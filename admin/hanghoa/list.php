<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=listsp" method="POST">
            <input type="text" name="kyw" placeholder="tên hàng hóa" >
            <select name="iddm">
                <option value="0" selected>Tất Cả</option>
            <?php 
                foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  echo '<option value="'.$id.'">'.$name.'</option>';
                }
              ?>
            </select>
            <input type="submit" name="loc" value="lọc">
            
          </form>
           <div class="row2 mb10 formds_loai">
           <table> 
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN HÀNG HÓA</th>
                <th>IMG</th>
                <th>PRICE</th>
                <th>mo ta</th>
                <th>LƯỢT XEM</th>
                <th></th>
            </tr>
                <?php 
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp="index.php?act=suasp&id=".$id;
                        $xoasp="index.php?act=xoasp&id=".$id;
                        $img= "../upload/".$img;
                        if (is_file($img)) {
                            $img="<img src='".$img."' height='80px'>";
                        }else {
                            $img="ko co hinh";
                        }
                        echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$img.'</td>
                        <td>'.$price.'</td>
                        <td>'.$mota.'</td>
                        <td>'.$luotxem.'</td>
                        <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'">   <input type="button" value="Xóa"></a></td>
                    </tr>';
                    }
                
                
                ?>
            
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
            <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>