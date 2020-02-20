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
 * Class Detect Определение языка текста
 * @package Panda\Yandex\TranslateSDK
 */
class Detect extends Kit implements Task
{
    /**
     * Наименования параметра "Текст"
     */
    private const TEXT = 'text';

    /**
     * Наименование параметра "Коды языка"
     */
    private const HINT_CODE = 'languageCodeHints';

    /**
     * Detect constructor.
     * @param string $text Текст для определения языка
     */
    public function __construct(string $text)
    {
        if (strlen($text) > Limit::DETECT_TEXT_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $this->task[self::TEXT] = $text;
    }

    /**
     * @param string $hintCode Код языка, подсказка для определения языка текста
     * @return Detect
     */
    public function addHint(string $hintCode): Detect
    {
        if (strlen($hintCode) > Limit::LANGUAGE_CODE_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $hintCodeCount = 0;

        if (isset($this->task[self::HINT_CODE])) {
            $hintCodeCount = count($this->task[self::HINT_CODE]);
        }

        if (++$hintCodeCount > Limit::LANGUAGE_CODE_HINTS_COUNT) {
            throw new ClientException(Message::COUNT_ERROR);
        }

        $this->task[self::HINT_CODE][] = $hintCode;

        $this->task[self::HINT_CODE] =
            array_unique($this->task[self::HINT_CODE]);

        return $this;
    }

    /**
     * @return string URL web-запроса
     */
    public function getURL(): string
    {
        return URL::DETECT;
    }
}
