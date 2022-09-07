<?php
ob_start();
require("mysql.php");
require("crypt.php");

$sGame = isset($_POST['register-game']) ? $_POST['register-game'] : 'coinflip';
$sEmail = $_POST['register-email'];
$iRegistrationCode = $_POST['register-code'];
$sPassword = $_POST['register-password'];
$sPasswordRepeat = $_POST['register-password-repeat'];

$query = $mysql->prepare("SELECT code, uuid, username, reg_date FROM registration WHERE code = :REGISTRATION_CODE");
$query->bindParam(":REGISTRATION_CODE", $iRegistrationCode);
$query->execute();
$iCodeAmount = $query->rowCount();

if ($iCodeAmount != 1) {
    header("Location: ../index.php?game=$sGame&modal=codeinvalid");
    exit();
}

$aResult = $query->fetch();
$lRegistrationDate = $aResult['reg_date'];

if (time() > (strtotime($lRegistrationDate) + 1800)) {
    $query = $mysql->prepare("DELETE FROM registration WHERE code = :REGISTRATION_CODE");
    $query->bindParam(":REGISTRATION_CODE", $iRegistrationCode);
    $query->execute();

    header("Location: ../index.php?game=$sGame&modal=codeexpired");
    exit();
}

$sUuid = $aResult['uuid'];
$sUsername = $aResult['username'];
$sRole = "default";
$dBalance = 0.0;

/**
 * Encrypt and hash user data
 */

$sEmailEncrypted = encrypt($sEmail);
$sPasswordSalted = $sEmail . $sPassword;
$sPasswordHashed = password_hash($sPasswordSalted, PASSWORD_BCRYPT);

/**
 * Check if uuid, username or email already exists in database
 */

$query = $mysql->prepare("SELECT * FROM user WHERE email = :EMAIL");
$query->bindParam(":EMAIL", $email);
$query->execute();
$iMailCount = $query->rowCount();

$query = $mysql->prepare("SELECT * FROM user WHERE username = :USERNAME");
$query->bindParam(":USERNAME", $username);
$query->execute();
$iUsernameCount = $query->rowCount();

$query = $mysql->prepare("SELECT * FROM user WHERE uuid = :UUID");
$query->bindParam(":UUID", $uuid);
$query->execute();
$iUuidCount = $query->rowCount();

if ($iUuidCount == 1) {
    header("Location: ../index.php?game=$sGame&modal=accountduplicate");
    exit();
}

if ($iUsernameCount == 1) {
    header("Location: ../index.php?game=$sGame&modal=accountduplicate");
    exit();
}

if ($iMailCount == 1) {
    header("Location: ../index.php?game=$sGame&modal=emailduplicate");
    exit();
}

/**
 * Create user in accounts and balance table
 */

$query = $mysql->prepare('INSERT INTO user (uuid, username, email, password, role) VALUES (:UUID, :USERNAME, :EMAIL, :PASSWORD, :ROLE)');
$query->bindParam(":UUID", $sUuid);
$query->bindParam(":USERNAME", $sUsername);
$query->bindParam(":EMAIL", $sEmailEncrypted);
$query->bindParam(":PASSWORD", $sPasswordHashed);
$query->bindParam(":ROLE", $sRole);
$query->execute();

$query = $mysql->prepare('INSERT INTO balance (uuid, balance) VALUES (:UUID, :BALANCE)');
$query->bindParam(":UUID", $sUuid);
$query->bindParam(":BALANCE", $dBalance);
$query->execute();

$query = $mysql->prepare("DELETE FROM registration WHERE code = :REGISTRATION_CODE");
$query->bindParam(":REGISTRATION_CODE", $iRegistrationCode);
$query->execute();

header("Location: ../index.php?game=$sGame&modal=verify");
exit();