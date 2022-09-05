<div class="coinflip">
    <form class="coinflip__create" method="post" action="scripts/coinflip/createCoinflip.php">
        <h2 class="coinflip__create--header">Coinflip</h2>
        <div class="coinflip__create--stake">
            <i class="coinflip__create--stake--icon fas fa-coins" aria-hidden="true"></i>
            <input class="coinflip__create--stake--input" type="text" name="coinflip__create--stake"
                   id="coinflip-create-amount"
                   placeholder="Betrag eingeben..." required>
        </div>
        <input class="coinflip__create--submit" type="submit" name="coinflip-create-submit" id="coinflip-create-submit"
               value="Erstellen" <?php if (!$bIsUserLoggedIn) echo 'disabled' ?>>
    </form>
    <div class="coinflip__games">
        <div class="coinflip__games--game">
            <div class="coinflip__games--game--player">
                <img src="https://minotar.net/avatar/03fb83c664984281933cc52984dec2a3/60">
                <h2>VS.</h2>
                <img src="https://minotar.net/avatar/MHF_Question/60">
            </div>
            <div class="coinflip__games--game--amount">
                <i class="coinflip__games--game--amount--icon fa-solid fa-coins fa-xl"></i>
                <h2 class="coinflip__games--game--amount--stake">1.387.562,71</h2>
            </div>
            <div class="coinflip__games--game--button">
                <a href="index.php?game=coinflip&spectate=1&coinflipid=1" class="coinflip__games--game--btn coinflip__games--game--button--watch">Beobachten</a>
                <button class="coinflip__games--game--btn coinflip__games--game--button--join" <?php if (!$bIsUserLoggedIn) echo 'disabled' ?>>Beitreten</button>
            </div>
        </div>
    </div>
</div>