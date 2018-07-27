<?php

namespace DynamicDomainConfig\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use Twig_Environment as Environment;

class DomainConfigResolver
{
    /**
     * @var array
     */
    protected $domainMapping = [];

    /**
     * @param array $domainMapping
     */
    public function __construct(array $domainMapping)
    {
        $this->domainMapping = $domainMapping;
    }

    /**
     * @param string $paramName
     * @return mixed
     */
    public function getParam(string $paramName)
    {
        $serverName = $_SERVER['SERVER_NAME'];

        if (!array_key_exists($serverName, $this->domainMapping)) {
            throw new \LogicException(sprintf('%s server name didn\'t support', $serverName));
        }

        $serverNameParameters = $this->domainMapping[$serverName];

        if (!array_key_exists($paramName, $serverNameParameters)) {
            throw new \LogicException(
                sprintf(
                    '%s patameter name doesn\'t exist in server %s',
                    $paramName,
                    $serverName
                )
            );
        }

        return $serverNameParameters[$paramName];
    }
}
