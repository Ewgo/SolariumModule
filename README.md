# EwgoSolarium module

## About

The EwgoSolarium module provides ZF2 integration with the [solarium](http://www.solarium-project.org) solr client.

## Installation

``` bash
$ php composer.phar require ewgo/solarium-module
```

Add "EwgoSolarium" to the list of loaded modules.

## Basic configuration

```php
array(
    'solarium' => array(
        'endpoint' => array(
            'default' => array(
                'host' => 'localhost',
                'port' => 8983,
                'path' => '/solr',
                'core' => 'default',
                'timeout' => 5
            )
            //...
        )
    )
)
```

## Usage

```php
$client = $serviceLocator->get('Solarium\Client'); // Or the 'solarium' alias
$query = $client->createSelect();
$resultset = $client->execute($query);
```

For more information see the [Solarium documentation](http://www.solarium-project.org/documentation/).