<?php getHead(); ?>
<?php getNavbar(); ?>
<main>
    <div class="wrapper">
        <div class="search">
            <?= getSearchForm() ?>
            <div class="buttons">
                <button class="button tertiary" id="filter" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="filter-menu">
                    <span>Filter</span>
                    <?= getIconMarkup("expand") ?>
                </button>
                <?= getViewElement("sort") ?>
            </div>
        </div>
    </div>
    <?= getViewElement("filters", ["mechanisms" => $mechanisms, "themes" => $themes]) ?>
    <div class="wrapper">
        <div class="cards-layout games">
            <?php foreach ($games as $game) {
                getGameArticle($game);
            } ?>
        </div>
    </div>
</main>
<?php getFooter(); ?>