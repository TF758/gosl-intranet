<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title'       => 'No Results Found',
        'description' =>
        'Try adjusting your search or filters.',

        'action'      => '',

        'class'       => '',
    ]
);

?>

<div
    class="
        hero
        bg-base-200
        rounded-box

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <div
        class="
            hero-content
            text-center
            py-12
        ">

        <div
            class="
                max-w-md
            ">

            <div
                class="
                    text-5xl
                    mb-4
                ">

                🔍

            </div>

            <h2
                class="
                    text-2xl
                    font-bold
                ">

                <?php echo esc_html(
                    $args['title']
                ); ?>

            </h2>

            <p
                class="
                    mt-2
                    text-base-content/70
                ">

                <?php echo esc_html(
                    $args['description']
                ); ?>

            </p>

            <?php if (
                ! empty($args['action'])
            ) : ?>

                <div
                    class="
                        mt-6
                    ">

                    <?php
                    echo $args['action'];
                    ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>