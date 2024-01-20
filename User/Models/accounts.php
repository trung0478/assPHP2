<?php
function register($account, $email, $pass)
{
    $sql = "INSERT INTO user VALUES(null, '$account', '$email', '$pass', 0)";
    pdo_execute($sql);
}

function login($account, $pass)
{
    $sql = "SELECT * FROM user WHERE account = '$account' AND pass ='$pass'";
    $result =pdo_query_one($sql);
    return $result;
}

function check_email($email) {
    $sql = "SELECT * FROM user WHERE email = '".$email."'";
    $email = pdo_query_one($sql);
    if ($email!=false) {
        sendMail($email['email'],$email['account'],$email['pass']);
        return "<p class='text-success'>Gửi mail thành công.</p>";
    }else {
        return "<p class='text-danger'>Email không tồn tại trong hệ thống.</p>";
    }
}

function sendMail($email, $username, $pass){
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dangquoctrung88888888@gmail.com';                     //SMTP username
        $mail->Password   = 'qgbz ztrv lijq gili';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // sender
        $mail->setFrom('dangquoctrung88888888@gmail.com', 'Poly Test');
        //Add a recipient
        $mail->addAddress($email, $username);    

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BAN YEU CAU LAY LAI MAT KHAU.';

        $mail->Body    = 'Mật khẩu của bạn là: ' . $pass ;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
