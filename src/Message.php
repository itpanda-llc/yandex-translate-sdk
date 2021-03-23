<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Text
 * @package Panda\Yandex\TranslateSdk
 * Сообщения исключений
 */
class Message
{
    /**
     * Ошибка длины параметра(ов)
     */
    public const LENGTH_ERROR = 'Превышена длина параметра(ов)';

    /**
     * Ошибка количества параметра(ов)
     */
    public const COUNT_ERROR = 'Превышено количество параметра(ов)';
}
