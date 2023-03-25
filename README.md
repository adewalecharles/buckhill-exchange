# Buckhill Exchanger Package
[![Latest Version](https://img.shields.io/github/release/adewalecharles/buckhill-exchange.svg?style=flat-square)](https://github.com/adewalecharles/buckhill-exchange/releases)
[![Github Forks](https://img.shields.io/github/forks/adewalecharles/buckhill-exchange)](https://github.com/adewalecharles/buckhill-exchange)
[![Github Stars](https://img.shields.io/github/stars/adewalecharles/buckhill-exchange)](https://github.com/adewalecharles/buckhill-exchange)
[![License](https://poser.pugx.org/adewalecharles/smeify/license.svg)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/adewalecharles/smeify.svg?style=flat-square)](https://packagist.org/packages/adewalecharles/buckhill-exchange)

## Buckhill Exchanger is a package that allow you to exchange any currency in the world, it makes use of the European Central Bank daily reference.

## Installation

[PHP](https://php.net) 8.2+  and [Composer](https://getcomposer.org) are required.

To get the latest version of buckhill/exchange, simply require it

```bash
composer require buckhill/exchange
```

Or add the following line to the require block of your `composer.json` file.

```
"buckhill/exchange": "1.0.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.


## General Usage

To exchange any currency, all you need to do his hit this endpoint '/api/endpoint' with the payloads

```
[
    amount => 100
    currenct => 'USED'
]
```

We support several currencies, see list of currency below.

```
[
    "USD"
    ,
    "JPY"
    ,
    "BGN"
    ,
    "CZK"
    ,
    "DKK"
    ,
    "GBP"
    ,
    "HUF"
    ,
    "PLN"
    ,
    "RON"
    ,
    "SEK"
    ,
    "CHF"
    ,
    "ISK"
    ,
    "NOK"
    ,
    "TRY"
    ,
    "AUD"
    ,
    "BRL"
    ,
    "CAD"
    ,
    "CNY"
    ,
    "HKD"
    ,
    "IDR"
    ,
    "ILS"
    ,
    "INR"
    ,
    "KRW"
    ,
    "MXN"
    ,
    "MYR"
    ,
    "NZD"
    ,
    "PHP"
    ,
    "SGD"
    ,
    "THB"
    ,
    "ZAR"
]
```


