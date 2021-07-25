<?php


namespace Braunstetter\TemplateHooks\Twig;


use Braunstetter\TemplateHooks\Twig\Contracts\HookInterface;
use Twig\Environment;

abstract class TemplateHook implements HookInterface
{
    protected Environment $templating;
    public string|array $target;
    public array $context;

    public function __construct(Environment $templating)
    {
        $this->templating = $templating;

        if(method_exists($this, 'setTarget')) {
            $this->target = $this->setTarget();
        }
    }

    /**
     * @return Environment
     */
    public function getTemplating(): Environment
    {
        return $this->templating;
    }

    /**
     * @param array $context
     * @return TemplateHook
     */
    public function setContext(array $context): TemplateHook
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

}