<?php
session_start();
include "../../include/functions.php";
include "../../include/connection.php";
require '../../vendor/autoload.php';
use Mailgun\Mailgun;

if ($_POST) {
    check_for_empty_inputs($_POST, "reset_password.php");

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address';
        header("location: ../reset.php");
        die();
    }

    $email = mysqli_real_escape_string($connect, $_POST["email"]);

    $sql = "SELECT * FROM administrators where email = '$email'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);
    $numrow = mysqli_num_rows($query);

    if ($numrow > 0) {
        $id = $row['id'];
        $name = $row['fullname'];
        $encrypted_email = md5($row['email']);
        $requested_time = time();
        $url = $_SERVER['HTTP_HOST'] . str_replace('handlers/reset.php','',$_SERVER['REQUEST_URI']);
        $message_body = '
            <html>
                <head></head>
                <body>
                    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box; min-width: 100% !important;" width="100%">
                        <tr>
                            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                    <tr>
                                        <p style="font-family: sans-serif;" align="left"><b>Hi ' . $name . ', </b></p>
                                        <p style="font-family: sans-serif;" align="left">You recently requested to reset your password for RGU Voting Platform. Click the button below to reset it.</p>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 200px;">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; border-radius:5px;" valign="top" bgcolor="#3498db"> <a href="http://' . $url . 'newpassword.php?e=' . $encrypted_email . '&t=' . $requested_time . '" style="display: inline-block; box-sizing: border-box; text-decoration: none; font-size: 14px;background-color: #AB82B2; cursor: pointer; color: white; width: 100%;  border-radius: 5px; border: none; outline: none; padding: 13px 2%;">Reset Your Password</a> </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"></table>
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                    <tr>
                                        <p style="font-family: sans-serif;" align="left">If you did not request a password reset, please ignore this email.</p>
                                        <p style="font-family: sans-serif;" align="left">This password reset is only valid for the next <b>30 minutes</b>.</p>
                                        <br />
                                        <p style="font-family: sans-serif;" align="left">Thanks</p>
                                        <p style="font-family: sans-serif;" align="left">Admin, <b>RGUVote</b></p>

                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>';

        $mg = Mailgun::create('key-697f11f197204826b8177d7e143e433b'); 
        $details = $mg->messages()->send('mail.sigoja.com', [
            'from'    => 'admin@rguvote.com',
            'to'      => $email,
            'subject' => 'RGUVote Password Reset',
            'html'    => $message_body
        ]);
        
        if($details) {
            $_SESSION['success'] = "A password reset link has been sent to your email address";
            unset($_SESSION['form_values']);
            redirect_to('../reset.php');
        } else {
            $_SESSION['error'] = "There was an error processing your request. Please, try agian!";
            redirect_to("../reset.php");
            die();
        }
    } else {
        $_SESSION['error'] = "Email address not found";        
        redirect_to("../reset.php");
        die();
    }
}
?>