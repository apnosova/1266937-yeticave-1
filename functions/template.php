<?php

/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function includeTemplate(string $name, array $data = []): string
{
    $name = 'templates/' . $name;
    $result = 'Ошибка загрузки шаблона';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    return ob_get_clean();
}

/**
 * Показывает страницу ошибки
 * @param int $code Код ошибки
 * @param string $message Сообщение с описанием ошибки
 * @param array $user Данные пользователя
 * @param array $categories Список категорий
 * @return void
 */
function showErrorPage(int $code, string $message, ?array $user, array $categories): void
{
    $mainContent = includeTemplate(
        'error.php',
        [
            'message' => $message,
            'code' => $code,
        ]
    );

    $layoutContent = includeTemplate(
        'layout.php',
        [
            'code' => $code,
            'content' => $mainContent,
            'user' => $user,
            'categories' => $categories,
        ]
    );

    http_response_code($code);

    print ($layoutContent);

    exit();
}
