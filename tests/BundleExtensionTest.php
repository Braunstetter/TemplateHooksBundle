<?php

namespace Braunstetter\TemplateHooks\Test;

use Braunstetter\TemplateHooks\DependencyInjection\TemplateHooksExtension;
use Braunstetter\TemplateHooks\Twig\Contracts\HookInterface;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

class BundleExtensionTest extends AbstractExtensionTestCase
{

    /**
     * @inheritDoc
     */
    protected function getContainerExtensions(): array
    {
        return [new TemplateHooksExtension()];
    }

    public function test_extension_gets_loaded()
    {
        $this->load();
        $this->assertContainerBuilderHasService('Braunstetter\TemplateHooks\Twig\Extension');
    }

    public function test_tag_gets_registered()
    {
        $this->load();
        $this->assertArrayHasKey('Braunstetter\TemplateHooks\Twig\Contracts\HookInterface', $this->container->getAutoconfiguredInstanceof());
    }

    public function test_all_services_gets_loaded()
    {
        $this->load();
        $this->assertContainerBuilderHasService('Braunstetter\TemplateHooks\Twig\Renderer');
    }
}