# Google Indexing
Indexing project written in PHP, using Google Indexing Api.

It is assumed that the steps at this address are applied.
https://developers.google.com/search/apis/indexing-api/v3/prereqs

<img alt="image" src="https://user-images.githubusercontent.com/34205493/161426445-fef00e1b-d120-4baf-9f5a-5d9331aa264a.png">

## Using ##

### For a single page: ###

Update:
```sh
http://localhost/api/?url=https://www.your-website.com
```
```sh
http://localhost/api/?method=1&url=https://www.your-website.com
```
Delete:
```sh
http://localhost/api/?method=2&url=https://www.your-website.com
```

### For multiple pages: ###

Update:
```sh
http://localhost/api/multiple?urls[]=https://www.your-website.com&urls[]=https://www.your-website.com/contact
```
```sh
http://localhost/api/multiple?method=1&urls[]=https://www.your-website.com&urls[]=https://www.your-website.com/contact
```
Delete:
```sh
http://localhost/api/multiple?method=2&urls[]=https://www.your-website.com&urls[]=https://www.your-website.com/contact
```

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org/). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

```sh
composer update
```
### Enter the name of your JSON file:

Line 15 in app/controllers/home.php
```php
...
$googleClient->setAuthConfig( 'YOUR_JSON_FILE_NANME.json' );
...
```

Line 15 in app/controllers/multiple.php
```php
...
$googleClient->setAuthConfig( 'YOUR_JSON_FILE_NANME.json' );
...
```
## If your PHP version is below 8

1- run the command below.

```sh
composer install --ignore-platform-reqs
```

2- Edit the following file as indicated:

Line 104 in vendor/psr/cache/src/CacheItemInterface.php

```php
...
public function expiresAfter($time);
...
```

Line 30 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function emergency( $message, array $context = []);
...
```

Line 43 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function alert( $message, array $context = []);
...
```

Line 55 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function critical( $message, array $context = []);
...
```

Line 66 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function error( $message, array $context = []);
...
```

Line 79 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function warning( $message, array $context = []);
...
```

Line 89 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function notice( $message, array $context = []);
...
```

Line 101 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function info( $message, array $context = []);
...
```

Line 111 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function debug( $message, array $context = []);
...
```

Line 124 in vendor/psr/log/src/LoggerInterface.php
```php
...
public function log($level, $message, array $context = []);
...
```
