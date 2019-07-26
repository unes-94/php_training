<?php
include "includes/head.php";
session_start();
if (empty($_SESSION['number'])) {
    $_SESSION['number'] = rand(0,100);
    $_SESSION['tentative'] = 0;
}
$number = $_SESSION['number'];
echo $number;

if (isset($_POST['verifier'])) {
    if (isset($_POST['user_number']) AND !empty($_POST['user_number'])) {
        $chiffre = intval($_POST['user_number']);
        if ($chiffre > $number) {
            $message = 'Trop haut';
        } elseif ($chiffre < $number) {
            $message = 'Trop bas';
        } else {
            $message = 'Vous avez trouvé le bon chiffre !';
            unset($_SESSION['number'], $number);
        }
    } else {
        $message = "Veuillez introduire un chiffre !";
    }} 
 ?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">choisissez un nombre</label>
        <input type="text" name="user_number">
        <input type="hidden" value="">
        <input type="submit" name="verifier" value="verifier" class="btn btn-outline-danger">
    </form>
<p><?php if(isset($message)) echo $message; ?></p>
</body>
</html>