<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function kirim_email($penerima, $judul, $pesan) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pengirim@example.com';
        $mail->Password   = 'password_pengirim';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('pengirim@example.com', 'Nama Pengirim');
        $mail->addAddress($penerima);

        // Content
        $mail->isHTML(false);
        $mail->Subject = $judul;
        $mail->Body    = $pesan;

        $mail->send();
        echo 'Email berhasil dikirim';
    } catch (Exception $e) {
        echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
    }
}

// Contoh penggunaan
$penerima_email = "penerima@example.com";
$judul_email = "Notifikasi Disposisi";
$pesan_email = "Anda telah menerima disposisi.";

kirim_email($penerima_email, $judul_email, $pesan_email);
?>
