<?php

namespace Braunstetter\TemplateHooks\Test\twig;

use Braunstetter\TemplateHooks\Test\twig\Hooks\TestHook;
use Braunstetter\TemplateHooks\Twig\Extension;
use Braunstetter\TemplateHooks\Twig\Renderer;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{

    public function getExtensions() : array
    {
        return [
            new Extension(new Renderer([
                new TestHook()
            ])),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getFixturesDir(): string
    {
        return __DIR__ . "/Fixtures";
    }

}