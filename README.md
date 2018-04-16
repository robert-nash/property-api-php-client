# Property API Client

A PHP client for Eurolink's Property API.

## Setup

```
composer install
```

## Testing

#### Automatic
Paste your API Access Token into the root `.env` file. See `.env.sample`.

```bash
./vendor/bin/phpunit tests/
```

#### Manual
Paste your API Access Token into the root `.env` file. See `.env.sample`.

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

    $properties = new Properties({
        'accessToken' => '~~INSERT_ACCESS_TOKEN~~',
    });

    $collection = $properties->getProperties();

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
    try {

        $client = new Client([
            'accessToken' => file_get_contents(__DIR__ . '/.token'),
        ]);

        $property = $client->getProperty(123456);

        var_dump($property->isValid());

        var_dump($property->getCompanyID());

    } catch (Exception $event) {

        var_dump($event->getMessage());

    }
?>
```