<?php

namespace DynamicDomainConfig\Service;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class DynamicDomainConfigHandler implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        /** @var DomainConfigResolver $resolver */
        $resolver = $container->get('domain.config.resolver');

        foreach ($resolver->getCurrentParams() as $key => $param) {
            if ($container->hasParameter($key)) {
                $container->setParameter(
                    $key,
                    $param
                );
            }
        }
    }
}
