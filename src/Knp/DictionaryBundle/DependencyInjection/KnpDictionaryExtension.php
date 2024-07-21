<?php

declare(strict_types=1);

namespace Knp\DictionaryBundle\DependencyInjection;

use Knp\DictionaryBundle\DependencyInjection\Compiler\DictionaryFactoryBuildingPass;
use Knp\DictionaryBundle\DependencyInjection\Compiler\DictionaryRegistrationPass;
use Knp\DictionaryBundle\Dictionary;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Extension\Extension;
final class KnpDictionaryExtension extends Extension
{
    /**
     * @param array<mixed, mixed> $configs
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();

        $container
            ->setParameter(
                'knp_dictionary.configuration',
                $this->processConfiguration($configuration, $configs)
            )
        ;

        $container
            ->registerForAutoconfiguration(Dictionary::class)
            ->addTag(DictionaryRegistrationPass::TAG_DICTIONARY)
        ;

        $container
            ->registerForAutoconfiguration(Dictionary\Factory::class)
            ->addTag(DictionaryFactoryBuildingPass::TAG_FACTORY)
        ;

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yaml');
    }
}
