<?php

declare(strict_types=1);

namespace LaMetric\Helper;

class IconHelper
{
    public static function getIcon(string $collectionName): string
    {
        $icons = [
            'boredapeyachtclub' => 'i51646',
            'mutant-ape-yacht-club' => 'i51647',
        ];

        return $icons[$collectionName] ?? 'i51648';
    }
}
