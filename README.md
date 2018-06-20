# Property API Client

A PHP client for Eurolink's Property API.

## Setup

```
composer require eurolink/property-api-php-client
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

    var_dump($collection->getCount());

    // returns array of objects
    var_dump($collection->getRows());

    // returns array of '\PropertyAPI\Property'
    var_dump($collection->getParsedRows());
?>
```

You can pass any of the allowed parameters into the “getProperties()” method. Please refer to the main Property API documentation for the full list.

```php
<?php
    $collection = $client->getProperties([
        'town' => 'London',
        'size' => 5,
    ]);
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
