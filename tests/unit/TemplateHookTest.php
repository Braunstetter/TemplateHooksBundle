<?php

namespace Braunstetter\TemplateHooks\Test\unit;

use Braunstetter\TemplateHooks\Test\app\src\TestKernel;
use Braunstetter\TemplateHooks\Test\twig\Hooks\TestHook;
use Braunstetter\TemplateHooks\Twig\TemplateHook;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class TemplateHookTest extends TestCase
{
    protected TemplateHook $hook;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hook = new TestHook();
    }

    public function test_if_env_and_context_are_set()
    {
        $this->hook->setContext(['test' => true]);
        $this->hook->setEnvironment((new Environment(new ArrayLoader([]))));

        $this->assertInstanceOf(Environment::class, $this->hook->getTemplating());
        $this->assertIsArray($this->hook->getContext());
        $this->assertArrayHasKey('test', $this->hook->getContext());
        $this->assertTrue($this->hook->getContext()['test']);
    }
}
