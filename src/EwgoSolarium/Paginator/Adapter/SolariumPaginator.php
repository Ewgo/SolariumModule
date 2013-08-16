<?php

namespace EwgoSolarium\Paginator\Adapter;

use Zend\Paginator\Adapter\AdapterInterface;
use Solarium\Client;
use Solarium\QueryType\Select\Query\Query;

/**
 * Solarium result paginator
 *
 * @license MIT
 * @package EwgoSolarium
 */
class SolariumPaginator implements AdapterInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Query
     */
    protected $query;

    /**
     * @var int
     */
    protected $count;

    public function __construct(Client $client, Query $query)
    {
        $this->client = $client;
        $this->query = $query;
    }

    public function count()
    {
        if (null === $this->count) {
            $this->getItems(0, 0);
        }

        return $this->count;
    }

    public function getItems($offset, $itemCountPerPage)
    {
        $this->query->setStart($offset);
        $this->query->setRows($itemCountPerPage);
        $result = $this->client->select($this->query);
        $this->count = $result->getNumFound();
        return $result;
    }
}
