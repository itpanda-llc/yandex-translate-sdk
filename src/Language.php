<?php

/**
 * Этот файл является частью репозитория
 * Panda/Yandex/TranslateSDK.
 *
 * Для получения полной информации об авторских правах
 * и лицензии, пожалуйста, просмотрите файл LICENSE,
 * который был распространен с этим исходным кодом.
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class Language Поддерживаемые языки
 * @package Panda\Yandex\TranslateSDK
 */
class Language extends Kit implements Task
{
    /**
     * @return string URL web-запроса
     */
    public function getURL(): string
    {
        return URL::LANGUAGE;
    }
}
