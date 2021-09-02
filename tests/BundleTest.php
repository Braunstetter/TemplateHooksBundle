<?php

namespace Braunstetter\TemplateHooks\Test;

use Braunstetter\TemplateHooks\DependencyInjection\TemplateHooksExtension;
use Braunstetter\TemplateHooks\TemplateHooksBundle;
use Nyholm\BundleTest\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpKernel\KernelInterface;

class BundleTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return AppKernel::class;
    }

    protected static function createKernel(array $options = []): KernelInterface
    {
        /**
         * @var AppKernel $kernel
         */
        $kernel = parent::createKernel($options);
        $kernel->addBundle(TemplateHooksBundle::class);

        return $kernel;
    }

    public function testInitBundle(): void
    {
        self::bootKernel();
        $bundle = self::$kernel->getBundle('TemplateHooksBundle');
        $this->assertInstanceOf(TemplateHooksBundle::class, $bundle);
        $this->assertInstanceOf(TemplateHooksExtension::class, $bundle->getContainerExtension());
    }
}