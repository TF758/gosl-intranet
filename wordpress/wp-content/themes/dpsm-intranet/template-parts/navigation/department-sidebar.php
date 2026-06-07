<?php

$title =
    $args['title']
    ?? 'Department';

$items =
    $args['items']
    ?? [];

if (empty($items)) {
    return;
}

?>

<aside
    class="
        hidden
        lg:block
        w-72
        shrink-0
    ">

    <div
        class="
            card
            bg-base-100
            border
            border-base-300
            shadow-sm
            sticky
            top-24
        ">

        <div class="card-body p-4">

            <h2
                class="
                    card-title
                    text-lg
                    mb-4
                ">

                <?php echo esc_html(
                    $title
                ); ?>

            </h2>

            <nav
                class="
                    flex
                    flex-col
                    gap-1
                ">

                <?php foreach (
                    $items
                    as $item
                ) : ?>

                    <?php

                    $active =
                        $item['active']
                        ?? false;

                    ?>

                    <a
                        href="<?php echo esc_url(
                                    $item['url']
                                        ?? '#'
                                ); ?>"

                        class="
                            flex
                            items-center
                            gap-3
                            rounded-lg
                            px-4
                            py-3
                            transition-colors

                            <?php echo $active
                                ? 'bg-primary text-primary-content'
                                : 'hover:bg-base-200'; ?>
                        ">

                        <?php if (
                            !empty($item['icon'])
                        ) : ?>

                            <span
                                class="
                                    text-lg
                                ">
                                <?php echo esc_html(
                                    $item['icon']
                                ); ?>
                            </span>

                        <?php endif; ?>

                        <span
                            class="
                                font-medium
                            ">

                            <?php echo esc_html(
                                $item['label']
                                    ?? ''
                            ); ?>

                        </span>

                    </a>

                <?php endforeach; ?>

            </nav>

        </div>

    </div>

</aside>