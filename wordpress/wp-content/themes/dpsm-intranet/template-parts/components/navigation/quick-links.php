<?php

$heading = $args['heading'] ?? '';
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];

if (empty($links)) {
    return;
}

?>

<section
    class="
        space-y-6
       
    ">

    <?php if ($heading || $description) : ?>

        <div>

            <?php if ($heading) : ?>

                <h2
                    class="
                        text-2xl
                        font-bold
                    ">

                    <?php echo esc_html($heading); ?>

                </h2>

            <?php endif; ?>

            <?php if ($description) : ?>

                <p
                    class="
                        text-base-content/70
                        mt-2
                    ">

                    <?php echo esc_html($description); ?>

                </p>

            <?php endif; ?>

        </div>

    <?php endif; ?>

    <div
        class="
        grid
        gap-4
        grid-cols-2
        md:grid-cols-3
        xl:grid-cols-6
      
        ">

        <?php foreach ($links as $link) :

            $title =
                $link['title'] ?? '';

            $link_description =
                $link['description'] ?? '';

            $icon =
                $link['icon'] ?? '';

            $url =
                $link['url'] ?? '#';

            $badge =
                $link['badge'] ?? '';

            $color =
                $link['color'] ?? 'primary';

            $icon_classes =
                match ($color) {

                    'secondary' =>
                    'bg-secondary/10 text-secondary',

                    'accent' =>
                    'bg-accent/10 text-accent',

                    'success' =>
                    'bg-success/10 text-success',

                    'warning' =>
                    'bg-warning/10 text-warning',

                    'error' =>
                    'bg-error/10 text-error',

                    'info' =>
                    'bg-info/10 text-info',

                    default =>
                    'bg-primary/10 text-primary',
                };

        ?>

            <a
                href="<?php echo esc_url($url); ?>"
                class="
                    group
                    flex
                    items-center
                    gap-3
                    rounded-box
                    border
                    border-base-300
                    bg-base-100
                    px-4
                    py-3
                    transition-all
                    hover:border-primary
                    hover:shadow-md
                ">

                <div
                    class="
                    relative
                    ">

                    <div
                        class="
                            relative
                            mb-2
                        ">

                        <div
                            class="
                                w-14
                                h-14
                                rounded-box
                                flex
                                items-center
                                justify-center
                                text-2xl
                                <?php echo esc_attr($icon_classes); ?>
                            ">

                            <?php echo esc_html($icon); ?>

                        </div>

                        <?php if ($badge) : ?>

                            <span
                                class="
                                    badge
                                    badge-primary
                                    absolute
                                    -top-2
                                    -right-2
                                ">

                                <?php echo esc_html($badge); ?>

                            </span>

                        <?php endif; ?>

                    </div>

                    <h3
                        class="
                            font-semibold
                            leading-tight
                        ">

                        <?php echo esc_html($title); ?>

                    </h3>

                    <?php if ($link_description) : ?>

                        <p
                            class="
                                text-sm
                                text-base-content/70
                            ">

                            <?php echo esc_html(
                                $link_description
                            ); ?>

                        </p>

                    <?php endif; ?>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

</section>