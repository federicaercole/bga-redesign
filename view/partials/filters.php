<div class="filters fixed-layout" id="filter-menu">
    <div class="wrapper fixed-layout">
        <button type="button" id="close">Close <?= getIconMarkup("expand") ?></button>
        <form method="get">
            <div class="scrollable">
                <fieldset>
                    <?= getViewElement("filter-btn", ["text" => "Players", "value" => "players"]) ?>
                    <div class="dropdown">
                        <label for="players">Number of players</label>
                        <input type="number" id="players" min="1" step="1" name="players" value="<?= $_GET["players"] ?? "" ?>">
                    </div>
                </fieldset>
                <fieldset>
                    <?= getViewElement("filter-btn", ["text" => "Playing time", "value" => "time"]) ?>
                    <div class="dropdown">
                        <label for="time">Max playing time (in minutes)</label>
                        <input type="number" id="time" min="1" step="1" name="time" value="<?= $_GET["time"] ?? "" ?>">
                    </div>
                </fieldset>
                <fieldset>
                    <?= getViewElement("filter-btn", ["text" => "Complexity", "value" => "complexity"]) ?>
                    <ul class="dropdown">
                        <li>
                            <input type="checkbox" id="easy" value="easy" name="complexity[]" <?php checkChoice("complexity", "easy") ?>>
                            <label for="easy">Easy</label>
                        </li>

                        <li>
                            <input type="checkbox" id="medium" value="medium" name="complexity[]" <?php checkChoice("complexity", "medium") ?>>
                            <label for="medium">Medium</label>
                        </li>

                        <li>
                            <input type="checkbox" id="hard" value="hard" name="complexity[]" <?php checkChoice("complexity", "hard") ?>>
                            <label for="hard">Hard</label>
                        </li>
                    </ul>
                </fieldset>
                <fieldset>
                    <?= getViewElement("filter-btn", ["text" => "Mechanism", "value" => "mechanism"]) ?>
                    <ul class="dropdown">
                        <?php foreach ($args["mechanisms"] as $mechanism) : ?>
                            <li>
                                <input type="checkbox" value="<?= $mechanism["id"] ?>" id="<?= createSlug($mechanism["name"]) ?>-mechanism" name="mechanism[]" <?php checkChoice("mechanism", $mechanism["id"]) ?>>
                                <label for="<?= createSlug($mechanism["name"]) ?>-mechanism"><?= $mechanism["name"] ?></label>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </fieldset>
                <fieldset>
                    <?= getViewElement("filter-btn", ["text" => "Theme", "value" => "theme"]) ?>
                    <ul class="dropdown">
                        <?php foreach ($args["themes"] as $theme) : ?>
                            <li>
                                <input type="checkbox" value="<?= $theme["id"] ?>" id="<?= createSlug($theme["name"]) ?>-theme" name="theme[]" <?php checkChoice("theme", $theme["id"]) ?>>
                                <label for="<?= createSlug($theme["name"]) ?>-theme"><?= $theme["name"] ?></label>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </fieldset>
            </div>
            <div class="buttons">
                <button type="button" class="button neutral secondary" id="clear">Clear filters</button>
                <button type="submit" class="button neutral">Filter results</button>
            </div>
        </form>
    </div>
</div>