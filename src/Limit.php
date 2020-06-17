<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class Limit
 * @package Panda\Yandex\TranslateSDK
 * Ограничения длины и(или) количества значений параметров
 */
class Limit
{
    /**
     * Длина параметра "ID каталога"
     */
    public const FOLDER_ID_LENGTH = 50;

    /**
     * Длина параметра "Текст для определения языка"
     */
    public const DETECT_TEXT_LENGTH = 1000;

    /**
     * Количество параметров "Код языка"
     */
    public const LANGUAGE_CODE_HINTS_COUNT = 10;

    /**
     * Длина параметра "Код языка"
     */
    public const LANGUAGE_CODE_LENGTH = 3;

    /**
     * Длина параметра "Тексты для перевода"
     */
    public const TRANSLATE_TEXTS_LENGTH = 10000;

    /**
     * Длина параметров "Тексты глоссария"
     */
    public const GLOSSARY_PAIRS_TEXT_LENGTH = 10000;

    /**
     * Количество параметров "Пара глоссария"
     */
    public const GLOSSARY_PAIRS_COUNT = 50;
}
