<?php


namespace Braunstetter\TemplateHooks\Twig;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Renderer
{
    private iterable $hooks;

    public function __construct(iterable $hooks)
    {
        $this->hooks = $hooks;
    }

    /**
     * @param array $context
     * @param $name
     * @return string
     */
    public function invokeHook(array $context, $name): string
    {
        $return = '';

        foreach ($this->hooks as $hook) {

            /** @var TemplateHook $hook */
            if ($hook->target === $name) {

                $hook->setContext($context);

                try {
                    $return .= $hook->render();
                } catch (LoaderError | RuntimeError | SyntaxError) {
                    // just do nothing
                }
            }
        }


        return $return;
    }
}