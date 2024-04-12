<form method="get" role="search">
    <label for="search-input" class="visually-hidden">Search game</label>
    <input type="text" id="search-input" name="s" placeholder="Search for games" aria-haspopup="listbox" role="combobox" aria-expanded="false" aria-controls="suggestion-box" aria-autocomplete="list" autocomplete="off">
    <button type="submit" class="button neutral">
        <?= getIconMarkup("search") ?>
        <span class="visually-hidden">Search</span></button>
    <ul id="suggestion-box" class="dropdown" role="listbox" aria-label="Games">
    </ul>
</form>