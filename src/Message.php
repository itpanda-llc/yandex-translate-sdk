<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class Message
 * @package Panda\Yandex\TranslateSDK
 * Сообщения исключений
 */
class Message
{
    /**
     * Ошибка длины значения параметра(ов)
     */
    public const LENGTH_ERROR = 'Превышена длина значения параметра(ов)';

    /**
     * Ошибка количества значений параметра(ов)
     */
    public const COUNT_ERROR = 'Превышено количество значений параметра(ов)';
}
