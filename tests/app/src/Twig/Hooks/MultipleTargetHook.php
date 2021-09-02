<?php

namespace Braunstetter\TemplateHooks\Test\app\src\Twig\Hooks;

use Braunstetter\TemplateHooks\Twig\TemplateHook;

class MultipleTargetHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->templating->render('hooks/dusk_hook.html.twig');
    }

    public function setTarget(): string|array
    {
        return ['test', 'multiple', 'dusk'];
    }
}