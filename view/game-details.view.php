<?php getHead(); ?>
<?php getNavbar(); ?>
<main>
    <div class="wrapper game">
        <div>
            <?php if ($game["premium"]) : ?>
                <span class="tag premium">Premium</span>
            <?php endif ?>
            <div class="title">
                <h1><?= $game["title"] ?></h1>
                <a class="button tertiary" href=""><?= getIconMarkup("favorite") ?> Add to favorites </a>
            </div>
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
                <ul aria-label="Mechanisms and themes">
                    <?php foreach ($mechanisms as $mechanism) : ?>
                        <li><a class="tag" href="/games/?mechanism[]=<?= $mechanism['id'] ?>"><?= $mechanism["name"] ?></a></li>
                    <?php endforeach ?>
                    <?php foreach ($themes as $theme) : ?>
                        <li><a class="tag" href="/games/?theme[]=<?= $theme['id'] ?>"><?= $theme["name"] ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="game-details">
            <div class="game-image">
                <img src="/assets/images/<?= $game['box_image'] ?>" alt="">
                <a class="button tertiary" href=""><?= getIconMarkup("screen") ?> Watch a game in progress</a>
            </div>
            <div class="about">
                <h2>Description</h2>
                <?= nl2p($game["description"]) ?>
                <div class="additional-info">
                    <div>
                        <h3>About the game</h3>
                        <ul>
                            <li>Designed by <?= $game["designer"] ?></li>
                            <li>Art by <?= $game["artist"] ?></li>
                            <li>Published by <?= $game["publisher"] ?></li>
                            <li>Year <?= $game["year"] ?></li>
                        </ul>
                    </div>
                    <div>
                        <h3>About the game on BGA</h3>
                        <ul>
                            <li>Developed by <?= $game["developer"] ?></li>
                            <li>Number of games played <?= number_format($game["number_of_games"]) ?></li>
                            <li>Available since <?= $game["date_added"] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="" class="button big neutral">Learn the game</a>
            <a href="" class="button big primary">Play now</a>
        </div>
    </div>
</main>
<?php getFooter(); ?>