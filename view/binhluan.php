<?php  
    session_start();
    $idpro=$_REQUEST['idpro'];
    include "../model/pdo.php";
    include "../model/binhluan.php";
    $dsbl=loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>binh luan</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
    

<div class="mb">
        <div class="box_title">Bình luận</div>
        <div class="box_content2 product_portfolio binhluan">
            <table>
                <?php
                      foreach($dsbl as $value){
                        //   extract($bl);
                          echo '<tr><td>'.$value['noidung'].' </td>';
                          echo '<td>'.$value['user'].' </td>';
                          echo '<td>'.$value['ngaybinhluan'].' </td></tr>';

                      }
                ?>
            </table>
        </div>
        <div class="box_search">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" placeholder="Bình luận" name="noidung">
                <input type="submit" value="binh luan" name="guibinhluan">
            </form>
        </div>
        <?php
            if (isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])) {
              if (isset($_SESSION['user'])) {
                extract($_SESSION['user']); 
                $noidung=$_POST['noidung'];
                $iduser=$_SESSION['user']['id'];
                $idpro=$_POST['idpro'];
                $ngaybinhluan=date('Y-m-d');
                insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
                }else {
                    echo "dang nhap de binh luan";
                }
                header("location: ".$_SERVER['HTTP_REFERER']);
            }
            
        ?>
    </div>
    </body>
</html>