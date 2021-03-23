<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

declare(strict_types=1);

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Translate
 * @package Panda\Yandex\TranslateSdk
 * Перевод текста
 */
class Translate extends Task
{
    /**
     * Наименования параметра "Язык, на котором написан исходный текст"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const SOURCE_LANGUAGE_CODE = 'sourceLanguageCode';

    /**
     * Наименования параметра "Язык, на который переводится текст"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const TARGET_LANGUAGE_CODE = 'targetLanguageCode';

    /**
     * Наименования параметра "Формат текста"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const FORMAT = 'format';

    /**
     * Наименования параметра "Массив строк для перевода"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const TEXTS = 'texts';

    /**
     * Наименования параметра "Глоссарий"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const GLOSSARY_CONFIG = 'glossaryConfig';

    /**
     * Наименования параметра "Содержимое глоссария"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const GLOSSARY_DATA = 'glossaryData';

    /**
     * Наименования параметра "Массив текстовых пар"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const GLOSSARY_PAIRS = 'glossaryPairs';

    /**
     * Наименования параметра "Текст на языке оригинала"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const SOURCE_TEXT = 'sourceText';

    /**
     * Наименования параметра "Текст на языке перевода"
     * @link https://cloud.yandex.ru/docs/translate/api-ref/Translation/translate
     */
    private const TRANSLATED_TEXT = 'translatedText';

    /**
     * Translate constructor.
     * @param string|null $text Строка для перевода
     * @param string|null $targetLang Язык, на который переводится текст
     */
    public function __construct(string $text = null,
                                string $targetLang = null)
    {
        if (!is_null($text)) $this->addText($text);
        if (!is_null($targetLang)) $this->setTargetLang($targetLang);
    }

    /**
     * @return string URL-адрес
     */
    public function getUrl(): string
    {
        return Url::TRANSLATE;
    }

    /**
     * @param string $langCode Язык, на котором написан исходный текст
     * @return $this
     */
    public function setSourceLang(string $langCode): self
    {
        if (mb_strlen($langCode) > Limit::LANGUAGE_CODE_LENGTH)
            throw new Exception\ClientException(Message::LENGTH_ERROR);

        $this->task[self::SOURCE_LANGUAGE_CODE] = $langCode;

        return $this;
    }

    /**
     * @param string $langCode Язык, на который переводится текст
     * @return $this
     */
    public function setTargetLang(string $langCode): self
    {
        if (mb_strlen($langCode) > Limit::LANGUAGE_CODE_LENGTH)
            throw new Exception\ClientException(Message::LENGTH_ERROR);

        $this->task[self::TARGET_LANGUAGE_CODE] = $langCode;

        return $this;
    }

    /**
     * @param string $format Формат текста
     * @return $this
     */
    public function setFormat(string $format): self
    {
        $this->task[self::FORMAT] = $format;

        return $this;
    }

    /**
     * @param string $text Строка для перевода
     * @return $this
     */
    public function addText(string $text): self
    {
        $textLength = mb_strlen($text);

        if (isset($this->task[self::TEXTS]))
            foreach ($this->task[self::TEXTS] as $v)
                $textLength += mb_strlen($v);

        if ($textLength > Limit::TRANSLATE_TEXTS_LENGTH)
            throw new Exception\ClientException(Message::LENGTH_ERROR);

        $this->task[self::TEXTS][] = $text;

        return $this;
    }

    /**
     * @param string $sourceText Текст на языке оригинала
     * @param string $translatedText Текст на языке перевода
     * @return $this
     */
    public function addGlossary(string $sourceText,
                                string $translatedText): self
    {
        $sourceTextLength = mb_strlen($sourceText);
        $translatedTextLength = mb_strlen($translatedText);

        $glossaryPairs = $this->task[self::GLOSSARY_CONFIG]
            [self::GLOSSARY_DATA][self::GLOSSARY_PAIRS] ?? [];

        if (!empty($glossaryPairs)) {
            $glossaryPairsCount = count($glossaryPairs);

            if (++$glossaryPairsCount > Limit::GLOSSARY_PAIRS_COUNT)
                throw new Exception\ClientException(Message::COUNT_ERROR);

            foreach ($glossaryPairs as $v) {
                $sourceTextLength +=
                    mb_strlen($v[self::SOURCE_TEXT]);
                $translatedTextLength +=
                    mb_strlen($v[self::TRANSLATED_TEXT]);
            }
        }

        if (($sourceTextLength > Limit::GLOSSARY_PAIRS_TEXT_LENGTH)
            || ($translatedTextLength > Limit::GLOSSARY_PAIRS_TEXT_LENGTH))
            throw new Exception\ClientException(Message::LENGTH_ERROR);

        $this->task[self::GLOSSARY_CONFIG]
            [self::GLOSSARY_DATA][self::GLOSSARY_PAIRS][] = [
                self::SOURCE_TEXT => $sourceText,
                self::TRANSLATED_TEXT => $translatedText
        ];

        return $this;
    }
}
