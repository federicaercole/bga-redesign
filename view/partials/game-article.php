<article>
    <h2><?= $game["title"] ?></h2>
    <?php if ($game["premium"]) : ?>
        <span class="premium">Premium</span>
    <?php endif ?>
    <img src="<?= $siteUri ?>assets/images/<?= $game["cover-image"] ?>" alt="">
    <div class="info">
        <div><svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" aria-label="Number of players">
                <path d="M5 5.5C4.3125 5.5 3.72396 5.25521 3.23438 4.76562C2.74479 4.27604 2.5 3.6875 2.5 3C2.5 2.3125 2.74479 1.72396 3.23438 1.23438C3.72396 0.744792 4.3125 0.5 5 0.5C5.6875 0.5 6.27604 0.744792 6.76562 1.23438C7.25521 1.72396 7.5 2.3125 7.5 3C7.5 3.6875 7.25521 4.27604 6.76562 4.76562C6.27604 5.25521 5.6875 5.5 5 5.5ZM0 10.5V8.75C0 8.39583 0.0911458 8.07031 0.273438 7.77344C0.455729 7.47656 0.697917 7.25 1 7.09375C1.64583 6.77083 2.30208 6.52865 2.96875 6.36719C3.63542 6.20573 4.3125 6.125 5 6.125C5.6875 6.125 6.36458 6.20573 7.03125 6.36719C7.69792 6.52865 8.35417 6.77083 9 7.09375C9.30208 7.25 9.54427 7.47656 9.72656 7.77344C9.90885 8.07031 10 8.39583 10 8.75V10.5H0Z" />
            </svg><?= $game["min_players"] ?>
            <?php if ($game["max_players"]) : ?>
                - <?= $game["max_players"] ?>
            <?php endif ?>
        </div>
        <div><svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" aria-label="Playing time">
                <path d="M6.65 7.85L7.35 7.15L5.5 5.3V3H4.5V5.7L6.65 7.85ZM5 10.5C4.30833 10.5 3.65833 10.3687 3.05 10.1062C2.44167 9.84375 1.9125 9.4875 1.4625 9.0375C1.0125 8.5875 0.65625 8.05833 0.39375 7.45C0.13125 6.84167 0 6.19167 0 5.5C0 4.80833 0.13125 4.15833 0.39375 3.55C0.65625 2.94167 1.0125 2.4125 1.4625 1.9625C1.9125 1.5125 2.44167 1.15625 3.05 0.89375C3.65833 0.63125 4.30833 0.5 5 0.5C5.69167 0.5 6.34167 0.63125 6.95 0.89375C7.55833 1.15625 8.0875 1.5125 8.5375 1.9625C8.9875 2.4125 9.34375 2.94167 9.60625 3.55C9.86875 4.15833 10 4.80833 10 5.5C10 6.19167 9.86875 6.84167 9.60625 7.45C9.34375 8.05833 8.9875 8.5875 8.5375 9.0375C8.0875 9.4875 7.55833 9.84375 6.95 10.1062C6.34167 10.3687 5.69167 10.5 5 10.5Z" />
            </svg><?= $game["time"] ?> min</div>
        <div class="<?= strtolower($game["complexity"]) ?>"><svg viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg" aria-label="Complexity">
                <path d="M0 6.07693C0 5.54564 0.430769 5.11539 0.961539 5.11539H1.34615C1.87744 5.11539 2.30769 5.54616 2.30769 6.07693V9.53846C2.30769 10.0692 1.87692 10.5 1.34615 10.5H0.961539C0.706523 10.5 0.461952 10.3987 0.281628 10.2184C0.101305 10.0381 0 9.79348 0 9.53846V6.07693Z" />
                <path d="M3.46155 3.76922C3.46155 3.23793 3.89232 2.80768 4.42309 2.80768H4.8077C5.33898 2.80768 5.76924 3.23845 5.76924 3.76922V9.53845C5.76924 10.0692 5.33847 10.5 4.8077 10.5H4.42309C4.16807 10.5 3.9235 10.3987 3.74318 10.2184C3.56285 10.038 3.46155 9.79346 3.46155 9.53845V3.76922Z" />
                <path d="M7.88463 0.5C7.35386 0.5 6.9231 0.930769 6.9231 1.46154V9.53846C6.9231 10.0692 7.35386 10.5 7.88463 10.5H8.26925C8.80002 10.5 9.23079 10.0692 9.23079 9.53846V1.46154C9.23079 0.930256 8.80002 0.5 8.26925 0.5H7.88463Z" />
            </svg>
            <?= $game["complexity"] ?></div>
    </div>
</article>