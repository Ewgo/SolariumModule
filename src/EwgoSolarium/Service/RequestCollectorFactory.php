<?php

namespace EwgoSolarium\Service;

use EwgoSolarium\Collector\RequestCollector;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FActory\FactoryInterface;

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
     * @param ContainerInterface $serviceLocator
     * @return mixed
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        return new RequestCollector($serviceLocator->get('solarium.logger'));
    }
}
