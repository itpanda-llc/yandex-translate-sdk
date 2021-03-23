<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Limit
 * @package Panda\Yandex\TranslateSdk
 * Ограничения длины/размера и/или количества параметров
 */
class Limit
{
    /**
     * Длина параметра "Идентификатор каталога"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/detectLanguage
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/listLanguages
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const FOLDER_ID_LENGTH = 50;

    /**
     * Длина параметра "Текст, язык которого требуется определить"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/detectLanguage
     */
    public const DETECT_TEXT_LENGTH = 1000;

    /**
     * Количество параметров "Наиболее вероятный язык"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/detectLanguage
     */
    public const LANGUAGE_CODE_HINTS_COUNT = 10;

    /**
     * Длина параметра "Наиболее вероятный язык"
     * Длина параметра "Язык, на котором написан исходный текст"
     * Длина параметра "Язык, на который переводится текст"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/detectLanguage
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const LANGUAGE_CODE_LENGTH = 3;

    /**
     * Длина параметра "Массив строк для перевода"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const TRANSLATE_TEXTS_LENGTH = 10000;

    /**
     * Длина параметра "Текст на языке оригинала"
     * Длина параметра "Текст на языке перевода"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const GLOSSARY_PAIRS_TEXT_LENGTH = 10000;

    /**
     * Количество параметров "Массив текстовых пар"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    public const GLOSSARY_PAIRS_COUNT = 50;
}
