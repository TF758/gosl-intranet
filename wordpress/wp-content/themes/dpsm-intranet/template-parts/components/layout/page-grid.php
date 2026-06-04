<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'variant' => 'sidebar-right',
        'gap'     => 'default',
        'class'   => '',
    ]
);

$variants = [

    'sidebar-right' =>
    '
        lg:grid-cols-[minmax(0,1fr)_320px]
    ',

    'sidebar-left' =>
    '
        lg:grid-cols-[320px_minmax(0,1fr)]
    ',

    'equal' =>
    '
        lg:grid-cols-2
    ',
];

$gaps = [

    'sm' =>
    '
        gap-4
    ',

    'default' =>
    '
        gap-8
    ',

    'lg' =>
    '
        gap-12
    ',
];

$variant_class =
    $variants[$args['variant']]
    ?? $variants['sidebar-right'];

$gap_class =
    $gaps[$args['gap']]
    ?? $gaps['default'];

?>

<div
    class="
        grid
        min-w-0

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