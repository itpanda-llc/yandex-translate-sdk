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
 * Class URL URLы web-запросов
 * @package Panda\Yandex\TranslateSDK
 */
class URL
{
    /**
     * Получение IAM-токена
     */
    public const IAM_TOKEN = 'https://iam.api.cloud.yandex.net/iam/v1/tokens';

    /**
     * Определение языка текста
     */
    public const DETECT = 'https://translate.api.cloud.yandex.net/translate/v2/detect';

    /**
     * Поддерживаемые языки
     */
    public const LANGUAGE = 'https://translate.api.cloud.yandex.net/translate/v2/languages';

    /**
     * Перевод текста
     */
    public const TRANSLATE = 'https://translate.api.cloud.yandex.net/translate/v2/translate';
}
