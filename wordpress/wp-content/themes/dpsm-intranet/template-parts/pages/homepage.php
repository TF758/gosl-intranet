<?php



$slides = [
    [
        'title' => 'Public Service Modernisation',
        'description' => 'Transforming public service delivery.',
        'badge' => 'Campaign',
        'button_label' => 'Learn More',
        'button_url' => '#',
        'image' => 'https://picsum.photos/1200/800',
    ],
    [
        'title' => 'Test Slide 2',
        'description' => 'Test slide description.',
        'badge' => 'F0ckery',
        'button_label' => 'Learn More',
        'button_url' => '#',
        'image' => 'https://picsum.photos/1200/800',
    ],
];

?>

<?php

get_template_part(
    'template-parts/components/features/hero-carousel',
    null,
    [
        'slides' => $slides,
    ]
);

?>

<section class="py-12">

    <div
        class="
            mx-auto
            max-w-7xl
            px-4
            sm:px-6
            lg:px-8
        ">

        <?php

        get_template_part(
            'template-parts/components/navigation/quick-links',
            null,
            [
                'heading' =>
                'Quick Access',

                'description' =>
                'Frequently used areas of the DPSM intranet.',

                'links' =>
                dpsm_get_quick_links(
                    'homepage'
                ),
            ]
        );

        ?>

    </div>

</section>

<section class="py-12">

    <div
        class="
            mx-auto
            max-w-7xl
            px-4
            sm:px-6
            lg:px-8
        ">

        <?php

        get_template_part(
            'template-parts/components/news/homepage-news',
            null,
            [
                'featured' =>
                dpsm_get_homepage_featured_news(),

                'latest' =>
                dpsm_get_homepage_news(4),
            ]
        );

        ?>

    </div>

</section>

<section class="py-12">

    <div
        class="
            mx-auto
            max-w-7xl
            px-4
            sm:px-6
            lg:px-8
        ">

        <?php

        get_template_part(
            'template-parts/components/resource/resource-grid',
            null,
            [
                'heading' =>
                'Popular Resources',

                'description' =>
                'Frequently used policies, forms and guides.',

                'resources' =>
                dpsm_get_featured_resources(4),
            ]
        );

        ?>

    </div>

</section>