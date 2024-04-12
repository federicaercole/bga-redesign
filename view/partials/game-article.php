<article>
    <h2><?= $game["title"] ?></h2>
    <?php if ($game["premium"]) : ?>
        <span class="premium">Premium</span>
    <?php endif ?>
    <img src="<?= $siteUri ?>assets/images/<?= $game["cover_image"] ?>" alt="">
    <div class="info">
        <div><?= getIconMarkup("players", false, "Number of players") ?>
            <?= $game["min_players"] ?>
            <?php if ($game["min_players"] != $game["max_players"]) : ?>
                - <?= $game["max_players"] ?>
            <?php endif ?>
        </div>
        <div><?= getIconMarkup("time", false, "Playing time") ?>
            <?= $game["time"] ?> min</div>
        <div class="<?= strtolower($game["complexity"]) ?>">
            <?= getIconMarkup("complexity", false, "Complexity") ?>
            <?= $game["complexity"] ?>
        </div>
    </div>
</article>