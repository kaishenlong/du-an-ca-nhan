<style>
td {
    padding: 0 20px;
}
</style>
<main class="catalog  mb ">
    <div class="boxleft">
        <?php extract($sanpham); ?>
        <div class="  mb">
            <div class="box_title">
                <?php echo $name; ?>
            </div>
            <div class="box_content">
                <?php 
                    $img = $img_path . $img;
                    echo "<img src='$img' width='300'>";
                    echo "<p>$mota</p>";
                ?>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#binhluan").load("view/binhluan.php", {idpro: <?=$id?>});
            });
            </script>
        <div class="mb" id="binhluan"></div>
         
        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="box_content">
                <?php foreach($sanphamcl as $value): {
                    extract($value);
                    $linksp="index.php?act=sanphamct&idsp=".$id;
                    $img=$img_path.$img;
                    echo'<div class="selling_products" style="width:50%;">
                    <img src="'.$img.'" alt="anh">
                    <a href="'.$linksp.'">'.$name.'</a>
                    </div>';
                }?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
?>

</main>