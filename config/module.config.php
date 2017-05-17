<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Solarium\Client' =>   SynergySolarium\Service\SolariumFactory::class,
            'SynergySolarium\Collector\RequestCollector' => SynergySolarium\Service\RequestCollectorFactory::class,
            'SynergySolarium\Plugin\RequestLogger' => SynergySolarium\Service\RequestLoggerFactory::class
        ),
        'aliases' => array(
            'solarium' => Solarium\Client::class,
            'solarium.collector' => SynergySolarium\Collector\RequestCollector::class,
            'solarium.logger' => SynergySolarium\Plugin\RequestLogger::class
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
                'solarium' => 'solarium.collector',
            ),
        ),
        'toolbar' => array(
            'entries' => array(
                'solarium' => 'zend-developer-tools/toolbar/solarium-requests',
            ),
        ),
    ),
);
