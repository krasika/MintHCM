<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/Api',
        __DIR__ . '/KREST',
        __DIR__ . '/ModuleInstall',
        __DIR__ . '/XTemplate',
        __DIR__ . '/Zend',
        __DIR__ . '/cache',
        __DIR__ . '/custom',
        __DIR__ . '/data',
        __DIR__ . '/include',
        __DIR__ . '/install',
        __DIR__ . '/jssource',
        __DIR__ . '/lib',
        __DIR__ . '/metadata',
        __DIR__ . '/modules',
        __DIR__ . '/service',
        __DIR__ . '/soap',
        __DIR__ . '/themes',
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_72
    ]);
};
