<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Solarium\Client' => 'EwgoSolarium\Service\SolariumFactory'
        ),
        'aliases' => array(
            'solarium' => 'Solarium\Client'
        )
    )
);