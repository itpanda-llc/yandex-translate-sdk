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
 * Class Message Сообщения исключений
 * @package Panda\Yandex\TranslateSDK
 */
class Message
{
    /**
     * Ошибка длины значения параметра(ов)
     */
    public const LENGTH_ERROR = 'Превышена длина значения параметра(ов)';

    /**
     * Ошибка количества значений параметра(ов)
     */
    public const COUNT_ERROR = 'Превышено количество значений параметра(ов)';

    /**
     * Ошибка выполнения web-запроса
     */
    public const REQUEST_ERROR = 'Web-запрос не выполнен';
}
