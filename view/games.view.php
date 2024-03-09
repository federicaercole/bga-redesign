<?php getHead(); ?>
<?php getNavbar(); ?>
<main>
    <div class="wrapper">
        <section class="search">
            <form method="get" role="search">
                <label for="search-input" class="visually-hidden">Search game</label>
                <input type="text" id="search-input" name="s" aria-describedby="error-search" placeholder="Search for games">
                <button type="submit">
                    <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M29.5111 32L18.3111 20.8C17.4222 21.5111 16.4 22.0741 15.2444 22.4889C14.0889 22.9037 12.8593 23.1111 11.5556 23.1111C8.32593 23.1111 5.59259 21.9926 3.35556 19.7556C1.11852 17.5185 0 14.7852 0 11.5556C0 8.32593 1.11852 5.59259 3.35556 3.35556C5.59259 1.11852 8.32593 0 11.5556 0C14.7852 0 17.5185 1.11852 19.7556 3.35556C21.9926 5.59259 23.1111 8.32593 23.1111 11.5556C23.1111 12.8593 22.9037 14.0889 22.4889 15.2444C22.0741 16.4 21.5111 17.4222 20.8 18.3111L32 29.5111L29.5111 32ZM11.5556 19.5556C13.7778 19.5556 15.6667 18.7778 17.2222 17.2222C18.7778 15.6667 19.5556 13.7778 19.5556 11.5556C19.5556 9.33333 18.7778 7.44444 17.2222 5.88889C15.6667 4.33333 13.7778 3.55556 11.5556 3.55556C9.33333 3.55556 7.44444 4.33333 5.88889 5.88889C4.33333 7.44444 3.55556 9.33333 3.55556 11.5556C3.55556 13.7778 4.33333 15.6667 5.88889 17.2222C7.44444 18.7778 9.33333 19.5556 11.5556 19.5556Z" />
                    </svg>

                    <span class="visually-hidden">Search</span></button>
            </form>
            <div class="buttons">
                <button class="button" type="button" aria-haspopup="true" aria-expanded="false">Filter<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                        <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                    </svg>
                </button>
                <button class="button" type="button" aria-haspopup="true" aria-expanded="false">Sort by<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false" aria-hidden="true">
                        <path d="M12 15.375L6 9.37498L7.4 7.97498L12 12.575L16.6 7.97498L18 9.37498L12 15.375Z" />
                    </svg>
                </button>
            </div>
        </section>
        <section class="cards-layout games">
            <?php foreach ($games as $game) {
                getGameArticle($game);
            } ?>
        </section>
    </div>
</main>
<?php getFooter(); ?>