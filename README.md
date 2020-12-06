[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://scrutinizer-ci.com/g/codenomdev/codeigniter4-midtrans/badges/build.png?b=master)](https://scrutinizer-ci.com/g/codenomdev/codeigniter4-midtrans/build-status/master)
[![StyleCI](https://github.styleci.io/repos/314207113/shield?branch=master)](https://github.styleci.io/repos/314207113?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/codenomdev/codeigniter4-midtrans.svg?style=flat-square)](https://scrutinizer-ci.com/g/codenomdev/codeigniter4-midtrans)

# Midtrans for CodeIgniter 4 [UNOFFICIAL LIBRARY]
 Midtrans :heart: CodeIgniter 4!

 Veritrans now is Midtrans

This is the all new Codeigniter client library for Veritrans 2.0. Visit [https://www.midtrans.com](https://www.veritrans.co.id) for more information about the product and see documentation at [http://docs.midtrans.com](http://docs.veritrans.co.id) for more technical details. 

### What's new?
SNAP! for technical info Visit [https://snap-docs.midtrans.com](https://snap-docs.midtrans.com)

### Requirements
The following plugin is tested under following environment:
* PHP v7.2.x or greater.
* CodeIgniter v4.0.4.
* Laminas JSON (Include).

## Installation
* Use Composer ``` composer require codenom/midtrans ``` (Recommended).

## Configuration
After installation Module, please follow instruction:
* Publish via CLI: ``` php spark codenom:midtrans publish ``` .
* After publish, check file Midtrans.php on **App/Config/Midtrans.php**.
* Setup Merchant Key, ID Merchant, Client Key and set Production ```public $isProduction = TRUE (Production) or FALSE (Sandbox) ``` on Midtrans.php.

#### For more setup Merchant Key & Client Key [Retrieve API Access Key](https://docs.midtrans.com/en/midtrans-account/overview?id=retrieving-api-access-keys).

#### For more setup Environments [Environments](https://docs.midtrans.com/en/midtrans-account/overview?id=switching-environment).

## Using Midtrans Library

### Use Midtrans
```php
//load services Midtrans
$services = new Config\Services::Midtrans();
```

**OR**

```php
//load services Midtrans
$services = new services('Midtrans');
```

### Available Function
* Get Snap Token
```php
/**
 * @param array $placeOrder
 * @return object response CURL
 */
$services->getSnapToken(array $placeOrder = []);
```

## Use Veritrans
```php
//load services Veritrans
$services = new Config\Services::veritrans();
```

**OR**

```php
//load services Veritrans
$services = new services('Veritrans');
```

### Available Function
* Get Status transaction
```php
/**
 * @param string $id
 *
 * @return object response CURL
 */
 $services->getStatus($id);
```

* Appove challenge transaction
```php
/**
 * @param $id ID transactions
 * @return status code from Midtrans
 */
$services->approve($id);
```

* Cancel transaction before it's setteled
```php
/**
 * @param string $id Order ID or transaction ID
 * @return string
*/
$services->cancel($id);
```

* Expire transaction before it's setteled
```php
/**
 * @param string $id Order ID or transaction ID
 * @return mixed[]
 */
$services->expire($id);
```
## Documentation
**For more COMINGSOON**

## Sample Data
You can visit the following repository: [Midtrans Sample Data](https://github.com/codenomdev/midtrans-sample-data)