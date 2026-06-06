<?php

$item = $args['item'] ?? [];

if (empty($item)) :

?>

    <div
        class="
        card
        bg-base-100
        border
        border-dashed
        border-base-300
    ">

        <div
            class="
            card-body
            items-center
            text-center
            py-12
        ">

            <div
                class="
                text-5xl
            ">

                📰

            </div>

            <h3
                class="
                text-lg
                font-semibold
            ">

                No Featured News

            </h3>

            <p
                class="
                text-base-content/70
            ">

                Mark a news article as
                featured or pin it to the
                homepage to display it here.

            </p>

        </div>

    </div>

<?php

    return;

endif;
?>

<article
    class="
        card
        bg-base-100
        border
        border-base-300
        shadow-sm
        overflow-hidden
        h-full
    ">

    <?php if (!empty($item['image'])) : ?>

        <figure>

            <img
                src="<?php echo esc_url(
                            $item['image']
                        ); ?>"
                alt="<?php echo esc_attr(
                            $item['title']
                        ); ?>"
                class="
                    h-60
                    w-full
                    object-cover
                ">

        </figure>

    <?php endif; ?>

    <div
        class="
            card-body
        ">

        <div
            class="
                flex
                flex-wrap
                gap-2
            ">

            <?php if (!empty($item['news_type'])) : ?>

                <span
                    class="
                        badge
                        badge-primary
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
                    ">

                    <?php echo esc_html(
                        ucfirst(
                            $item['priority']
                        )
                    ); ?>

                </span>

            <?php endif; ?>

        </div>

        <h3
            class="
                text-2xl
                font-bold
                leading-tight
            ">

            <?php echo esc_html(
                $item['title']
            ); ?>

        </h3>

        <?php if (!empty($item['excerpt'])) : ?>

            <p
                class="
                    text-base-content/70
                ">

                <?php echo esc_html(
                    $item['excerpt']
                ); ?>

            </p>

        <?php endif; ?>

        <div
            class="
                flex
                items-center
                gap-2
                text-sm
                text-base-content/60
            ">

            <span>

                <?php echo esc_html(
                    $item['department']
                ); ?>

            </span>

            <span>•</span>

            <span>

                <?php echo esc_html(
                    $item['date']
                ); ?>

            </span>

        </div>

        <div
            class="
                card-actions
                justify-end
                mt-4
            ">

            <a
                href="<?php echo esc_url(
                            $item['url']
                        ); ?>"
                class="
                    btn
                    btn-primary
                ">

                Read More

            </a>

        </div>

    </div>

</article>