<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Url
 * @package Panda\Yandex\TranslateSdk
 * URL-адреса
 */
class Url
{
    /**
     * Получение IAM-токена для аккаунта на Яндексе
     * @link https://cloud.yandex.ru/docs/iam/operations/iam-token/create
     */
    public const TOKENS = 'https://iam.api.cloud.yandex.net/iam/v1/tokens';

    /**
     * Определение языка текста
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/detectLanguage
     */
    public const DETECT = 'https://translate.api.cloud.yandex.net/translate/v2/detect';

    /**
     * Получение списка поддерживаемых языков
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/listLanguages
     */
    public const LANGUAGES = 'https://translate.api.cloud.yandex.net/translate/v2/languages';

    /**
     * Перевод текста
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const TRANSLATE = 'https://translate.api.cloud.yandex.net/translate/v2/translate';
}
