<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'width' => 'default',
        'class' => '',
    ]
);

$widths = [
    'narrow'  => 'max-w-4xl',
    'default' => 'max-w-7xl',
    'wide'    => 'max-w-screen-2xl',
    'full'    => 'max-w-none',
];

$width_class =
    $widths[$args['width']]
    ?? $widths['default'];

?>

<div
    class="
        mx-auto
        px-4
        sm:px-6
        lg:px-8
        <?php echo esc_attr(
            $width_class
        ); ?>
        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">