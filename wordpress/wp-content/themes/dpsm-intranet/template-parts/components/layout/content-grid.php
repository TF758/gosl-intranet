<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'variant' => 'cards',
        'gap'     => 'default',
        'class'   => '',
    ]
);

$variants = [

    'cards' =>
    '
        md:grid-cols-2
        xl:grid-cols-3
    ',
];

$gaps = [

    'sm' => 'gap-4',

    'default' => 'gap-6',

    'lg' => 'gap-8',
];

$variant_class =
    $variants[$args['variant']]
    ?? $variants['cards'];

$gap_class =
    $gaps[$args['gap']]
    ?? $gaps['default'];

?>

<div
    class="
        grid

        <?php echo esc_attr(
            $variant_class
        ); ?>

        <?php echo esc_attr(
            $gap_class
        ); ?>

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">