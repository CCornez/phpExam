<?php
require_once './includes/functions.inc.php';

/**
 * soort
 */

// add 1 view to that soort
patchSoort($_GET['id']);

// get this soort (with updated views)
$soort = getSoort($_GET['id']);

/**
 * wiki api
 */

// make api call with base url and params
$baseUrl = 'https://nl.wikipedia.org/w/api.php?';
$params = [
    'action' => 'query',
    'list' => 'search',
    'srsearch' => $soort->name,
    'format' => 'json'
];

$wikiArticles = getApi($baseUrl . http_build_query($params))->query->search;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail <?= $soort->name ?></title>

</head>

<body>
    <main>
        <h1><?= $soort->name ?> <span>(<?= $soort->category ?>)</span></h1>
        <h3>Number of views: <?= $soort->views ?></h3>
    </main>
    <section>
        <h1>Wikipedia search results:</h1>

        <!-- create an article for each Wikipedia link -->
        <?php foreach ($wikiArticles as $wikiArticle) { ?>

            <article>
                <h1><?= $wikiArticle->title ?></h1>
                <p><?= $wikiArticle->snippet ?></p>
            </article>

        <?php } ?>

    </section>
</body>

</html>

<style>
    span {
        font-size: 20px;
    }

    section {
        margin-top: 5rem;
    }

    article {
        border: 1px solid black;
    }
</style>