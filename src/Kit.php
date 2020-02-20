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
 * Class Kit Комплект
 * @package Panda\Yandex\TranslateSDK
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
     * @return string URL web-запроса
     */
    abstract public function getURL(): string;
}
