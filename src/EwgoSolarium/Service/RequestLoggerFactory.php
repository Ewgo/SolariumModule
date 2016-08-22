<?php

namespace EwgoSolarium\Service;

use EwgoSolarium\Plugin\RequestLogger;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Solarium request logger factory
 *
 * @license MIT
 * @package EwgoSolarium
 */
class RequestLoggerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ContainerInterface $serviceLocator
     * @return mixed
     */
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        $logger = new RequestLogger();
        $logger->register($serviceLocator->get('solarium'));
        return $logger;
    }
}
