<?php

namespace Braunstetter\TemplateHooks\Test\app\src\Twig\Hooks;

use Braunstetter\TemplateHooks\Twig\TemplateHook;

class SecondTestHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->templating->render('hooks/test_hook.html.twig');
    }

    public function setTarget(): string|array
    {
        return 'test';
    }
}