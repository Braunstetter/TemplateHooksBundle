<?php

namespace Braunstetter\TemplateHooks\Test\twig;

use Braunstetter\TemplateHooks\Test\twig\Hooks\TestHook;
use Braunstetter\TemplateHooks\Twig\Extension;
use Braunstetter\TemplateHooks\Twig\Renderer;
use Twig\Test\IntegrationTestCase;

class IntegrationTest
{

    public function getExtensions() : array
    {
        return [
            new Extension(new Renderer()),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getFixturesDir(): string
    {
        return __DIR__ . "/Fixtures";
    }

    private function getHooks()
    {
//        yield new TestHook($this->);
    }
}