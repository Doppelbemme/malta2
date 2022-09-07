<?php
$sModal = isset($_GET['modal']) ? $_GET['modal'] : 'none';
$sGame = isset($_GET['game']) ? $_GET['game'] : 'coinflip';

if ($sModal == 'register') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__form">
            <a href="index.php?game=<?= $sGame ?>">
                <i class="modal__form--close fa-solid fa-xmark fa-lg fa-fw"></i>
            </a>
            <div class="modal__form--header">
                <h2 class="modal__form--header--heading">Registrieren</h2>
            </div>
            <div class="modal__form--body">
                <form class="modal__form--body--form" action="scripts/register.php" method="post">
                    <input class="modal__form--body--form--game" type="hidden" name="register-game" value="<?= $sGame ?>" readonly/>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--email" type="text" placeholder="E-Mail" name="register-email" required/>
                        <i class="modal__form--body--form--icon fa-solid fa-envelope fa-fw"></i>
                    </div>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--code" type="text" name="register-code"
                               placeholder="Dein Registrierungs Code"
                               required/>
                        <i class="modal__form--body--form--icon fa-solid fa-barcode fa-fw"></i>
                    </div>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--password" type="password" placeholder="Passwort" name="register-password"
                               required/>
                        <i class="modal__form--body--form--icon fa-solid fa-lock fa-fw"></i>
                    </div>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--password" type="password" placeholder="Passwort wiederholen" name="register-password-repeat"
                               required/>
                        <i class="modal__form--body--form--icon fa-solid fa-repeat fa-fw"></i>
                    </div>
                    <input class="modal__form--body--form--submit" type="submit" value="Registrieren">
                </form>
                <a class="modal__form--body--password--link" href="https://forum.griefergames.de/forum" target="_blank">Kein Registrierungs Code?</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'login') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__form">
            <a href="index.php?game=<?= $sGame ?>">
                <i class="modal__form--close fa-solid fa-xmark fa-lg fa-fw"></i>
            </a>
            <div class="modal__form--header">
                <h2 class="modal__form--header--heading">Login</h2>
            </div>
            <div class="modal__form--body">
                <form class="modal__form--body--form" action="scripts/login.php" method="post">
                    <input class="modal__form--body--form--game" type="hidden" name="login-game" value="<?= $sGame ?>" readonly/>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--email" type="text" placeholder="E-Mail" name="login-email" required/>
                        <i class="modal__form--body--form--icon fa-solid fa-envelope fa-fw"></i>
                    </div>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--password" type="password" name="login-password" placeholder="Passwort"
                               required/>
                        <i class="modal__form--body--form--icon fa-solid fa-lock fa-fw"></i>
                    </div>
                    <input class="modal__form--body--form--submit" type="submit" value="Login">
                </form>
                <a class="modal__form--body--password--link" href="index.php?game<?= $sGame ?>&modal=resetform">Passwort vergessen?</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'resetform') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__form">
            <a href="index.php?game=<?= $sGame ?>">
                <i class="modal__form--close fa-solid fa-xmark fa-lg fa-fw"></i>
            </a>
            <div class="modal__form--header">
                <h2 class="modal__form--header--heading">Passwort</h2>
            </div>
            <div class="modal__form--body">
                <form class="modal__form--body--form" action="#" method="post">
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--username" type="text" placeholder="Benutzername" required/>
                        <i class="modal__form--body--form--icon fa-solid fa-user fa-fw"></i>
                    </div>
                    <div class="modal__form--body--form--input">
                        <input class="modal__form--body--form--email" type="text" placeholder="E-Mail" required/>
                        <i class="modal__form--body--form--icon fa-solid fa-envelope fa-fw"></i>
                    </div>
                    <input class="modal__form--body--form--submit" type="submit" value="Zurücksetzen">
                </form>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'banned') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Gesperrt</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Dein Account wurde gesperrt. Es ist dir nicht möglich weitere Wetten abzuschließen.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'resetinfo') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Passwort</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Sollten die Daten mit unserem System übereinstimmen, erhältst du innerhalb der nächsten 5 Minuten einen Link um dein Passwort zurückzusetzen.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'verify') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Verifizierung</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Bitte bestätige deine E-Mail um vollständig auf unseren Service zugreifen zu können. 
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'logininfo') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Login</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Die angegebenen Daten stimmen nicht mit unserem System überein. Bitte versuche es erneut.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'registerinfo') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Registrieen</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Die angegebenen Daten stimmen nicht mit unserem System überein. Bitte versuche es erneut.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'codeinvalid') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Code</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Der angegebenen Registrierungs Code stimmt nicht mit unserem System überein. Bitte versuche es erneut.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'codeexpired') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Code</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Der angegebenen Registrierungs Code ist nicht mehr gültig. Bitte generiere einen neuen Code.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'accountduplicate') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Account</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Es existiert bereits ein Account mit den angebenen Daten. Bitte versuche es erneut.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } elseif ($sModal == 'emailduplicate') { ?>
    <div class="modal__container" id="modal__container">
        <div class="modal__info">
            <div class="modal__info--header">
                <h2 class="modal__info--header--heading">Account</h2>
            </div>
            <div class="modal__info--body">
                <p class="modal__info--body--text">
                    Es existiert bereits ein Account mit der angebenen E-Mail Adresse. Bitte versuche es erneut.
                </p>
                <a href="index.php?game=<?= $sGame ?>" class="modal__info--body--button">Okay</a>
            </div>
        </div>
    </div>
<?php } ?>