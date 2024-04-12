<legend>
    <button type="button" aria-haspopup="true" aria-expanded="false">
        <?= getIconMarkup($args["value"]) ?>
        <?= $args["text"] ?>
        <?= printNumberofSelectedValues($args["value"]) ?>
        <?= getIconMarkup("expand") ?>
    </button>
</legend>