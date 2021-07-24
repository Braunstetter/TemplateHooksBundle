<?php

namespace Braunstetter\TemplateHooks\DependencyInjection;

use Braunstetter\TemplateHooks\Twig\Contracts\HookInterface;
use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class TemplateHooksExtension extends Extension
{

    /**
     * @inheritDoc
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container->registerForAutoconfiguration(HookInterface::class)
            ->addTag('template_hook');
    }
}