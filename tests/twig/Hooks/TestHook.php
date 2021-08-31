<?php

namespace Braunstetter\TemplateHooks\Test\twig\Hooks;

use Braunstetter\TemplateHooks\Twig\TemplateHook;

class TestHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->render(__DIR__ . 'templates/hook_test.html.twig');
    }

    public function setTarget(): string|array
    {
        return 'test';
    }

}