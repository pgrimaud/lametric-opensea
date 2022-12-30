<?php

declare(strict_types=1);

namespace LaMetric\Helper;

class TextHelper
{
    public static function getText(string $slug): string
    {
        $text = [
            'show-floor' => 'Floor',
            'show-1d-volume' => '1d volume',
            'show-7d-volume' => '7d volume',
            'show-30d-volume' => '30d volume',
            'show-total-volume' => 'Total volume',
        ];

        return $text[$slug];
    }
}
