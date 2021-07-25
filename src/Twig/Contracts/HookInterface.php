<?php


namespace Braunstetter\TemplateHooks\Twig\Contracts;


use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

interface HookInterface
{
    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function render(): string;
    public function setTarget(): string|array;
}