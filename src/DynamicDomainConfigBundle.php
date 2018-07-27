<?php

namespace DynamicDomainConfig;

use DynamicDomainConfig\DependencyInjection\DynamicDomainConfigExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DynamicDomainConfigBundle extends Bundle
{
    /**
     * @return DynamicDomainConfigExtension
     */
    public function getContainerExtension()
    {
        return new DynamicDomainConfigExtension();
    }
}