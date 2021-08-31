<?php

namespace Braunstetter\TemplateHooks\Test\functional;

use Braunstetter\TemplateHooks\Test\app\src\TestKernel;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class FunctionalTest extends TestCase
{

    protected Testkernel $kernel;

    protected function setUp() : void
    {
        parent::setUp();

        $kernel = new TestKernel('dev', true);
        $kernel->boot();

        $this->kernel = $kernel;
    }

    public function testTemplateHookWorks()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET','/test');

        $this->assertSame(200, $client->getResponse()->getStatusCode());

        $this->assertGreaterThan(
            0,
            $client->getCrawler()->filter('html:contains("this hook works")')->count()
        );
    }
}