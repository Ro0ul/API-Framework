<?php declare(strict_types=1);

namespace App\Libraries;
use DI\ContainerBuilder;

class Container
{
    public static function getInstance() : \Di\Container
    {
        # Definitions
        $definitions = include(ROOT. "definitions.php") ?? [];

        #Builder
        $builder = new ContainerBuilder();
        $builder->addDefinitions($definitions);

        return $builder->build();
    }
}