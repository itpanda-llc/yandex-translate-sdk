<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class Language
 * @package Panda\Yandex\TranslateSDK
 * Поддерживаемые языки
 */
class Language extends Kit implements Task
{
    /**
     * @return string URL-адрес web-запроса
     */
    public function getURL(): string
    {
        return URL::LANGUAGE;
    }
}
