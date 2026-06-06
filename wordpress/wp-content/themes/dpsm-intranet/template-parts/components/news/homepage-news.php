<?php

$featured =
    $args['featured'] ?? [];

$latest =
    $args['latest'] ?? [];

?>

<section
    class="
        space-y-6
    ">

    <div>

        <h2
            class="
                text-2xl
                font-bold
            ">

            News & Announcements

        </h2>

        <p
            class="
                text-base-content/70
                mt-2
            ">

            Stay informed with the latest
            updates across the public service.

        </p>

    </div>

    <div
        class="
            grid
            gap-6
            lg:grid-cols-12
        ">

        <div
            class="
                lg:col-span-7
            ">

            <?php

            get_template_part(
                'template-parts/components/news/featured-news-card',
                null,
                [
                    'item' =>
                    $featured,
                ]
            );

            ?>

        </div>

        <div
            class="
        space-y-4
        lg:col-span-5
    ">

            <?php if (!empty($latest)) : ?>

                <?php foreach (
                    $latest as $item
                ) : ?>

                    <?php

                    get_template_part(
                        'template-parts/components/news/news-list-item',
                        null,
                        [
                            'item' => $item,
                        ]
                    );

                    ?>

                <?php endforeach; ?>

            <?php else : ?>

                <div
                    class="
                rounded-box
                border
                border-dashed
                border-base-300
                p-8
                text-center
            ">

                    <div
                        class="
                    text-4xl
                    mb-2
                ">

                        📢

                    </div>

                    <h3
                        class="
                    font-semibold
                ">

                        No News Available

                    </h3>

                    <p
                        class="
                    text-sm
                    text-base-content/70
                ">

                        News articles will appear here
                        once they are published.

                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>