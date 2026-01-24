<?php

/**
 * @var int $isAuth
 * @var string $userName
 * @var mysqli $db
 */

require_once __DIR__ . '/init.php';

$categories = getCategories($db);
$lots = getLots($db);

$pageContent = includeTemplate(
    'main.php',
    [
        'categories' => $categories,
        'lots' => $lots
    ]
);

$layoutContent = includeTemplate(
    'layout.php',
    [
        'content' => $pageContent,
        'categories' => $categories,
        'isAuth' => $isAuth,
        'userName' => $userName,
        'title' => 'YetiCave - Главная страница'
    ]
);

print ($layoutContent);
