<?php

    //smtp configuration
    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.mailtrap.io';
    $mail->Port = 2525;
    $mail->SMTPAuth = true;
    $mail->Username = '194d569c15db9c';
    $mail->Password = '0029f08a48fb34';

    //gettings form informationss
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $numero = htmlspecialchars($_POST['numero']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);


    $mail->Subject = $objet;
    $mail->setFrom($email, $name);
    $mail->addAddress('aymenadline5@gmail.com', 'Contact Forme');
    $mail->addReplyTo($email, $name);
    $mail->isHTML(false);
    $mail->Body = "$name\n$message\n$numero";

    $statut= "";

    if(!$mail->send())
    {
        // Erreur lors de l'envoi du message
        header('Location: index.php?statut=error');
        exit(); // Arrête l'exécution du script après la redirection
    }
    else
    {
        // Message envoyé avec succès
        header('Location: index.php?statut=success');
        exit(); // Arrête l'exécution du script après la redirection
    }

