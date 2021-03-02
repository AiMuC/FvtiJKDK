<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

function email($sjr, $body)
{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
    try {
        //服务器配置 
        $mail->CharSet = "UTF-8";                     //设定邮件编码 
        $mail->SMTPDebug = 0;                        // 调试模式输出 
        $mail->isSMTP();                             // 使用SMTP 
        $mail->Host = 'smtp.qq.com';                // SMTP服务器 
        $mail->SMTPAuth = true;                      // 允许 SMTP 认证 
        $mail->Username = '您的邮箱地址';                // SMTP 用户名  即邮箱的用户名 
        $mail->Password = '您的邮箱授权码';             // SMTP 密码  部分邮箱是授权码(例如163邮箱) 
        $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议 
        $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持 
        $mail->setFrom('您的邮箱地址', 'Mailer');  //发件人 
        $mail->addAddress("$sjr", 'Joe');  // 收件人 
        $mail->addReplyTo('您的邮箱地址', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致 
        //Content 
        $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容 
        $mail->Subject = '福州职业技术学院健康打卡';
        $mail->Body    = "$body" . '发送时间' . date('Ymd H:i:s');
        $mail->AltBody = "$body" . '发送时间' . date('Ymd H:i:s');
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; //$mail->ErrorInfo; 
    }
}
