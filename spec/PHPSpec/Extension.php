<?php

declare(strict_types=1);

namespace spec\PHPSpec;

use PhpSpec;
use PhpSpec\ServiceContainer;

final class Extension implements PhpSpec\Extension
{
    /**
     * @param mixed[] $params
     */
    public function load(ServiceContainer $container, array $params): void
    {
        $container->define(
            OneOfMatcher::class,
            fn (): OneOfMatcher => new OneOfMatcher(),
            ['matchers']
        );
    }
}
