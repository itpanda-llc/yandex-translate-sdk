# Yandex-Translate-PHP-SDK

Библиотека для интеграции с сервисом машинного перевода ["Yandex Translate"](https://cloud.yandex.ru/services/translate)

[![GitHub license](https://img.shields.io/badge/license-MIT-blue)](LICENSE)

## Ссылки

* [Разработка](https://github.com/itpanda-llc)
* [О проекте](https://cloud.yandex.ru/services/translate)
* [Документация](https://cloud.yandex.ru/docs/translate)

## Возможности

* Формирование параметров перевода текста (добавление текстов, исходного языка и языка, на который переводится текст, глоссариев, формата текста)
* Формирование параметров определения языка текста (добавление текста и предполагаемых языков)
* Аутентификация в HTTP API-сервисе ["Яндекс.Облако"](https://cloud.yandex.ru) с помощью пользовательского аккаунта
* Перевод текста, определение и получение списка поддерживаемых языков с помощью сервиса ["Yandex Translate"](https://cloud.yandex.ru/services/translate)

## Требования

* PHP >= 7.2
* JSON
* cURL

## Установка

```shell script
php composer.phar "require itpanda-llc/yandex-translate-php-sdk"
```

или

```shell script
git clone https://github.com/itpanda-llc/yandex-translate-php-sdk
```

## Примеры использования

Подключение

```php
require_once 'vendor/autoload.php';
```

или

```php
require_once 'yandex-translate-php-sdk/autoload.php';
```

Импорт

```php
use Panda\Yandex\TranslateSDK\Cloud;
use Panda\Yandex\TranslateSDK\Translate;
use Panda\Yandex\TranslateSDK\Detect;
use Panda\Yandex\TranslateSDK\Language;
use Panda\Yandex\TranslateSDK\Format;
use Panda\Yandex\TranslateSDK\Exception\ClientException;
```

### Создание сервиса и аутентификация

```php
try {
    // Обязательные параметры: "OAUTH-токен", "ID каталога"
    $cloud = new Cloud('AgAAAAASeN6XAATuwduwAAZFyUEYsEW1gGjh56d', 'b1g89h70fg5jgg8e1j4d');
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Перевод текста

Создание задачи

```php
try {
    // Обязательный параметр: "Текст"
    $translate = new Translate('Привет, разработчик!');
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

Добавление параметров перевода

```php
try {
    // Добавление обязательного параметра: "Текст" (необязательно, если был добавлен ранее, например, при создании задачи)
    $translate->addText('Сейчас ты увидишь, как работает перевод текста!')
        ->addText('Это удивительно!')
        ->addText('Технологии не стоят на месте..')

        /*
         * Добавление обязательного параметра: "Язык исходного текста" (обязательно, при использовании глоссариев)
         * Воспользуйтесь приемом "print_r($lang = json_decode($cloud->getLanguageList(), true));",
         * для получения списка кодов, поддерживаемых языков сервисом, в качестве параметра.
         */
        ->setSourceLang('ru')

        /*
         * Добавление обязательного параметра: "Язык на который переводить"
         * Воспользуйтесь приемом "print_r($lang = json_decode($cloud->getLanguageList(), true));",
         * для получения списка кодов, поддерживаемых языков сервисом, в качестве параметра.
         */
        ->setTargetLang('en')
    
        /*
         * Добавление обязательного параметра: "Формат" (необязательно)
         * Возможно использование других констант класса "Format", в качестве параметра
         */
        ->setFormat(Format::PLAIN_TEXT)

        /*
         * Добавление обязательных параметров: "Текст в оригинале для глоссария",
         * "Текст на языке перевода для глоссария" (необязательно)
         */
        ->addGlossary('текста', 'greeting text')
        ->addGlossary('удивительно', 'super')
        ->addGlossary('технологии', 'services');
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

Выполнение задачи

```php
try {
    // Обязательный параметр: "Задача"
    print_r($cloud->request($translate));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Определение языка текста

Удобный способ (без указания дополнительных параметров)

```php
try {
    // Обязательный параметр: "Текст"
    print_r($cloud->getLanguage('Привет, разработчик!'));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

Создание задачи

```php
try {
    // Обязательный параметр: "Текст"
    $detect = new Detect('Привет, разработчик!');
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

Добавление параметров определения языка текста

```php
try {
    /*
     * Добавление обязательного параметра: "Предполагаемый язык" (необязательно)
     * Воспользуйтесь приемом "print_r($lang = json_decode($cloud->getLanguageList(), true));",
     * для получения списка кодов, поддерживаемых языков сервисом, в качестве параметра.
     */
    $detect->addHint('ru')
        ->addHint('uk')
        ->addHint('be');
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

Выполнение задачи

```php
try {
    // Обязательный параметр: "Задача"
    print_r($cloud->request($detect));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```

### Получение списка поддерживаемых языков

Выполнение задачи

```php
try {
    // Способ №1
    print_r($cloud->getLanguageList());
} catch (ClientException $e) {
    echo $e->getMessage();
}

// Способ №2 Создание задачи
$language = new Language;

try {
    /*
     * Выполнение задачи
     * Обязательный параметр: "Задача"
     */
    print_r($cloud->request($language));
} catch (ClientException $e) {
    echo $e->getMessage();
}
```
