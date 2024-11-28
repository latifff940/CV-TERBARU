<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim(htmlspecialchars($_POST['fullname']));
    $email = trim(htmlspecialchars($_POST['email']));
    $message = trim(htmlspecialchars($_POST['message']));

    if (empty($fullname) || empty($email) || empty($message)) {
        echo "Semua field harus diisi!";
    } else {
        // Proses data jika semua field terisi
        $formattedMessage = "Name: $fullname\nEmail: $email\nMessage: $message\n\n";
        file_put_contents('massage.txt', $formattedMessage, FILE_APPEND | LOCK_EX);
        echo "Pesan Anda telah dikirim!";
    }
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo "Format email tidak valid!";
} else if (empty($fullname) || empty($message)) {
    echo "Semua field harus diisi!";
} else {
    // Proses data
}
?>