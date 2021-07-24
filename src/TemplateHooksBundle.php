<?php

namespace Braunstetter\TemplateHooks;

use Braunstetter\TemplateHooks\DependencyInjection\TemplateHooksExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TemplateHooksBundle extends Bundle
{
    public function getContainerExtension(): bool|TemplateHooksExtension|ExtensionInterface|null
    {
        if (null === $this->extension) {
            $this->extension = new TemplateHooksExtension();
        }

        return $this->extension;
    }
}