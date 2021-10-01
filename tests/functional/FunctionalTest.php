<?php

namespace Braunstetter\TemplateHooks\Test\functional;

use Braunstetter\TemplateHooks\Test\app\src\TestKernel;
use Braunstetter\TemplateHooks\Twig\Extension;
use Braunstetter\TemplateHooks\Twig\Renderer;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class FunctionalTest extends TestCase
{

    protected Testkernel $kernel;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = new TestKernel('dev', true);
        $kernel->boot();

        $this->kernel = $kernel;
    }

    public function testTemplateHookWorks()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', '/test');

        $this->assertSame(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0,
            $client->getCrawler()->filter('div:contains("this hook works")')->count()
        );

        $this->assertCount(2, $client->getCrawler()->filter('div:contains("this hook works")'));
    }

    public function test_dusk_hook_dont_trigger()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', '/test');

        $this->assertSame(
            0,
            $client->getCrawler()->filter('html:contains("this hook should not show up")')->count()
        );
    }

}