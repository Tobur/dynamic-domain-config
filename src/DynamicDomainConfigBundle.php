<?php

namespace DynamicDomainConfig;

use DynamicDomainConfig\DependencyInjection\DynamicDomainConfigExtension;
use DynamicDomainConfig\Service\DynamicDomainConfigHandler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DynamicDomainConfigBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new DynamicDomainConfigHandler()
        );
    }

    /**
     * @return DynamicDomainConfigExtension
     */
    public function getContainerExtension()
    {
        return new DynamicDomainConfigExtension();
    }
}