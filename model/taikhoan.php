<?php
    function insert_taikhoan($email,$user,$pass,$address,$tel){
        $sql= "INSERT INTO taikhoan(email,user,pass,address,tel) VALUE ('$email','$user','$pass','$address','$tel')";
        pdo_execute($sql);
    }
    function checkuser($user,$pass){
        $sql= "SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$pass."' " ;
            $tk=pdo_query_one($sql);
            return $tk;
    }
    function update_tk($id,$user,$pass,$email,$address,$tel){
        $sql= "UPDATE taikhoan SET user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."' WHERE id= ".$id;
        pdo_execute($sql);
    }
    function sendmail($email){
        $sql= "SELECT * FROM taikhoan WHERE email='$email' " ;
        $tk = pdo_query_one($sql);

        if ($tk != false) {
            sendmailpass($email,$tk['user'],$tk['pass']);
            return " gửi email thành công";
        }else {
            return "email bạn nhập không đúng hoặc không tồn tại";
        }
    }
    function sendmailpass($email,$username,$pass){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'a2ec00bc7e081b';                     //SMTP username
    $mail->Password   = '8f5f8c016092b8';                               //SMTP password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('duanmau@fpt.edu.vn', 'Mailer');
    $mail->addAddress($email, $username);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nguoi dung quen mat khau';
    $mail->Body    = 'mat khau cua ban la'.$pass;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }
    function dangxuat(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
    // /////
    function loadall_tk(){
        $sql="select * from taikhoan order by id desc";
        $listtk=pdo_query($sql);
        return  $listtk;
    }
    function loadone_tk($id){
        $sql= "SELECT * FROM taikhoan WHERE id=".$id;
            $tk=pdo_query_one($sql);
            return $tk;
    }
    function delete_tk($id){
        $sql= "DELETE FROM taikhoan WHERE id= ".$id;
        $listtk=pdo_query($sql);
    }

?>