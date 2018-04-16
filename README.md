# Property API Client

A PHP client for Eurolink's Property API.

## Setup

```
composer install
```

## Testing

#### Automatic
Paste your API Access Token into the root `.env` file. See `.env.example`.

```bash
./vendor/bin/phpunit tests/
```

#### Manual
Paste your API Access Token into the root `.env` file. See `.env.example`.

```php
php example/simple.php
// or
php example/complex.php
```

## Usage

#### GET Properties

```php
<?php
    require 'vendor/autoload.php';

    use PropertyAPI\Properties;

    $client = new Properties({
        'accessToken' => '~~INSERT_ACCESS_TOKEN~~',
    });

    $collection = $client->getProperties();

    var_dump($collection->getTotal());

    // returns array of objects
    var_dump($collection->getRows());

    // returns array of '\PropertyAPI\Property'
    var_dump($collection->getParsedRows());
?>
```

#### GET Property

```php
<?php
    require 'vendor/autoload.php';

    use PropertyAPI\Properties;

    $client = new Properties({
        'accessToken' => '~~INSERT_ACCESS_TOKEN~~',
    });

    $property = $client->getProperty(123456);

    var_dump($property->isValid());

    var_dump($property->getCompanyID());
?>
```