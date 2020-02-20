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
 * Class Request Web-запрос
 * @package Panda\Yandex\TranslateSDK
 */
class Request
{
    /**
     * @param string $url URL web-запроса
     * @param string $data Параметры web-запроса
     * @param array|null $headers Заголовки web-запроса
     * @return string Результат web-запроса
     */
    protected function send(string $url,
                            string $data,
                            array $headers = null): string
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        if (!is_null($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);

        if ($response === false) {
            throw new ClientException(sprintf('%s. Ошибка: %s',
                Message::REQUEST_ERROR,
                curl_error($ch)));
        }

        curl_close($ch);

        return $response;
    }
}
