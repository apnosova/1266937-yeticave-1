<?php

/**
 * @var mysqli $db
 * @var array $user
 * @var array $pagination
 */

require_once __DIR__ . '/init.php';

$categories = getCategories($db);
$lots = [];

$search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));

$pageItems = 9;
$lotsCount = 0;
$pagesCount = 1;

if ($search !== '') {
    $lotsCount = getItemsCount($db, $search);

    require_once 'pagination.php';

    $lots = getLotsViaSearch($db, $search, $pageItems, $offset);
}



$pageContent = includeTemplate(
    'search.php',
    [
        'categories' => $categories,
        'search' => $search,
        'lots' => $lots,
        'pagination' => $pagination
    ]
);

$layoutContent = includeTemplate(
    'layout.php',
    [
        'content' => $pageContent,
        'categories' => $categories,
        'user' => $user,
        'title' => 'Результаты поиска по запросу: ' . $search
    ]
);

print ($layoutContent);
