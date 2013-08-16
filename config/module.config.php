<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Solarium\Client' => 'EwgoSolarium\Service\SolariumFactory',
            'EwgoSolarium\Collector\RequestCollector' => 'EwgoSolarium\Service\RequestCollectorFactory',
            'EwgoSolarium\Plugin\RequestLogger' => 'EwgoSolarium\Service\RequestLoggerFactory'
        ),
        'aliases' => array(
            'solarium' => 'Solarium\Client',
            'solarium.collector' => 'EwgoSolarium\Collector\RequestCollector',
            'solarium.logger' => 'EwgoSolarium\Plugin\RequestLogger'
        )
    ),

    'view_manager' => array(
        'template_map' => array(
            'zend-developer-tools/toolbar/solarium-requests' => __DIR__ . '/../view/zend-developer-tools/toolbar/solarium-requests.phtml',
        ),
    ),

    'zenddevelopertools' => array(
        'profiler' => array(
            'collectors' => array(
                'solarium'  => 'solarium.collector',
            ),
        ),
        'toolbar' => array(
            'entries' => array(
                'solarium'  => 'zend-developer-tools/toolbar/solarium-requests',
            ),
        ),
    ),
);
