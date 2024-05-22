<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH Tài Khoản</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>MÃ DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
                <?php 
                    foreach ($listhongke as $thongke) {
                        extract($thongke);
                        echo '<tr>
                        <td>'.$madm.'</td>
                        <td>'.$tendm.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxprice.'</td>
                        <td>'.$minprice.'</td>
                        <td>'.$avgprice.'</td>
                    </tr>';
                    }
                
                
                ?>
            
           </table>
           </div>
           <div class="row mb10 ">
         <a href="index.php?act=bieudo"><input  class="mr20" type="button" value="xem biểu đồ"></a>
           </div>
          </form>
         </div>
        </div>
    </div>



    new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [<?php
      foreach ($thongkedh as $dh) {
        extract($dh);
        echo "['" . $dh['countbill'] . "']";
      }
      ?>],
      borderColor: "red",
      fill: false
    },{
      data: [<?php
      foreach ($thongkedh as $dh) {
        extract($dh);
        echo "['" . $dh['mintong'] . "']";
      }
      ?>],
      borderColor: "green",
      fill: false
    },{
      data: [<?php
      foreach ($thongkedh as $dh) {
        extract($dh);
        echo "['" . $dh['maxtong'] . "']";
      }
      ?>],
      borderColor: "blue",
      fill: false
    },{
      data: [<?php
      foreach ($thongkedh as $dh) {
        extract($dh);
        echo "['" . $dh['tongtien'] . "']";
      }
      ?>],
      borderColor: "gold",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});