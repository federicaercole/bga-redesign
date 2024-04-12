    <header>
        <div class="wrapper">
            <div class="logo-container">
                <a href="/">BGA</a>
                <button type="button" id="menu" aria-expanded="false" aria-haspopup="true" aria-controls="main-nav">
                    <?= getIconMarkup("open-menu") ?>
                    <span class="visually-hidden">Open menu</span>
                </button>
            </div>
            <nav class="navigation" id="main-nav">
                <ul>
                    <li><a href="/games/">Games</a></li>
                    <li><a href="/news/">News</a></li>
                    <li><a href="/community/">Community</a></li>
                    <li><a href="/pricing/">Pricing</a></li>
                </ul>
                <div class="buttons">
                    <a class="button secondary" href="/login/">Log in</a>
                    <a class="button primary" href="/register/">Register</a>
                </div>
            </nav>
        </div>
    </header>