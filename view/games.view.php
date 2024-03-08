<?php getHead(); ?>
<?php getNavbar(); ?>
<main>
    <div class="wrapper">
        <section class="cards-layout games">
            <?php foreach ($games as $game) {
                getGameArticle($game);
            } ?>
        </section>
    </div>
</main>
<?php getFooter(); ?>