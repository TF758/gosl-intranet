<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title'         => '',
        'description'   => '',

        'department'    => null,

        'resource_type' => '',

        'category'      => '',

        'revision_date' => '',

        'download_url'  => '',

        'featured'      => false,

        'class'         => '',
    ]
);

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
                ! empty($args['resource_type'])
            ) : ?>

                <div
                    class="
                        badge
                        badge-primary
                    ">

                    <?php echo esc_html(
                        $args['resource_type']
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

            <?php echo esc_html(
                $args['title']
            ); ?>

        </h3>

        <?php if (
            ! empty($args['description'])
        ) : ?>

            <p
                class="
                    text-sm
                    text-base-content/70
                    line-clamp-3
                ">

                <?php echo esc_html(
                    $args['description']
                ); ?>

            </p>

        <?php endif; ?>

        <div
            class="
                flex
                flex-wrap
                gap-2
            ">

            <?php if (
                ! empty($args['category'])
            ) : ?>

                <div
                    class="
                        badge
                        badge-outline
                    ">

                    <?php echo esc_html(
                        $args['category']
                    ); ?>

                </div>

            <?php endif; ?>

            <?php if (
                ! empty($args['department']['name'])
            ) : ?>

                <div
                    class="
                        badge
                        badge-outline
                    ">

                    <?php echo esc_html(
                        $args['department']['name']
                    ); ?>

                </div>

            <?php endif; ?>

        </div>

        <?php if (
            ! empty($args['revision_date'])
        ) : ?>

            <div
                class="
                    mt-2
                    text-xs
                    text-base-content/60
                ">

                Revised:
                <?php echo esc_html(
                    $args['revision_date']
                ); ?>

            </div>

        <?php endif; ?>

        <?php if (
            ! empty($args['download_url'])
        ) : ?>

            <div
                class="
                    mt-auto
                    pt-4
                    border-t
                    border-base-300
                ">

                <a
                    href="<?php echo esc_url(
                                $args['download_url']
                            ); ?>"
                    class="
                        btn
                        btn-primary
                        btn-sm
                        w-full
                    ">

                    Download Resource

                </a>

            </div>

        <?php endif; ?>

    </div>

</article>