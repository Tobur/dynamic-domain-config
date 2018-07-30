<?php

namespace DynamicDomainConfig;

use DynamicDomainConfig\DependencyInjection\DynamicDomainConfigExtension;
use DynamicDomainConfig\Service\DynamicDomainConfigHandler;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
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
            new DynamicDomainConfigHandler(),
            PassConfig::TYPE_OPTIMIZE
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