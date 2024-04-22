<article>
    <h2>
        <a href="/games/<?= $game['slug'] ?>/"><?= $game["title"] ?></a>
    </h2>
    <?php if ($game["premium"]) : ?>
        <span class="tag premium">Premium</span>
    <?php endif ?>
    <img src="/assets/images/<?= $game["cover_image"] ?>" alt="">
    <div class="info">
        <div><?= getIconMarkup("players", false, "Number of players") ?>
            <?= $game["min_players"] ?>
            <?php if ($game["min_players"] != $game["max_players"]) : ?>
                - <?= $game["max_players"] ?>
            <?php endif ?>
        </div>
        <div><?= getIconMarkup("time", false, "Playing time") ?>
            <?= $game["time"] ?> m</div>
        <div class="<?= strtolower($game["complexity"]) ?>">
            <?= getIconMarkup("complexity", false, "Complexity") ?>
            <?= $game["complexity"] ?>
        </div>
    </div>
</article>