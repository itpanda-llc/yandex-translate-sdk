<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Interface Task
 * @package Panda\Yandex\TranslateSDK
 * Задача
 */
interface Task
{
    /**
     * @param array $param Параметры задачи
     */
    public function addParam(array $param): void;

    /**
     * @return string Параметры задачи
     */
    public function getParam(): string;

    /**
     * @return string URL-адрес web-запроса
     */
    public function getURL(): string;
}
