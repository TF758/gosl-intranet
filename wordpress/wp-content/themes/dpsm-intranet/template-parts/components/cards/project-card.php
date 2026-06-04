<?php

$args = wp_parse_args(
    $args ?? [],
    [
        'title' => '',
        'summary' => '',
        'status' => '',

        'department' => null,

        'domain' => '',

        'leads' => [],

        'url' => '',

        'featured' => false,

        'class' => '',
    ]
);

$status_classes = [

    'Planning' =>
    'badge badge-outline',

    'In Progress' =>
    'badge badge-primary',

    'On Hold' =>
    'badge badge-warning',

    'Completed' =>
    'badge badge-success',

    'Cancelled' =>
    'badge badge-error',
];

$status_class =
    $status_classes[$args['status']] ??
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
                ! empty($args['status'])
            ) : ?>

                <div
                    class="<?php echo esc_attr(
                                $status_class
                            ); ?>">

                    <?php echo esc_html(
                        $args['status']
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

        <?php if (
            ! empty($args['url'])
        ) : ?>

            <a
                href="<?php echo esc_url(
                            $args['url']
                        ); ?>"
                class="
                    card-title
                    hover:text-primary
                    transition-colors
                ">

                <?php echo esc_html(
                    $args['title']
                ); ?>

            </a>

        <?php else : ?>

            <h3 class="card-title">

                <?php echo esc_html(
                    $args['title']
                ); ?>

            </h3>

        <?php endif; ?>

        <?php if (
            ! empty($args['summary'])
        ) : ?>

            <p
                class="
                    text-sm
                    text-base-content/70
                    line-clamp-3
                ">

                <?php echo esc_html(
                    $args['summary']
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

            <?php if (
                ! empty($args['domain'])
            ) : ?>

                <div
                    class="
                        badge
                        badge-outline
                    ">

                    <?php echo esc_html(
                        $args['domain']
                    ); ?>

                </div>

            <?php endif; ?>

        </div>

        <?php if (
            ! empty($args['leads'])
        ) : ?>

            <div
                class="
                    mt-auto
                    pt-4
                    border-t
                    border-base-300
                ">

                <p
                    class="
                        text-xs
                        uppercase
                        tracking-wide
                        text-base-content/60
                    ">

                    Project Lead<?php echo count(
                                    $args['leads']
                                ) > 1 ? 's' : ''; ?>

                </p>

                <div
                    class="
                        mt-2
                        flex
                        flex-wrap
                        gap-2
                    ">

                    <?php foreach (
                        $args['leads']
                        as $lead
                    ) : ?>

                        <span
                            class="
                                badge
                                badge-ghost
                            ">

                            <?php echo esc_html(
                                $lead['name']
                            ); ?>

                        </span>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</article>