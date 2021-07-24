<?php


namespace Braunstetter\TemplateHooks\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{
    private Renderer $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('hook', [$this->renderer, 'invokeHook'], ['is_safe' => ['html'], 'needs_context' => true]),
        ];
    }
}