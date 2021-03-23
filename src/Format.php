<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Format
 * @package Panda\Yandex\TranslateSdk
 * Формат текста
 */
class Format
{
    /**
     * Текст без разметки (По умолчанию)
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const PLAIN_TEXT = 'PLAIN_TEXT';

    /**
     * Текст в формате HTML
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const HTML = 'HTML';
}
