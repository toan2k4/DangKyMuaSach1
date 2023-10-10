<?php
session_start();
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO taikhoan (user,pass,email) VALUES ('$user','$pass','$email')";
    pdo_execute($sql);
}

function dangnhap($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user = '$user' and pass = '$pass'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        $_SESSION['user'] = $user;
    } else {
        return "thông tin tài khoản sai";
    }

}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}

function sendMail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
        return "gửi email thành công";
    } else {
        return "email bạn nhập không có trong hệ thống";
    }
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'a19f7b8dec3a8f'; //SMTP username
        $mail->Password = 'cca5b9d1a9ce50'; //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('toanne@example.com', 'Mailer');
        $mail->addAddress($email, $username); //Add a recipient


        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Người dùng quên mật khẩu';
        $mail->Body = 'mật khẩu nè:'.$pass;
        $mail->AltBody = '';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>