<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Details</title>
    <link rel="icon" type="image/png" href="Logo/logo.png">
    <style>
        body {
            background-image: url("BG/bg.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            text-align: center;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Email = $_POST["UserEmail"];

        // Set up your Gmail SMTP server settings
        $smtpServer = "smtp.gmail.com";
        $smtpPort = 587;
        $smtpUsername = "spacestudiowild@gmail.com"; // Replace with your Gmail email
        $smtpPassword = "jeta fncv ysvl rwng"; // Replace with your Gmail password

        // You can customize this section to generate payment details or use a payment gateway to handle payments.
        // In this example, we will just send a sample message with payment details.
        $paymentDetails = "Payment instructions: Please make a payment of 500 pesos to the following bank account. 
                        Name: Wild Space 
                        Bank Name: BPI
                        Bank Account Number: 1234 5678 9012"; // Customize this message

        // Load PHPMailer's autoloader
        require 'C:\xampp\htdocs\dashboard\sia\PHPMailer/src/PHPMailer.php';
        require 'C:\xampp\htdocs\dashboard\sia\PHPMailer/src/SMTP.php';
        require 'C:\xampp\htdocs\dashboard\sia\PHPMailer/src/Exception.php';

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $smtpServer;
        $mail->Port = $smtpPort;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($smtpUsername);
        $mail->addAddress($Email);
        $mail->Subject = "Payment Details for Your Reservation";
        $mail->Body = $paymentDetails;

        try {
            $mail->send();
            echo '<div class="container">
                    <h1>Thank you for your reservation!</h1>
                    <p>Payment details have been sent to your email. Please check your inbox.</p>
                    <a href="index.html">Return to Wild Space Studio</a>
                </div>';
        } catch (Exception $e) {
            echo '<div class="container">
                    <h1>Oops! Something went wrong.</h1>
                    <p>Failed to send payment details. Please contact support. Error: ' . $mail->ErrorInfo . '</p>
                    <a href="wildspace.html">Return to Wild Space Studio</a>
                </div>';
        }
    }
    ?>
</body>
</html>
