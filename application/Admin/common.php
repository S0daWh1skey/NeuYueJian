<?php

/**
 * 邮件发送函数
 */
function sendMail($to, $title, $content)
{
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer (); // 实例化
    // $mail->SMTPDebug = 2;
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host = config('MAIL_HOST'); // smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = config('MAIL_SMTPAUTH'); // 启用smtp认证
    $mail->Username = config('MAIL_USERNAME'); // 你的邮箱名
    $mail->Password = config('MAIL_PASSWORD'); // 邮箱密码
    $mail->From = config('MAIL_FROM'); // 发件人地址（也就是你的邮箱地址）
    $mail->FromName = config('MAIL_FROMNAME'); // 发件人姓名
    //设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = 'ssl';
    // //设置ssl连接smtp服务器的远程服务器端口号，可选465或587
    $mail->Port = 465;
    $mail->AddAddress($to, "尊敬的客户");
    $mail->WordWrap = 50; // 设置每行字符长度
    $mail->IsHTML(config('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet = config('MAIL_CHARSET'); // 设置邮件编码
    $mail->Subject = $title; // 邮件主题
    $mail->Body = $content; // 邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; // 邮件正文不支持HTML的备用显示
    return ($mail->Send());
}
