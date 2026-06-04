<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title'   => 'Filters',
        'content' => '',
        'class'   => '',
    ]
);

?>

<div
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <div class="card-body">

        <h2
            class="
                card-title
                text-base
            ">

            <?php echo esc_html(
                $args['title']
            ); ?>

        </h2>

        <?php if (
            ! empty($args['content'])
        ) : ?>

            <div
                class="
                    space-y-4
                ">

                <?php
                echo $args['content'];
                ?>

            </div>

        <?php endif; ?>

    </div>

</div>