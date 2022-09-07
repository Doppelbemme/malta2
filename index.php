<?php
ob_flush();
session_start();
$bIsUserLoggedIn = isset($_SESSION['UUID']);
$sGame = isset($_GET['game']) ? $_GET['game'] : 'coinflip';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/assets/styles/base.scss">
    <link rel="stylesheet" href="src/assets/styles/header.scss">
    <link rel="stylesheet" href="src/assets/styles/main.scss">
    <link rel="stylesheet" href="src/assets/styles/ranks.scss">
    <link rel="stylesheet" href="src/assets/styles/loader.scss">
    <link rel="stylesheet" href="src/assets/styles/maintenance.scss">
    <link rel="stylesheet" href="src/assets/styles/coinflip.scss">
    <link rel="stylesheet" href="src/assets/styles/spectate.scss">
    <link rel="stylesheet" href="src/assets/styles/modal.scss">
    <script src="https://kit.fontawesome.com/467cba3d21.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="src/assets/js/loader.js"></script>
    <title>GrieferBet</title>
</head>
<body>
<div class="loader">
    <div class="loader__ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<header class="header">
    <a class="header__logo" href="index.php">GrieferBet</a>
    <ul class="header__links">
        <li class="header__links--link <?php if ($sGame == 'jackpot') echo 'active' ?>">
            <a href="index.php?game=jackpot">Jackpot</a>
        </li>
        <li class="header__links--link <?php if ($sGame == 'coinflip') echo 'active' ?>">
            <a href="index.php?game=coinflip">Coinflip</a>
        </li>
    </ul>
    <?php if ($bIsUserLoggedIn) { ?>
        <div class="header__menu">
            <div class="header__menu--balance--container">
                <i class="fa-solid fa-coins"></i>
                <p>
                    45.000,00
                </p>
            </div>
            <div class="header__menu--user--container">
                <p class="header__menu--user--name">Doppelbemme</p>
                <p class="header__menu--user--level">Level 1</p>
            </div>
            <img class="header__menu--picture" src="https://minotar.net/avatar/03fb83c664984281933cc52984dec2a3/50"/>
            <i class="header__menu--settings fa-solid fa-gear"></i>
            <a href="scripts/logout.php?game=<?= $sGame ?>" class="header__menu--logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    <?php } else { ?>
        <div class="header__buttons">
            <a href="index.php?game=<?= $sGame ?>&modal=register" class="header__buttons--button">Registrieren</a>
            <a href="index.php?game=<?= $sGame ?>&modal=login" class="header__buttons--button">Login</a>
        </div>
    <?php } ?>
</header>
<main>
    <?php
    switch ($sGame) {
        case 'coinflip':
            include('src/assets/includes/coinflip.php');
            break;
        case 'jackpot':
            include('src/assets/includes/maintenance.php');
            break;
    }
    $aQuerys = explode('&', $_SERVER['QUERY_STRING']);
    if (isset($aQuerys[1])) {
        if ($aQuerys[1] == 'spectate=1') {
            include('src/assets/includes/spectate.php');
        }
        if (str_contains($aQuerys[1], 'modal')) {
            include('src/assets/includes/modal.php');
        }
    }
    ?>
</main>
</body>
</html>