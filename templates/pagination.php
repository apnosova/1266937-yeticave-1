<?php

/**
 * @var array pagination
 */

?>

<?php if ($pagesCount > 1): ?>
    <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev">
            <?php if ($prevPage): ?>
                <a href="?<?= $urlQuery ?>page=<?= $prevPage ?>">Назад</a>
            <?php endif; ?>
        </li>

        <?php foreach ($pages as $page): ?>
            <li class="pagination-item <?php if ($page === $currentPage): ?>pagination-item-active<?php endif; ?>">
                <a href="?<?= $urlQuery ?>page=<?= $page ?>"><?= $page ?></a>
            </li>
        <?php endforeach; ?>

        <li class="pagination-item pagination-item-next">
            <?php if ($nextPage): ?>
                <a href="?<?= $urlQuery ?>page=<?= $nextPage ?>">Вперед</a>
            <?php endif; ?>
        </li>
    </ul>
<?php endif; ?>
