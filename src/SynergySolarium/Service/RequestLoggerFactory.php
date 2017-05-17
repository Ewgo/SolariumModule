<?php

namespace SynergySolarium\Service;

use SynergySolarium\Plugin\RequestLogger;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Solarium request logger factory
 *
 * @license MIT
 * @package SynergySolarium
 */
class RequestLoggerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $serviceLocator
     * @param string $requestedName
     * @param array|null $options
     *
     * @return RequestLogger
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $logger = new RequestLogger();
        $logger->register($serviceLocator->get('solarium'));
        return $logger;
    }
}
