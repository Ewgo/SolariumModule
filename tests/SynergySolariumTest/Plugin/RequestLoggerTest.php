<?php

namespace SynergySolariumTest;

use PHPUnit\Framework\TestCase;
use SynergySolarium\Plugin\RequestLogger;

class RequestLoggerTest extends TestCase
{
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServicemanager();
    }

    public function testRequestLoggerInstance()
    {
        $instance = $this->serviceManager->get('solarium.logger');
        $this->assertInstanceOf(RequestLogger::class, $instance);
    }
}
