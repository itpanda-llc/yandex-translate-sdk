<?php

/**
 * Файл из репозитория Yandex-Translate-PHP-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-php-sdk
 */

declare(strict_types=1);

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Kit
 * @package Panda\Yandex\TranslateSdk
 * Задача / Запрос
 */
abstract class Task
{
    /**
     * @var string[] Заголовки web-запроса
     */
    public $headers = ['Content-Type: application/json'];

    /**
     * @var array Параметры задачи/запроса
     */
    protected $task = [];

    /**
     * @param array $param Параметры задачи/запроса
     */
    public function addParam(array $param): void
    {
        $this->task += $param;
    }

    /**
     * @return string URL-адрес
     */
    abstract public function getUrl(): string;

    /**
     * @return string|null Параметры задачи/запроса
     */
    public function getParam(): ?string
    {
        return ($this->task !== [])
            ? json_encode($this->task)
            : null;
    }
}
