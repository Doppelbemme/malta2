<?php
$sGame = isset($_GET['game']) ? $_GET['game'] : 'coinflip';
ob_flush();
session_start();
session_destroy();
header('Location: ../index.php?game=' . $sGame);
exit();