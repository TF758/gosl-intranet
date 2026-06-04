<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'name'       => 'Unknown Staff Member',
        'position'   => '',
        'department' => '',
        'unit'       => '',
        'email'      => '',
        'phone'      => '',
        'photo'      => '',
        'url'        => '',
        'class'      => '',
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
        hover:shadow-md
        hover:-translate-y-1
        transition-all
        duration-200

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <div
        class="
            card-body
            items-center
            text-center
        ">

        <?php if (
            ! empty($args['photo'])
        ) : ?>

            <img
                src="<?php echo esc_url(
                            $args['photo']
                        ); ?>"
                alt="<?php echo esc_attr(
                            $args['name']
                        ); ?>"
                class="
                    w-24
                    h-24
                    rounded-full
                    object-cover
                    border
                    border-base-300
                ">

        <?php else : ?>

            <div
                class="
                    avatar
                    placeholder
                ">

                <div
                    class="
                        bg-primary
                        text-primary-content
                        rounded-full
                        w-24
                    ">

                    <span
                        class="
                            text-3xl
                            font-semibold
                        ">

                        <?php

                        echo strtoupper(
                            mb_substr(
                                $args['name'],
                                0,
                                1
                            )
                        );

                        ?>

                    </span>

                </div>

            </div>

        <?php endif; ?>

        <?php if (
            ! empty($args['url'])
        ) : ?>

            <a
                href="<?php echo esc_url(
                            $args['url']
                        ); ?>"
                class="
                    mt-4
                    text-lg
                    font-semibold
                    text-primary
                    hover:underline
                ">

                <?php echo esc_html(
                    $args['name']
                ); ?>

            </a>

        <?php else : ?>

            <h3
                class="
                    mt-4
                    text-lg
                    font-semibold
                    text-primary
                ">

                <?php echo esc_html(
                    $args['name']
                ); ?>

            </h3>

        <?php endif; ?>

        <?php if (
            ! empty($args['position'])
        ) : ?>

            <p
                class="
                    text-sm
                    text-base-content/70
                ">

                <?php echo esc_html(
                    $args['position']
                ); ?>

            </p>

        <?php endif; ?>

        <?php if (
            ! empty($args['department'])
        ) : ?>

            <div
                class="
                    badge
                    badge-outline
                    mt-2
                ">

                <?php echo esc_html(
                    $args['department']
                ); ?>

            </div>

        <?php endif; ?>

        <?php if (
            ! empty($args['unit'])
        ) : ?>

            <p
                class="
                    mt-2
                    text-xs
                    text-base-content/60
                ">

                <?php echo esc_html(
                    $args['unit']
                ); ?>

            </p>

        <?php endif; ?>

        <?php if (
            ! empty($args['phone']) ||
            ! empty($args['email'])
        ) : ?>

            <div
                class="
                    mt-4
                    pt-4
                    border-t
                    border-base-300
                    w-full
                    space-y-2
                    text-xs
                    text-base-content/70
                ">

                <?php if (
                    ! empty($args['phone'])
                ) : ?>

                    <p>

                        <?php echo esc_html(
                            $args['phone']
                        ); ?>

                    </p>

                <?php endif; ?>

                <?php if (
                    ! empty($args['email'])
                ) : ?>

                    <a
                        href="mailto:<?php echo esc_attr(
                                            $args['email']
                                        ); ?>"
                        class="
                            block
                            break-all
                            link
                            link-hover
                        ">

                        <?php echo esc_html(
                            $args['email']
                        ); ?>

                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>

</div>