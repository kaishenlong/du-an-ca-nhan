<main class="catalog  mb ">

<div class="boxleft">

  <div class="box_title">Quên mật khẩu</div>
    <div class="box_content form_account">
    <?php
            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                extract($_SESSION['user']);
            }
        
        ?>
    <form action="index.php?act=quenmk" method="post">
      <div>
        <p>Email</p>
        <input type="email" name="email" placeholder="email">
      </div>
      <input type="hidden" name="id" value="<?=$id?>">
      <input type="submit" value="Gửi" name="guiemail">
      <input type="reset" value="Nhập lại">
      <?php if(isset($sendmailmess)&&$sendmailmess!="") {
        echo $sendmailmess;
      }?> 
    </form>
    
  </div>
</div>
    <?php
    include "view/boxright.php";
    ?>
</main>