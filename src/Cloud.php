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
 * Class Cloud Аутентификация в облаке и выполнение задачи
 * @package Panda\Yandex\TranslateSDK
 */
class Cloud extends Request
{
    /**
     * Наименование параметра "OAUTH-токен"
     */
    private const OAUTH_TOKEN = 'yandexPassportOauthToken';

    /**
     * Наименование параметра "ID каталога"
     */
    private const FOLDER_ID = 'folderId';

    /**
     * @var array Заголовки web-запроса
     */
    private $headers = [];

    /**
     * @var array Параметры задачи
     */
    private $task = [];

    /**
     * Cloud constructor.
     * @param string $oAuthToken OAUTH-токен
     * @param string $folderId ID каталога
     */
    public function __construct(string $oAuthToken, string $folderId)
    {
        if (strlen($folderId) > Limit::FOLDER_ID_LENGTH) {
            throw new ClientException(Message::LENGTH_ERROR);
        }

        $iamToken = $this->getIAMToken($oAuthToken);
        $this->setAuthHeaders($iamToken);

        $this->task[self::FOLDER_ID] = $folderId;
    }

    /**
     * @param string $oAuthToken OAUTH-токен
     * @return string IAM-токен
     */
    private function getIAMToken(string $oAuthToken): string
    {
        $response = parent::send(URL::IAM_TOKEN,
            json_encode([self::OAUTH_TOKEN => $oAuthToken]));

        return json_decode($response, true)['iamToken'];
    }

    /**
     * @param string $iamToken IAM-токен
     */
    private function setAuthHeaders(string $iamToken): void
    {
        $this->headers[] = sprintf('Authorization: Bearer %s',
            $iamToken);
    }

    /**
     * @param string $text Текст для определения языка
     * @return string Результат web-запроса
     */
    public function getLanguage(string $text): string
    {
        $detect = new Detect($text);

        return $this->request($detect);
    }

    /**
     * @return string Результат web-запроса
     */
    public function getLanguageList(): string
    {
        $language = new Language;

        return $this->request($language);
    }

    /**
     * @param Task $task Параметры задачи
     * @return string Результат web-запроса
     */
    public function request(Task $task): string
    {
        $task->addParam($this->task);

        return parent::send($task->getURL(),
            $task->getParam(),
            $this->headers);
    }
}
