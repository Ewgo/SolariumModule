<?php

namespace EwgoSolarium\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use EwgoSolarium\Plugin\RequestLogger;

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
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logger = new RequestLogger();
        $logger->register($serviceLocator->get('solarium'));
        return $logger;
    }
}
