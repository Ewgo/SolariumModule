<?php

namespace SynergySolariumTest;

use PHPUnit\Framework\TestCase;
use SynergySolarium\Collector\RequestCollector;

class RequestCollectorTest extends TestCase
{
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServicemanager();
    }

    public function testCollectorInstance()
    {
        $instance = $this->serviceManager->get('solarium.collector');
        $this->assertInstanceOf(RequestCollector::class, $instance);
    }
}