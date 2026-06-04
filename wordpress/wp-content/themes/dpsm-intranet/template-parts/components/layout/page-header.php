<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title'       => '',
        'description' => '',
        'actions'     => '',
        'class'       => '',
    ]
);

?>

<div
    class="
        flex
        flex-col
        gap-4
        lg:flex-row
        lg:items-end
        lg:justify-between

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <div
        class="
            space-y-2
        ">

        <?php if (
            ! empty($args['title'])
        ) : ?>

            <h1
                class="
                    text-3xl
                    font-bold
                    tracking-tight
                ">

                <?php echo esc_html(
                    $args['title']
                ); ?>

            </h1>

        <?php endif; ?>

        <?php if (
            ! empty($args['description'])
        ) : ?>

            <p
                class="
                    max-w-3xl
                    text-base-content/70
                ">

                <?php echo esc_html(
                    $args['description']
                ); ?>

            </p>

        <?php endif; ?>

    </div>

    <?php if (
        ! empty($args['actions'])
    ) : ?>

        <div
            class="
                shrink-0
            ">

            <?php
            echo $args['actions'];
            ?>

        </div>

    <?php endif; ?>

</div>