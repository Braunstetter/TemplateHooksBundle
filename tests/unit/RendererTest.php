<?php

namespace Braunstetter\TemplateHooks\Test\unit;

use Braunstetter\TemplateHooks\Test\app\src\Twig\Hooks\MultipleTargetHook;
use Braunstetter\TemplateHooks\Test\twig\Hooks\DuskHook;
use Braunstetter\TemplateHooks\Test\twig\Hooks\TestHook;
use Braunstetter\TemplateHooks\Twig\Renderer;
use Braunstetter\TemplateHooks\Twig\TemplateHook;
use PHPUnit\Framework\TestCase;
use Traversable;

class RendererTest extends TestCase
{
    protected Renderer $renderer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renderer = new Renderer([new TestHook(), new DuskHook(), new MultipleTargetHook()]);
    }

    public function test_if_correct_target_matches()
    {
        $this->assertInstanceOf(TemplateHook::class, $this->renderer->getMatchingHooks('test')[0]);
    }

    public function test_if_array_target_notation_works()
    {

        $arrayOfHooks = $this->renderer->getMatchingHooks('multiple');

        if ($arrayOfHooks instanceof Traversable) {
            $arrayOfHooks = iterator_to_array($arrayOfHooks);
        }

        $this->assertInstanceOf(TemplateHook::class, $arrayOfHooks[array_key_first($arrayOfHooks)]);
    }


}
