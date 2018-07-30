<?php

namespace DynamicDomainConfig\Service;

use Doctrine\Bundle\DoctrineBundle\ConnectionFactory;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DoctrineConnectionFactory extends ConnectionFactory implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array
     */
    protected $doctrineConnectionMapping;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param array $mapping
     */
    public function setDoctrineConnectionMapping(array $mapping)
    {
        $this->doctrineConnectionMapping = $mapping;
    }

    /**
     * @param array $params
     * @param Configuration|null $config
     * @param EventManager|null $eventManager
     * @param array $mappingTypes
     * @return \Doctrine\DBAL\Connection
     */
    public function createConnection(
        array $params,
        Configuration $config = null,
        EventManager $eventManager = null,
        array $mappingTypes = []
    ) {
        foreach ($this->doctrineConnectionMapping as $key => $value) {
            if ($this->container->hasParameter($value)) {
                $params[$key] = $this->container->getParameter($value);
            }
        }

        return parent::createConnection($params, $config, $eventManager,$mappingTypes);
    }
}

