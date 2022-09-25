<?php

require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.smtp.php';
require 'phpmailer/class.phpmailer.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];

$body = ' <div class="mail-msg">
      <table style="width:600px;margin:50px auto;border:1px solid
        #DDDDDD" width="700" cellspacing="0" cellpadding="0" border="0"
        align="center">
        <tbody>
          <tr>
            <td
              style="padding:10px;background-color:#0692c5;color:#FFF;"
              colspan="2" valign="middle" align="left">
              <h1 style="font-family:sans-serif; text-align: center; padding: 0 2%;">Deep Financial Services</h1>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;" colspan="2" valign="middle"
              align="left">
              <p style="font-family:sans-serif;color:#fff; margin: 0px; padding: 0px;"><strong>Dear Admin</strong><br>
                <br>A new user details : </p>
              <ul style="list-style: none; margin-top:10px; padding: 0px; font-family: lato; line-height: 1.7;">

                <li style="margin: 0px; padding: 0px;"><strong>Name :</strong> ' . $name . '</li>
                <li style="margin: 0px; padding: 0px;"><strong>Email :</strong> ' . $email . '</li>
                <li style="margin: 0px; padding: 0px;"><strong>Phone No :</strong> ' . $phone . '</li>
                <li style="list-style: none; margin: 0px; padding: 0px;"><strong>Message :</strong>' . $msg . '</li>
              </ul>
              <br>
              <br>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>';


    $mail = new PHPMailer;

    //$mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'donotreply@anyawebsolution.in';                 // SMTP username
    $mail->Password = 'g.oE89oTU#gR';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('donotreply@anyawebsolution.in', 'DFS Enquiry');
    $mail->addAddress('yashsharmadelhi01@gmail.com');  // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Your Enquiry";
    $mail->Body    = $body;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("Location: thankyou.html");
        echo 'Mail has been send.';
    }
}
