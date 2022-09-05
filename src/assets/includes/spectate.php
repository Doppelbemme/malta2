<?php
$iCoinflipId = isset($_GET['coinflipid']) ? $_GET['coinflipid'] : 1;
?>
<div class="spectate">
    <div class="spectate__header">
        <div class="spectate__header--total">
            <i class="spectate__header--total--icon fas fa-coins" aria-hidden="true"></i>
            <h2 class="spectate__header--total--amount">1.387.562,71 Coin Flip</h2>
        </div>
        <a class="spectate__header--close" href="index.php?game=coinflip">
            <i class="fa-solid fa-xmark fa-lg"></i>
            <span>Spiel schließen</span>
        </a>
    </div>
    <div class="spectate__body">
        <div class="spectate__body--player">
            <img class="spectate__body--player--picture"
                 src="https://minotar.net/avatar/03fb83c664984281933cc52984dec2a3/256">
            <h1 class="spectate__body--player--name">Doppelbemme</h1>
            <h3 class="spectate__body--player--chance">(0.00% - 49.99%)</h3>
        </div>
        <div class="spectate__body--vs">
            <div class="spectate__body--vs--coin">
                <div class="spectate__body--vs--coin--heads">
                    <img class="spectate__body--player--picture"
                         src="https://minotar.net/avatar/03fb83c664984281933cc52984dec2a3/192">
                </div>
                <div class="spectate__body--vs--coin--tails">
                    <img class="spectate__body--player--picture"
                         src="https://minotar.net/avatar/MHF_Question/192">
                </div>
            </div>
        </div>
        <div class="spectate__body--player spectate__body--player--two">
            <img class="spectate__body--player--picture"
                 src="https://minotar.net/avatar/MHF_Question/256">
            <h1 class="spectate__body--player--name">Unknown</h1>
            <h3 class="spectate__body--player--chance">(50.00% - 100.00%)</h3>
        </div>
    </div>
</div>
