<?php

declare(strict_types=1);

namespace LaMetric\Helper;

class TextHelper
{
    public static function getText(string $slug): string
    {
        $text = [
            'show-floor' => 'Floor',
            'show-1d-volume' => '1d vol',
            'show-7d-volume' => '7d vol',
            'show-30d-volume' => '30d vol',
            'show-total-volume' => 'Total vol',
        ];

        return $text[$slug];
    }
}
