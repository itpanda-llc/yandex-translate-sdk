# Yandex-Translate-PHP-SDK

Библиотека для интеграции с сервисом машинного перевода ["Yandex Translate"](https://cloud.yandex.ru/services/translate)

[![Packagist Downloads](https://img.shields.io/packagist/dt/itpanda-llc/yandex-translate-sdk)](https://packagist.org/packages/itpanda-llc/yandex-translate-sdk/stats)
![Packagist License](https://img.shields.io/packagist/l/itpanda-llc/yandex-translate-sdk)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/itpanda-llc/yandex-translate-sdk)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте (Yandex Cloud)](https://cloud.yandex.ru)
* [О проекте (Yandex Identity and Access Management)](https://cloud.yandex.ru/services/iam/)
* [О проекте (Yandex Translate)](https://cloud.yandex.ru/services/translate)
* [Документация (Yandex Cloud)](https://cloud.yandex.ru/docs)
* [Документация (Yandex Identity and Access Management)](https://cloud.yandex.ru/docs/iam/)
* [Документация (Yandex Translate)](https://cloud.yandex.ru/docs/translate/)

## Возможности

* Аутентификация в API ["Yandex Cloud"](https://cloud.yandex.ru)
* Определение языка текста
* Получение списка поддерживаемых языков
* Перевод текста

## Требования

* PHP >= 7.2
* cURL
* JSON
* mbstring

## Установка

```shell script
composer require itpanda-llc/yandex-translate-sdk
```

## Подключение

```php
require_once 'vendor/autoload.php';
```

## Использование

### Создание сервиса / Аутентификация

* С аккаунтом на Яндексе (OAuth-токен)

```php
use Panda\Yandex\TranslateSdk;

try {
    /*
     * OAuth-токен
     * ID каталога
     */
    $cloud = new TranslateSdk\Cloud('oAuthToken', 'folderId');
} catch (TranslateSdk\Exception\ClientException | TypeError $e) {
    echo $e->getMessage();
}
```

* С использованием сервисного аккаунта / федеративного пользователя (IAM-токен)

```php
use Panda\Yandex\TranslateSdk;

try {
    // IAM-токен
    $cloud = new TranslateSdk\Cloud('iamToken');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

* С использованием сервисного аккаунта (API-ключ)

```php
use Panda\Yandex\TranslateSdk;

try {
    // API-ключ
    $cloud = TranslateSdk\Cloud::createApi('apiKey');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Определение языка текста

* Создание запроса

```php
use Panda\Yandex\TranslateSdk;

try {
    // Текст, язык которого требуется определить
    $detect = new TranslateSdk\Detect('Привет, разработчик!');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

* Установка параметров

```php
use Panda\Yandex\TranslateSdk;

try {
    // Текст, язык которого требуется определить
    $detect->setText('Привет, разработчик!')

        // Наиболее вероятный язык
        ->addHint('ru')
        ->addHint('uk')
        ->addHint('be');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

* Выполнение запроса

```php
use Panda\Yandex\TranslateSdk;

try {
    print_r($cloud->request($detect));
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Получение списка поддерживаемых языков

```php
use Panda\Yandex\TranslateSdk;

try {
    print_r($cloud->request(new TranslateSdk\Languages));
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

### Перевод текста

* Создание запроса

```php
use Panda\Yandex\TranslateSdk;

try {
    /*
     * Строка для перевода
     * Язык, на который переводится текст
     */
    $translate = new TranslateSdk\Translate('Привет, разработчик!', 'en');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

* Установка параметров

```php
use Panda\Yandex\TranslateSdk;

try {
    // Язык, на котором написан исходный текст
    $translate->setSourceLang('ru')

        // Язык, на который переводится текст
        ->setTargetLang('en');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}

// Формат текста
$translate->setFormat(TranslateSdk\Format::PLAIN_TEXT);

try {
    // Строка для перевода
    $translate->addText('Сейчас ты увидишь, как работает перевод текста!')
        ->addText('Это удивительно!')
        ->addText('Технологии не стоят на месте..')

        /*
         * Текст на языке оригинала
         * Текст на языке перевода
         */
        ->addGlossary('текста', 'greeting text')
        ->addGlossary('удивительно', 'super')
        ->addGlossary('технологии', 'services');
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```

* Выполнение запроса

```php
use Panda\Yandex\TranslateSdk;

try {
    print_r($cloud->request($translate));
} catch (TranslateSdk\Exception\ClientException $e) {
    echo $e->getMessage();
}
```
