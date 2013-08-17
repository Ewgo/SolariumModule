<?php

namespace EwgoSolarium\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use EwgoSolarium\Collector\RequestCollector;

/**
 * Zend Developer Toolbar collector for Solarium requests factory
 *
 * @license MIT
 * @package EwgoSolarium
 */
class RequestCollectorFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RequestCollector($serviceLocator->get('solarium.logger'));
    }
}
