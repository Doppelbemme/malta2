<?php
$sModal = isset($_GET['modal']) ? $_GET['modal'] : 'none';
$sGame = isset($_GET['game']) ? $_GET['game'] : 'coinflip';

if ($sModal == 'register') { ?>
    <div class="modal__container">
        <div class="modal__register">
            <a href="index.php?game=<?= $sGame ?>">
                <i class="modal__register--close fa-solid fa-xmark fa-lg fa-fw"></i>
            </a>
            <div class="modal__register--header">
                <h2 class="modal__register--header--heading">Registrieren</h2>
            </div>
            <div class="modal__register--body">
                <form class="modal__register--body--form" action="#" method="post">
                    <div id="register-email">
                        <input class="modal__register--body--form--email" type="text" placeholder="E-Mail" required/>
                        <i class="modal__register--body--form--icon fa-solid fa-envelope fa-fw"></i>
                    </div>
                    <div id="register-code">
                        <input class="modal__register--body--form--code" type="text"
                               placeholder="Dein Registrierungs Code"
                               required/>
                        <i class="modal__register--body--form--icon fa-solid fa-barcode fa-fw"></i>
                    </div>
                    <div id="register-password">
                        <input class="modal__register--body--form--password" type="password" placeholder="Passwort"
                               required/>
                        <i class="modal__register--body--form--icon fa-solid fa-lock fa-fw"></i>
                    </div>
                    <div id="register-password-repeat">
                        <input class="modal__login--body--form--password" type="password" placeholder="Passwort wiederholen"
                               required/>
                        <i class="modal__login--body--form--icon fa-solid fa-repeat fa-fw"></i>
                    </div>
                    <input class="modal__register--body--form--submit" type="submit" value="Anmelden">
                </form>
                <a class="modal__register--body--password--link" href="#">Kein Registrierungs Code?</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'login') { ?>
    <div class="modal__container">
        <div class="modal__login">
            <a href="index.php?game=<?= $sGame ?>">
                <i class="modal__login--close fa-solid fa-xmark fa-lg fa-fw"></i>
            </a>
            <div class="modal__login--header">
                <h2 class="modal__login--header--heading">Login</h2>
            </div>
            <div class="modal__login--body">
                <form class="modal__login--body--form" action="#" method="post">
                    <div id="login-email">
                        <input class="modal__login--body--form--email" type="text" placeholder="E-Mail" required/>
                        <i class="modal__login--body--form--icon fa-solid fa-envelope fa-fw"></i>
                    </div>
                    <div id="login-password">
                        <input class="modal__login--body--form--password" type="password" placeholder="Passwort"
                               required/>
                        <i class="modal__login--body--form--icon fa-solid fa-lock fa-fw"></i>
                    </div>
                    <input class="modal__login--body--form--submit" type="submit" value="Anmelden">
                </form>
                <a class="modal__login--body--password--link" href="#">Passwort vergessen?</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'banned') { ?>
    <div class="modal__container">
        <div class="modal__banned">
            <div class="modal__banned--header">
                <h2 class="modal__banned--header--heading">Information</h2>
            </div>
            <div class="modal__banned--body">
                <p class="modal__banned--body--text">Dein Account wurde gesperrt. Es ist dir nicht möglich mit diesem
                    Account weitere Wetten abzuschließen.</p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__banned--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'reset') { ?>
    <div class="modal__container">

    </div>
<?php } ?>
