<?php

$item = $args['item'] ?? [];

if (empty($item)) {
    return;
}

?>

<a
    href="<?php echo esc_url(
                $item['url']
            ); ?>"
    class="
        block
        rounded-box
        border
        border-base-300
        bg-base-100
        p-4
        transition-all
        hover:border-primary
        hover:shadow-md
    ">

    <div
        class="
            flex
            items-center
            gap-2
            mb-2
        ">

        <?php if (!empty($item['news_type'])) : ?>

            <span
                class="
                    badge
                    badge-outline
                    badge-sm
                ">

                <?php echo esc_html(
                    $item['news_type']
                ); ?>

            </span>

        <?php endif; ?>

        <?php if (
            !empty($item['priority'])
            && $item['priority'] !== 'normal'
        ) : ?>

            <span
                class="
                    badge
                    badge-warning
                    badge-sm
                ">

                <?php echo esc_html(
                    ucfirst(
                        $item['priority']
                    )
                ); ?>

            </span>

        <?php endif; ?>

    </div>

    <h4
        class="
            font-semibold
            leading-tight
        ">

        <?php echo esc_html(
            $item['title']
        ); ?>

    </h4>

    <div
        class="
            mt-2
            text-sm
            text-base-content/60
        ">

        <?php echo esc_html(
            $item['department']
        ); ?>

        •

        <?php echo esc_html(
            $item['date']
        ); ?>

    </div>

</a>