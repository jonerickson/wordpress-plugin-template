<?php

declare(strict_types=1);

use Isolated\Symfony\Component\Finder\Finder;

function getWpExcludedSymbols(string $fileName): array
{
    $filePath = __DIR__.'/vendor/sniccowp/php-scoper-wordpress-excludes/generated/'.$fileName;

    return json_decode(
        file_get_contents($filePath),
        true,
    );
}

$wp_classes = getWpExcludedSymbols('exclude-wordpress-classes.json');
$wp_functions = getWpExcludedSymbols('exclude-wordpress-functions.json');
$wp_constants = getWpExcludedSymbols('exclude-wordpress-constants.json');

return [
    'prefix' => 'WordpressPluginTemplate\Vendor',
    'output-dir' => 'build',
    'finders' => [
        Finder::create()
            ->files()
            ->notName([
                'bud.config.js',
                'bootstrap.php',
                'phpstan.neon',
                'phpunit.xml',
                'pint.json',
                'scoper.inc.php',
                'tailwind.config.js',
            ])
            ->exclude([
                'node_modules',
                'tests',
				'tools',
            ])
            ->in('.'),
        Finder::create()
            ->files()
            ->ignoreVCS(true)
            ->notName('/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock|Dockerfile|docker-compose.yml/')
            ->exclude([
                'bin',
                'doc',
                'test',
                'test_old',
                'tests',
                'Tests',
                'vendor-bin',
            ])
            ->in('vendor'),
    ],
    'exclude-files' => [
        ...array_map(
            static fn (SplFileInfo $fileInfo) => $fileInfo->getPathname(),
            iterator_to_array(
                Finder::create()
                    ->in('vendor/illuminate/console/resources/views')
                    ->files(),
                false,
            ),
        ),
    ],
    'patchers' => [
        static function (string $filePath, string $prefix, string $contents): string {
            if (! str_ends_with($filePath, 'vendor/illuminate/console/View/Components/Factory.php')) {
                return $contents;
            }

            return str_replace(
                '$component = \'\\\\Illuminate\\\\Console\\\\View\\\\Components\\\\\' . ucfirst($method);',
                '$component = \'\\\\'.$prefix.'\\\\Illuminate\\\\Console\\\\View\\\\Components\\\\\' . ucfirst($method);',
                $contents,
            );
        },
    ],
    'exclude-namespaces' => [
        'WordpressPluginTemplate\App',
        'WordpressPluginTemplate\Database',
        'WordpressPluginTemplate\Tests',
    ],
    'exclude-classes' => $wp_classes,
    'exclude-constants' => $wp_functions,
    'exclude-functions' => $wp_constants,
    'expose-global-constants' => true,
    'expose-global-classes' => true,
    'expose-global-functions' => true,
    'expose-namespaces' => [],
    'expose-classes' => [],
    'expose-functions' => [],
    'expose-constants' => [],
];
