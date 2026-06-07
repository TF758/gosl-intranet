<?php

$items =
    $args['items']
    ?? [];

if (empty($items)) {
    return;
}

?>

<div
    class="
        lg:hidden
        mb-6
        sticky
    ">

    <div
        class="
        collapse
        collapse-arrow
        bg-base-100
        border
        border-base-content/30
        rounded-box
        shadow-sm
        ">

        <input
            type="checkbox" />

        <div
            class="
                collapse-title
                font-semibold
            ">

            Department Menu

        </div>

        <div
            class="
                collapse-content
            ">

            <nav
                class="
                    flex
                    flex-col
                    gap-1
                ">

                <?php foreach (
                    $items
                    as $item
                ) :

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

                            <span>
                                <?php echo esc_html(
                                    $item['icon']
                                ); ?>
                            </span>

                        <?php endif; ?>

                        <span>

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

</div>