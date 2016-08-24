<?php

namespace EwgoSolarium\Service;

use Interop\Container\ContainerInterface;
use Solarium\Client;
use Zend\ServiceManager\Factory\FactoryInterface;

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
     * @param ContainerInterface $serviceLocator
     * @return mixed
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $config = $serviceLocator->get('Configuration');
        $client = new Client(isset($config['solarium']) ? $config['solarium'] : array());

        return $client;
    }
}
