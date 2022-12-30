<?php

use LaMetric\Field;

return [
    [
        'key'     => 'collection-slug',
        'type'    => Field::TEXT_TYPE,
        'default' => 'mutant-ape-yacht-club',
    ],
    [
        'key'  => 'show-floor',
        'type' => Field::SWITCH_TYPE,
    ],
    [
        'key'  => 'show-1d-volume',
        'type' => Field::SWITCH_TYPE,
    ],
    [
        'key'  => 'show-7d-volume',
        'type' => Field::SWITCH_TYPE,
    ],
    [
        'key'  => 'show-30d-volume',
        'type' => Field::SWITCH_TYPE,
    ],
    [
        'key'  => 'show-total-volume',
        'type' => Field::SWITCH_TYPE,
    ],
];
