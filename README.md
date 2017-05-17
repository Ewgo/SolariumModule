[![Build Status](https://travis-ci.org/odiaseo/SolariumModule.svg?branch=master)](https://travis-ci.org/odiaseo/SolariumModule)

# SynergySolarium module

## About

The SynergySolarium module provides ZF3 integration with [Solarium](http://www.solarium-project.org) solr client.

It also integrates with [Zend Developer Tools](https://github.com/zendframework/ZendDeveloperTools).

Inspired by Ewgo/SolariumModule ZF2 module

## Installation

``` bash
$ php composer.phar require synergy/solarium-module
```

Add "SynergySolarium" to the list of loaded modules.

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
    new \SynergySolarium\Paginator\Adapter\SolariumPaginator($client, $query)
);
$paginator->setCurrentPageNumber($page);
$paginator->setItemCountPerPage($countPerPage);
```