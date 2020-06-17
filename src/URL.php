<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class URL
 * @package Panda\Yandex\TranslateSDK
 * URL-адреса web-запросов
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
