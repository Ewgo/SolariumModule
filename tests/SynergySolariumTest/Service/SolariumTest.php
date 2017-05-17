<?php

namespace SynergySolariumTest;

use PHPUnit\Framework\TestCase;
use Solarium\Client;
use Solarium\QueryType\Select\Query\Query;
use SynergySolarium\Paginator\Adapter\SolariumPaginator;
use Solarium\QueryType\Select\Result\Result;


class SolariumTest extends TestCase
{
    protected $serviceManager;

    public function setUp()
    {
        $this->serviceManager = Bootstrap::getServicemanager();
    }

    public function testSolariumClientInstance()
    {
        $instance = $this->serviceManager->get('solarium');
        $this->assertInstanceOf(Client::class, $instance);
    }

    public function testPaginatorAdapter()
    {

        $client = $this->prophesize(Client::class);
        $query = $this->prophesize(Query::class);
        $result = $this->prophesize(Result::class);


        $client->select($query)->willREturn($result);
        $adapter = new SolariumPaginator($client->reveal(), $query->reveal());

        $this->assertNull($adapter->count());
        $this->assertInstanceOf(Result::class, $adapter->getItems(0, 10));

        $result->getNumFound()->willReturn(3);
        $this->assertSame(3, $adapter->count());
    }
}
