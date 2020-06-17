<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc
 */

namespace Panda\Yandex\TranslateSDK;

/**
 * Class Kit
 * @package Panda\Yandex\TranslateSDK
 * Комплект
 */
abstract class Kit implements Task
{
    /**
     * @var array Параметры задачи
     */
    protected $task = [];

    /**
     * @param array $param Параметры задачи
     */
    public function addParam(array $param): void
    {
        $this->task = array_merge($this->task, $param);
    }

    /**
     * @return string Параметры задачи
     */
    public function getParam(): string
    {
        return json_encode($this->task);
    }

    /**
     * @return string URL-адрес web-запроса
     */
    abstract public function getURL(): string;
}
