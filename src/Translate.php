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

use Panda\Yandex\TranslateSDK\Exception\ClientException;

/**
 * Class Translate Перевод текста
 * @package Panda\Yandex\TranslateSDK
 */
class Translate extends Kit implements Task
{
    /**
     * Наименования параметра "Тексты"
     */
    private const TEXTS = 'texts';

    /**
     * Наименования параметра "Код языа исходного текста"
     */
    private const SOURCE_LANG_CODE = 'sourceLanguageCode';

    /**
     * Наименования параметра "Код языка, на который переводится текст"
     */
    private const TARGET_LANG_CODE = 'targetLanguageCode';

    /**
     * Наименования параметра "Формат"
     */
    private const FORMAT = 'format';

    /**
     * Наименования параметра "Конфигурация глоссария"
     */
    private const GLOSS_CONFIG = 'glossaryConfig';

    /**
     * Наименования параметра "Содержание глоссария"
     */
    private const GLOSS_DATA = 'glossaryData';

    /**
     * Наименования параметра "Пары глоссария"
     */
    private const GLOSS_PAIRS = 'glossaryPairs';

    /**
     * Наименования параметра "Текст на языке оригинала (глоссарий)"
     */
    private const GLOSS_PAIRS_SOURCE_TEXT = 'sourceText';

    /**
     * Наименования параметра "Текст, на языке, на который переводится текст (глоссарий)"
     */
    private const GLOSS_PAIRS_TARGET_TEXT = 'translatedText';

    /**
     * Translate constructor.
     * @param string $text Текст
     */
    public function __construct(string $text)
    {
        $this->addText($text);
    }

    /**
     * @param string $text Текст для перевода
     * @return Translate
     */
    public function addText(string $text): Translate
    {
        $textLength = strlen($text);

        if (isset($this->task[self::TEXTS])) {
            foreach ($this->task[self::TEXTS] as $v) {
                $textLength += strlen($v);
            }
        }

        if ($textLength > Limit::TRANSLATE_TEXTS_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $this->task[self::TEXTS][] = $text;

        return $this;
    }

    /**
     * @param string $langCode Код языка исходного текста
     * @return Translate
     */
    public function setSourceLang(string $langCode): Translate
    {
        if (strlen($langCode) > Limit::LANGUAGE_CODE_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $this->task[self::SOURCE_LANG_CODE] = $langCode;

        return $this;
    }

    /**
     * @param string $langCode Код языка, на который переводится текст
     * @return Translate
     */
    public function setTargetLang(string $langCode): Translate
    {
        if (strlen($langCode) > Limit::LANGUAGE_CODE_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $this->task[self::TARGET_LANG_CODE] = $langCode;

        return $this;
    }

    /**
     * @param string $format Формат текста
     * @return Translate
     */
    public function setFormat(string $format): Translate
    {
        $this->task[self::FORMAT] = $format;

        return $this;
    }

    /**
     * @param string $sourceText Текст на языке оригинала (Глоссарий)
     * @param string $targetText Текст на языке перевода (Глоссарий)
     * @return Translate
     */
    public function addGlossary(string $sourceText,
                                string $targetText): Translate
    {
        $pairsCount = 0;

        $sourceTextLength = strlen($sourceText);
        $targetTextLength = strlen($targetText);

        $pairs = $this->task[self::GLOSS_CONFIG]
            [self::GLOSS_DATA][self::GLOSS_PAIRS] ?? [];

        if (!empty($pairs)) {
            $pairsCount = count($pairs);

            if (++$pairsCount > Limit::GLOSSARY_PAIRS_COUNT) {
                throw new ClientException(Message::COUNT_ERROR);
            }

            foreach ($pairs as $v) {
                $sourceTextLength +=
                    strlen($v[self::GLOSS_PAIRS_SOURCE_TEXT]);
                $targetTextLength +=
                    strlen($v[self::GLOSS_PAIRS_TARGET_TEXT]);
            }
        }

        if (($sourceTextLength > Limit::GLOSSARY_PAIRS_TEXT_LENGTH)
            || ($targetTextLength > Limit::GLOSSARY_PAIRS_TEXT_LENGTH))
        {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $pair = [self::GLOSS_PAIRS_SOURCE_TEXT => $sourceText,
            self::GLOSS_PAIRS_TARGET_TEXT => $targetText];

        $this->task[self::GLOSS_CONFIG]
            [self::GLOSS_DATA][self::GLOSS_PAIRS][] = $pair;

        return $this;
    }

    /**
     * @return string URL web-запроса
     */
    public function getURL(): string
    {
        return URL::TRANSLATE;
    }
}
