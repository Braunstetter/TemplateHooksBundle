<?php


namespace Braunstetter\TemplateHooks\Twig;

use Twig\Environment;
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
     * @param Environment $env
     * @param array $context
     * @param $name
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function invokeHook(Environment $env, array $context, $name): string
    {
        $return = '';

        foreach ($this->hooks as $hook) {

            /** @var TemplateHook $hook */
            if ($this->targetMatches($hook, $name)) {

                $hook->setEnvironment($env);
                $hook->setContext($context);

                $return .= $hook->render();
            }
        }

        return $return;
    }

    /**
     * @param TemplateHook $hook
     * @param mixed $name
     * @return bool
     */
    private function targetMatches(TemplateHook $hook, mixed $name): bool
    {
        if (is_array($hook->target)) {
            return in_array($name, $hook->target);
        }

        return $hook->target === $name;
    }

}