<?php

namespace SynergySolarium\Service;

use SynergySolarium\Collector\RequestCollector;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FActory\FactoryInterface;

/**
 * Zend Developer Toolbar collector for Solarium requests factory
 *
 * @license MIT
 * @package SynergySolarium
 */
class RequestCollectorFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $serviceLocator
     * @param string $requestedName
     * @param array|null $options
     *
     * @return RequestCollector
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        return new RequestCollector($serviceLocator->get('solarium.logger'));
    }
}
