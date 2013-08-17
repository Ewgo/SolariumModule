<?php

namespace EwgoSolarium\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Solarium\Client;

/**
 * Solarium client factory
 *
 * @license MIT
 * @package EwgoSolarium
 */
class SolariumFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $client = new Client(isset($config['solarium']) ? $config['solarium'] : array());

        return $client;
    }
}
