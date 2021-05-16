<?php

/**
 * Файл из репозитория Yandex-Translate-SDK
 * @link https://github.com/itpanda-llc/yandex-translate-sdk
 */

declare(strict_types=1);

namespace Panda\Yandex\TranslateSdk;

/**
 * Class Languages
 * @package Panda\Yandex\TranslateSdk
 * Получение списка поддерживаемых языков
 */
class Languages extends Task
{
    /**
     * @return string URL-адрес
     */
    public function getUrl(): string
    {
        return Url::LANGUAGES;
    }
}
