<?php

namespace DynamicDomainConfig\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;
use Twig_Environment as Environment;

/**
 * domain.config.resolver
 */
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
        $serverNameParameters = $this->getCurrentParams();

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

    /**
     * @return array
     */
    public function getCurrentParams(): ?array
    {
        if (!$this->isExistServerName()) {
            return [];
        }

        $serverName = $_SERVER['SERVER_NAME'];
        if (!array_key_exists($serverName, $this->domainMapping)) {
            return [];
        }

        return $this->domainMapping[$serverName];
    }

    /**
     * @return bool
     */
    public function isExistServerName(): bool
    {
        return isset($_SERVER['SERVER_NAME']);
    }
}
