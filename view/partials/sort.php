<div class="sort">
    <button class="button tertiary" id="sort" role="combobox" aria-label="Sort by" aria-haspopup="listbox" aria-expanded="false" aria-controls="sort-menu" data-selected="<?php echo !isset($_GET["sort"]) ? "latest" : $_GET["sort"] ?>">
        <?php echo !isset($_GET["sort"]) ? "Latest" : ucwords($_GET["sort"]) ?>
        <?= getIconMarkup("expand") ?>
    </button>
    <ul class="dropdown" id="sort-menu" role="listbox">
        <li id="latest" role="option" class="<?php echo !isset($_GET["sort"]) ? "selected" : checkChoice("sort", "latest") ?>">
            <a href="<?php echo "/games/?" . http_build_query(array_merge($_GET, array("sort" => "latest"))) ?>" tabindex="-1">
                <?= getIconMarkup("latest") ?>
                Latest
            </a>
        </li>
        <li id="ascending" role="option" class="<?= checkChoice("sort", "ascending") ?>">
            <a href="<?php echo "/games/?" . http_build_query(array_merge($_GET, array("sort" => "ascending"))) ?>" tabindex="-1">
                <?= getIconMarkup("ascending") ?>
                Ascending
            </a>
        </li>
        <li id="descending" role="option" class="<?= checkChoice("sort", "descending") ?>">
            <a href="<?php echo "/games/?" . http_build_query(array_merge($_GET, array("sort" => "descending"))) ?>" tabindex="-1">
                <?= getIconMarkup("descending") ?>
                Descending
            </a>
        </li>
        <li id="popular" role="option" class="<?= checkChoice("sort", "popular") ?>">
            <a href="<?php echo "/games/?" . http_build_query(array_merge($_GET, array("sort" => "popular"))) ?>" tabindex="-1">
                <?= getIconMarkup("popular") ?>
                Popular
            </a>
        </li>
    </ul>
</div>