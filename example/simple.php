<?php

    require realpath(__DIR__ . '/../vendor/autoload.php' );

    use PropertyAPI\Client;

    $dotenv = new Dotenv\Dotenv(realpath(__DIR__ . '/..' ));
    $dotenv->load();
    $dotenv->required('TOKEN')->notEmpty();
    $dotenv->required('PROPERTY_ID')->notEmpty();

    // get properties
    try {

        $client = new Client([
            'accessToken' => getenv('TOKEN'),
        ]);

        $properties = $client->getProperties();

        var_dump('Total: ' . $properties->getTotal());

        #var_dump($properties->getRows());

        foreach($properties->getParsedRows() as $property) {
            var_dump($property->getCompanyID());
            var_dump($property->getID());
            var_dump($property->getAddressString());
            var_dump($property->getPostcode());
        }

    } catch (Exception $event) {

        var_dump($event->getMessage());

    }

    // get property
    try {

        $client = new Client([
            'accessToken' => getenv('TOKEN'),
        ]);

        $propertyID = getenv('PROPERTY_ID');

        $property = $client->getProperty($propertyID);

        var_dump($property);

        var_dump($property->isValid());

        var_dump($property->getCompanyID());

    } catch (Exception $event) {

        var_dump($event->getMessage());

    }