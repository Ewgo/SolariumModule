# EwgoSolarium module

## About

The EwgoSolarium module provides ZF2 integration with [Solarium](http://www.solarium-project.org) solr client.

It also integrates with [Zend Developer Tools](https://github.com/zendframework/ZendDeveloperTools).

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

## Paginator adapter
This module also provides an adapter for Zend\Paginator.
```php
$paginator = new \Zend\Paginator\Paginator(
    new \EwgoSolarium\Paginator\Adapter\SolariumPaginator($client, $query)
);
$paginator->setCurrentPageNumber($page);
$paginator->setItemCountPerPage($countPerPage);
```