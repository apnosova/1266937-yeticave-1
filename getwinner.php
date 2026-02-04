<?php
/**
 * @var mysqli $db
 */

$expiredLots = getExpiredLots($db);

foreach ($expiredLots as $lot) {
    if (!empty($lot['user_id'])) {
        setWinner($db, $lot['user_id'], $lot['id']);
    }
}
