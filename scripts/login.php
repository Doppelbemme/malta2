<?php
ob_start();
require("mysql.php");
require("crypt.php");

$sGame = isset($_POST['login-game']) ? $_POST['login-game'] : 'coinflip';
$sEmail = $_POST["login-email"];
$sPassword = $_POST["login-password"];
$sEmailEncrypted = encrypt($sEmail);

$query = $mysql->prepare("SELECT uuid, username, email, password, role FROM user WHERE EMAIL = :EMAIL");
$query->bindParam(":EMAIL", $sEmailEncrypted);
$query->execute();

$iUserCount = $query->rowCount();
if ($iUserCount != 1) {
    header("Location: ../index.php?game=$sGame&modal=logininfo");
    exit();
}

$aResult = $query->fetch();
$sUuid = $aResult['uuid'];
$sUsername = $aResult['username'];
$sRole = $aResult['role'];
$sPasswordSalted = $sEmail . $sPassword;

if (!password_verify($sPasswordSalted, $aResult['password'])) {
    header("Location: ../index.php?game=$sGame&modal=logininfo");
    exit();
}

/**
 * Check if Username connected to UUID changed and update in database
 */

$sUsernameUrl = "https://api.mojang.com/user/profile/$sUuid";
$sUsernameJson = file_get_contents($sUsernameUrl);
$aUsernameArray = json_decode($sUsernameJson, true);
$sCurrentUsername = $aUsernameArray['name'];

if ($sCurrentUsername != $sUsername) {
    $query = $mysql->prepare("UPDATE user SET username = :CURRENT_USERNAME WHERE uuid = :UUID");
    $query->bindParam(":CURRENT_USERNAME", $sCurrentUsername);
    $query->bindParam(":UUID", $sUuid);
    $query->execute();
    $username = $sCurrentUsername;
}

session_start();
$_SESSION['UUID'] = $sUuid;
$_SESSION['USERNAME'] = $sUsername;
$_SESSION['ROLE'] = $sRole;

header("Location: ../index.php?game=$sGame");
exit();