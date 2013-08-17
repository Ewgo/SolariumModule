<?php

namespace EwgoSolarium\Plugin;

use Solarium\Client;
use Solarium\Core\Client\Endpoint;
use Solarium\Core\Client\Request;
use Solarium\Core\Event\Events;
use Solarium\Core\Event\PostExecuteRequest;
use Solarium\Core\Event\PreExecuteRequest;
use Solarium\Core\Plugin\Plugin;

/**
 * Solarium requests logger
 *
 * @license MIT
 * @package EwgoSolarium
 */
class RequestLogger extends Plugin
{
    /**
     * Current running request
     * @var Request
     */
    protected $currentRequest;

    /**
     * Current request start time (with microseconds)
     * @var float
     */
    protected $currentStartTime;

    /**
     * Current request endpoint
     * @var Endpoint
     */
    protected $currentEndpoint;

    /**
     * Logged requests
     * @var array<Request>
     */
    protected $requests = array();

    /**
     * Register plugin
     */
    public function register(Client $client)
    {
        $client->registerPlugin('solarium_logger', $this);
    }

    /**
     * Plugin init function
     *
     * Register event listeners
     */
    protected function initPluginType()
    {
        $dispatcher = $this->client->getEventDispatcher();
        $dispatcher->addListener(Events::PRE_EXECUTE_REQUEST, array($this, 'preExecuteRequest'));
        $dispatcher->addListener(Events::POST_EXECUTE_REQUEST, array($this, 'postExecuteRequest'));
    }


    /**
     * Log current request
     *
     * @param Request $request
     * @param type $response
     * @param Endpoint $endpoint
     * @param type $duration
     */
    public function log(Request $request, $response, Endpoint $endpoint, $duration)
    {
        $this->requests[] = array(
            'request' => $request,
            'response' => $response,
            'duration' => $duration,
            'endpoint' => $endpoint
        );
    }

    /**
     * Get logged requests
     * @return array<Request>
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * PreExecuteRequest event listener
     *
     * @param PreExecuteRequest $event
     */
    public function preExecuteRequest(PreExecuteRequest $event)
    {
        $this->currentRequest = $event->getRequest();
        $this->currentEndpoint = $event->getEndpoint();

        $this->currentStartTime = microtime(true);
    }

    /**
     * PostExecuteRequest event listener
     *
     * @param PostExecuteRequest $event
     * @throws \LogicException
     */
    public function postExecuteRequest(PostExecuteRequest $event)
    {
        if ($this->currentRequest !== $event->getRequest()) {
            throw new \LogicException('The current Solarium request is not the one it should be');
        }

        $endTime = microtime(true) - $this->currentStartTime;

        $this->log($this->currentRequest, $event->getResponse(), $event->getEndpoint(), $endTime);

        $this->currentRequest = null;
        $this->currentStartTime = null;
        $this->currentEndpoint = null;
    }
}
