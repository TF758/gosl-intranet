<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title'        => '',
        'excerpt'      => '',

        'image'        => '',

        'department'   => null,

        'news_type'    => '',

        'priority'     => '',

        'published_at' => '',

        'url'          => '',

        'featured'     => false,

        'class'        => '',
    ]
);

$type_classes = [

    'announcement' =>
    'badge badge-primary',

    'department_update' =>
    'badge badge-secondary',

    'campaign_update' =>
    'badge badge-accent',

    'event_notice' =>
    'badge badge-info',

    'achievement' =>
    'badge badge-success',

    'general_news' =>
    'badge badge-outline',
];

$type_class =
    $type_classes[$args['news_type']] ??
    'badge badge-outline';

?>

<article
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
        hover:shadow-md
        transition-all
        duration-200

        <?php echo esc_attr(
            $args['class']
        ); ?>
    ">

    <?php if (
        ! empty($args['image'])
    ) : ?>

        <figure>

            <img
                src="<?php echo esc_url(
                            $args['image']
                        ); ?>"
                alt="<?php echo esc_attr(
                            $args['title']
                        ); ?>"
                class="
                    h-48
                    w-full
                    object-cover
                ">

        </figure>

    <?php endif; ?>

    <div class="card-body">

        <div
            class="
                flex
                items-center
                justify-between
                gap-2
                flex-wrap
            ">

            <?php if (
                ! empty($args['news_type'])
            ) : ?>

                <div
                    class="<?php echo esc_attr(
                                $type_class
                            ); ?>">

                    <?php echo esc_html(
                        ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $args['news_type']
                            )
                        )
                    ); ?>

                </div>

            <?php endif; ?>

            <?php if (
                $args['featured']
            ) : ?>

                <div
                    class="
                        badge
                        badge-secondary
                    ">

                    Featured

                </div>

            <?php endif; ?>

        </div>

        <h3
            class="
                card-title
            ">

            <?php if (
                ! empty($args['url'])
            ) : ?>

                <a
                    href="<?php echo esc_url(
                                $args['url']
                            ); ?>"
                    class="
                        hover:text-primary
                        transition-colors
                    ">

                    <?php echo esc_html(
                        $args['title']
                    ); ?>

                </a>

            <?php else : ?>

                <?php echo esc_html(
                    $args['title']
                ); ?>

            <?php endif; ?>

        </h3>

        <?php if (
            ! empty($args['excerpt'])
        ) : ?>

            <p
                class="
                    text-sm
                    text-base-content/70
                    line-clamp-3
                ">

                <?php echo esc_html(
                    $args['excerpt']
                ); ?>

            </p>

        <?php endif; ?>

        <div
            class="
                mt-auto
                pt-4
                border-t
                border-base-300
                flex
                items-center
                justify-between
                gap-4
                text-xs
                text-base-content/60
            ">

            <?php if (
                ! empty($args['department']['name'])
            ) : ?>

                <span>

                    <?php echo esc_html(
                        $args['department']['name']
                    ); ?>

                </span>

            <?php endif; ?>

            <?php if (
                ! empty($args['published_at'])
            ) : ?>

                <span>

                    <?php echo esc_html(
                        $args['published_at']
                    ); ?>

                </span>

            <?php endif; ?>

        </div>

    </div>

</article>