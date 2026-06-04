<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'spacing'   => 'default',
        'background' => '',
        'id'        => '',
        'class'     => '',
    ]
);

$spacings = [

    'none' => '',

    'sm' =>
    '
        py-8
    ',

    'default' =>
    '
        py-12
        lg:py-16
    ',

    'lg' =>
    '
        py-16
        lg:py-24
    ',
];

$spacing_class =
    $spacings[$args['spacing']] ??
    $spacings['default'];

?>

<section

    <?php if (
        ! empty($args['id'])
    ) : ?>

    id="<?php echo esc_attr(
            $args['id']
        ); ?>"

    <?php endif; ?>

    class="
        <?php echo esc_attr(
            $spacing_class
        ); ?>

        <?php echo esc_attr(
            $args['background']
        ); ?>

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">