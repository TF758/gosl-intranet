<?php

if (!defined('ABSPATH')) {
    exit;
}

function dpsm_taxonomy_labels(
    string $singular,
    string $plural
): array {

    return [

        'name' => $plural,

        'singular_name' => $singular,

    ];
}
