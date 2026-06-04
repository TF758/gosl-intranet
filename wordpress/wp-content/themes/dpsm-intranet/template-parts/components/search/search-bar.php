<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'name'         => 'search',
        'value'        => '',
        'placeholder'  => 'Search...',
        'button_text'  => 'Search',
        'class'        => '',
    ]
);

?>

<div
    class="
        join
        w-full

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <input
        type="search"
        name="<?php echo esc_attr(
                    $args['name']
                ); ?>"
        value="<?php echo esc_attr(
                    $args['value']
                ); ?>"
        placeholder="<?php echo esc_attr(
                            $args['placeholder']
                        ); ?>"
        class="
            input
            input-bordered
            join-item
            flex-1
            w-full
        ">

    <button
        type="submit"
        class="
            btn
            btn-primary
            join-item
        ">

        <?php echo esc_html(
            $args['button_text']
        ); ?>

    </button>

</div>