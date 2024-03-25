<?php getHead(); ?>
<?php getNavbar(); ?>
<main>
    <div class="wrapper">
        <section class="search">
            <form method="get" role="search">
                <label for="search-input" class="visually-hidden">Search game</label>
                <input type="text" id="search-input" name="s" aria-describedby="error-search" placeholder="Search for games">
                <button type="submit" class="button neutral">
                    <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M29.5111 32L18.3111 20.8C17.4222 21.5111 16.4 22.0741 15.2444 22.4889C14.0889 22.9037 12.8593 23.1111 11.5556 23.1111C8.32593 23.1111 5.59259 21.9926 3.35556 19.7556C1.11852 17.5185 0 14.7852 0 11.5556C0 8.32593 1.11852 5.59259 3.35556 3.35556C5.59259 1.11852 8.32593 0 11.5556 0C14.7852 0 17.5185 1.11852 19.7556 3.35556C21.9926 5.59259 23.1111 8.32593 23.1111 11.5556C23.1111 12.8593 22.9037 14.0889 22.4889 15.2444C22.0741 16.4 21.5111 17.4222 20.8 18.3111L32 29.5111L29.5111 32ZM11.5556 19.5556C13.7778 19.5556 15.6667 18.7778 17.2222 17.2222C18.7778 15.6667 19.5556 13.7778 19.5556 11.5556C19.5556 9.33333 18.7778 7.44444 17.2222 5.88889C15.6667 4.33333 13.7778 3.55556 11.5556 3.55556C9.33333 3.55556 7.44444 4.33333 5.88889 5.88889C4.33333 7.44444 3.55556 9.33333 3.55556 11.5556C3.55556 13.7778 4.33333 15.6667 5.88889 17.2222C7.44444 18.7778 9.33333 19.5556 11.5556 19.5556Z" />
                    </svg>
                    <span class="visually-hidden">Search</span></button>
            </form>
            <div class="buttons">
                <button class="button tertiary" id="filter" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="filter-menu">
                    <span>Filter</span>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                        <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                </button>
                <div class="sort">
                    <span class="visually-hidden" id="sort-label">Sort by</span>
                    <button class="button tertiary" id="sort" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="sort-menu">
                        <?php echo !isset($_GET["sort"]) ? "Latest" : ucwords($_GET["sort"]) ?> <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                            <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                    </button>
                    <ul class="dropdown" id="sort-menu" role="listbox" aria-labelledby="sort-label">
                        <li id="latest" role="option" class="<?php echo !isset($_GET["sort"]) ? "selected" : checkChoice("sort", "latest") ?>">
                            <a href="<?php echo "{$siteUri}games/?" . http_build_query(array_merge($_GET, array("sort" => "latest"))) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" focusable="false" aria-hidden="true">
                                    <path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z" />
                                </svg>
                                Latest
                            </a>
                        </li>
                        <li id="ascending" role="option" class="<?= checkChoice("sort", "ascending") ?>">
                            <a href="<?php echo "{$siteUri}games/?" . http_build_query(array_merge($_GET, array("sort" => "ascending"))) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" focusable="false" aria-hidden="true">
                                    <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
                                </svg>
                                Ascending</a>
                        </li>
                        <li id="descending" role="option" class="<?= checkChoice("sort", "descending") ?>">
                            <a href="<?php echo "{$siteUri}games/?" . http_build_query(array_merge($_GET, array("sort" => "descending"))) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" focusable="false" aria-hidden="true">
                                    <path d="M440-800v487L216-537l-56 57 320 320 320-320-56-57-224 224v-487h-80Z" />
                                </svg>Descending </a>
                        </li>
                        <li id="popular" role="option" class="<?= checkChoice("sort", "popular") ?>">
                            <a href="<?php echo "{$siteUri}games/?" . http_build_query(array_merge($_GET, array("sort" => "popular"))) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" focusable="false" aria-hidden="true">
                                    <path d=" m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z" />
                                </svg>
                                Popular</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="filters fixed-layout" id="filter-menu">
        <div class="wrapper fixed-layout">
            <button type="button" id="close">Close <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" focusable="false" aria-hidden="true">
                    <path d="m296-345-56-56 240-240 240 240-56 56-184-184-184 184Z" />
                </svg></button>
            <form method="get">
                <div class="scrollable">
                    <fieldset>
                        <legend><button type="button" aria-haspopup="true" aria-expanded="false"><svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true" class="icon">
                                    <path d="M5 5.5C4.3125 5.5 3.72396 5.25521 3.23438 4.76562C2.74479 4.27604 2.5 3.6875 2.5 3C2.5 2.3125 2.74479 1.72396 3.23438 1.23438C3.72396 0.744792 4.3125 0.5 5 0.5C5.6875 0.5 6.27604 0.744792 6.76562 1.23438C7.25521 1.72396 7.5 2.3125 7.5 3C7.5 3.6875 7.25521 4.27604 6.76562 4.76562C6.27604 5.25521 5.6875 5.5 5 5.5ZM0 10.5V8.75C0 8.39583 0.0911458 8.07031 0.273438 7.77344C0.455729 7.47656 0.697917 7.25 1 7.09375C1.64583 6.77083 2.30208 6.52865 2.96875 6.36719C3.63542 6.20573 4.3125 6.125 5 6.125C5.6875 6.125 6.36458 6.20573 7.03125 6.36719C7.69792 6.52865 8.35417 6.77083 9 7.09375C9.30208 7.25 9.54427 7.47656 9.72656 7.77344C9.90885 8.07031 10 8.39583 10 8.75V10.5H0Z" />
                                </svg> Players <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                                </svg>
                            </button></legend>
                        <div class="dropdown">
                            <label for="players">Number of players</label>
                            <input type="number" id="players" min="1" step="1" name="players" value="<?= $_GET["players"] ?? "" ?>">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><button type="button" aria-haspopup="true" aria-expanded="false">
                                <svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true" class="icon">
                                    <path d="M6.65 7.85L7.35 7.15L5.5 5.3V3H4.5V5.7L6.65 7.85ZM5 10.5C4.30833 10.5 3.65833 10.3687 3.05 10.1062C2.44167 9.84375 1.9125 9.4875 1.4625 9.0375C1.0125 8.5875 0.65625 8.05833 0.39375 7.45C0.13125 6.84167 0 6.19167 0 5.5C0 4.80833 0.13125 4.15833 0.39375 3.55C0.65625 2.94167 1.0125 2.4125 1.4625 1.9625C1.9125 1.5125 2.44167 1.15625 3.05 0.89375C3.65833 0.63125 4.30833 0.5 5 0.5C5.69167 0.5 6.34167 0.63125 6.95 0.89375C7.55833 1.15625 8.0875 1.5125 8.5375 1.9625C8.9875 2.4125 9.34375 2.94167 9.60625 3.55C9.86875 4.15833 10 4.80833 10 5.5C10 6.19167 9.86875 6.84167 9.60625 7.45C9.34375 8.05833 8.9875 8.5875 8.5375 9.0375C8.0875 9.4875 7.55833 9.84375 6.95 10.1062C6.34167 10.3687 5.69167 10.5 5 10.5Z" />
                                </svg>
                                Playing Time <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                                </svg>
                            </button>
                        </legend>
                        <div class="dropdown">
                            <label for="time">Max playing time (in minutes)</label>
                            <input type="number" id="time" min="1" step="1" name="time" value="<?= $_GET["time"] ?? "" ?>">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><button type="button" aria-haspopup="true" aria-expanded="false">
                                <svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true" class="icon">
                                    <path d="M0 6.07693C0 5.54564 0.430769 5.11539 0.961539 5.11539H1.34615C1.87744 5.11539 2.30769 5.54616 2.30769 6.07693V9.53846C2.30769 10.0692 1.87692 10.5 1.34615 10.5H0.961539C0.706523 10.5 0.461952 10.3987 0.281628 10.2184C0.101305 10.0381 0 9.79348 0 9.53846V6.07693Z" />
                                    <path d="M3.46155 3.76922C3.46155 3.23793 3.89232 2.80768 4.42309 2.80768H4.8077C5.33898 2.80768 5.76924 3.23845 5.76924 3.76922V9.53845C5.76924 10.0692 5.33847 10.5 4.8077 10.5H4.42309C4.16807 10.5 3.9235 10.3987 3.74318 10.2184C3.56285 10.038 3.46155 9.79346 3.46155 9.53845V3.76922Z" />
                                    <path d="M7.88463 0.5C7.35386 0.5 6.9231 0.930769 6.9231 1.46154V9.53846C6.9231 10.0692 7.35386 10.5 7.88463 10.5H8.26925C8.80002 10.5 9.23079 10.0692 9.23079 9.53846V1.46154C9.23079 0.930256 8.80002 0.5 8.26925 0.5H7.88463Z" />
                                </svg>
                                Complexity
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                                </svg>
                            </button></legend>
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
                        <legend><button type="button" aria-haspopup="true" aria-expanded="false">
                                <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true" class="icon">
                                    <path d="M4.86667 13.3333L4.6 11.2C4.45556 11.1444 4.31944 11.0778 4.19167 11C4.06389 10.9222 3.93889 10.8389 3.81667 10.75L1.83333 11.5833L0 8.41667L1.71667 7.11667C1.70556 7.03889 1.7 6.96389 1.7 6.89167V6.44167C1.7 6.36944 1.70556 6.29444 1.71667 6.21667L0 4.91667L1.83333 1.75L3.81667 2.58333C3.93889 2.49444 4.06667 2.41111 4.2 2.33333C4.33333 2.25556 4.46667 2.18889 4.6 2.13333L4.86667 0H8.53333L8.8 2.13333C8.94444 2.18889 9.08056 2.25556 9.20833 2.33333C9.33611 2.41111 9.46111 2.49444 9.58333 2.58333L11.5667 1.75L13.4 4.91667L11.6833 6.21667C11.6944 6.29444 11.7 6.36944 11.7 6.44167V6.89167C11.7 6.96389 11.6889 7.03889 11.6667 7.11667L13.3833 8.41667L11.55 11.5833L9.58333 10.75C9.46111 10.8389 9.33333 10.9222 9.2 11C9.06667 11.0778 8.93333 11.1444 8.8 11.2L8.53333 13.3333H4.86667ZM6.73333 9C7.37778 9 7.92778 8.77222 8.38333 8.31667C8.83889 7.86111 9.06667 7.31111 9.06667 6.66667C9.06667 6.02222 8.83889 5.47222 8.38333 5.01667C7.92778 4.56111 7.37778 4.33333 6.73333 4.33333C6.07778 4.33333 5.525 4.56111 5.075 5.01667C4.625 5.47222 4.4 6.02222 4.4 6.66667C4.4 7.31111 4.625 7.86111 5.075 8.31667C5.525 8.77222 6.07778 9 6.73333 9Z" />
                                </svg>
                                Mechanism <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                                </svg>
                            </button>
                        </legend>
                        <ul class="dropdown">
                            <?php foreach ($mechanisms as $mechanism) : ?>
                                <li>
                                    <input type="checkbox" value="<?= $mechanism["id"] ?>" id="<?= createSlug($mechanism["name"]) ?>" name="mechanism[]" <?php checkChoice("mechanism", $mechanism["id"]) ?>>
                                    <label for="<?= createSlug($mechanism["name"]) ?>"><?= $mechanism["name"] ?></label>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend><button type="button" aria-haspopup="true" aria-expanded="false">
                                <svg viewBox="0 0 16 12" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true" class="icon">
                                    <path d="M0.5 12V4H1.83333V5.33333H3.16667V0H4.5V1.33333H5.83333V0H7.16667V1.33333H8.5V0H9.83333V1.33333H11.1667V0H12.5V5.33333H13.8333V4H15.1667V12H9.16667V10C9.16667 9.63333 9.03611 9.31944 8.775 9.05833C8.51389 8.79722 8.2 8.66667 7.83333 8.66667C7.46667 8.66667 7.15278 8.79722 6.89167 9.05833C6.63056 9.31944 6.5 9.63333 6.5 10V12H0.5ZM5.83333 6H7.16667V4H5.83333V6ZM8.5 6H9.83333V4H8.5V6Z" />
                                </svg>
                                Theme <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                                    <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                                </svg>
                            </button>
                        </legend>
                        <ul class="dropdown">
                            <?php foreach ($themes as $theme) : ?>
                                <li>
                                    <input type="checkbox" value="<?= $theme["id"] ?>" id="<?= createSlug($theme["name"]) ?>" name="theme[]" <?php checkChoice("theme", $theme["id"]) ?>>
                                    <label for="<?= createSlug($theme["name"]) ?>"><?= $theme["name"] ?></label>
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
    <div class="wrapper">
        <section class="cards-layout games">
            <?php foreach ($games as $game) {
                getGameArticle($game);
            } ?>
        </section>
    </div>
    </div>
</main>
<?php getFooter(); ?>