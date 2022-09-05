<?php
ob_start();
if (!isset($_POST['coinflip__create--stake'])) {
    header("Location: ../../?game=coinflip&error=stake");
    exit;
}
$stake = str_replace(',', '.', $_POST['coinflip__create--stake']);

if ($stake < 1) {
    header("Location: ../../?game=coinflip&error=stake");
    exit;
}

$stake = roundDown($stake, 2);

if (!is_numeric($stake)) {
    header("Location: ../../?game=coinflip&error=stake");
    exit;
}
require("../mysql.php");

session_start();
$uuid = $_SESSION['UUID'];
$username = $_SESSION['USERNAME'];

$statment = $mysql->prepare("SELECT * FROM balances WHERE UUID = :UUID");
$statment->bindParam(":UUID", $uuid);
$statment->execute();
$result = $statment->fetch();
$balance_available = $result['BALANCE'];

if ($stake > $balance_available) {
    header("Location: ../../coinflip.php?error=stake");
    exit;
}

$statement = $mysql->prepare("SELECT * FROM coinflip_active WHERE UUID_1 = :UUID");
$statement->bindParam(":UUID", $uuid);
$statement->execute();
$active_user_flips = $statement->rowCount();

if ($active_user_flips >= 5) {
    header("Location: ../../coinflip.php?error=limit");
    exit;
}

$statment = $mysql->prepare('INSERT INTO coinflip_active (PLAYER_1, UUID_1, STAKE) VALUES (:PLAYER_1, :UUID_1, :STAKE)');
$statment->bindParam(":PLAYER_1", $username);
$statment->bindParam(":UUID_1", $uuid);
$statment->bindParam(":STAKE", $stake);
$statment->execute();

$newBalance = $balance_available - $stake;

$statment = $mysql->prepare('UPDATE balances SET BALANCE = :BALANCE WHERE UUID = :UUID');
$statment->bindParam(":BALANCE", $newBalance);
$statment->bindParam(":UUID", $uuid);
$statment->execute();

header("Location: ../../coinflip.php");

/**
 * Function copied from:
 * https://stackoverflow.com/a/35517739
 */

function roundDown($decimal, $precision)
{
    $sign = $decimal > 0 ? 1 : -1;
    $base = pow(10, $precision);
    return floor(abs($decimal) * $base) / $base * $sign;
}
