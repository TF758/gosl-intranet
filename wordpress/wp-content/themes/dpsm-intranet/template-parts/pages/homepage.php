<?php

$slides = [
    [
        'title' => 'Public Service Modernisation',
        'description' => 'Transforming public service delivery.',
        'badge' => 'Campaign',
        'button_label' => 'Learn More',
        'button_url' => '#',
        'image' => '...',
    ],
];

?>

<?php

get_template_part(
    'template-parts/components/layout/section',
    null,
    [
        'spacing' => 'none',
    ]
);

get_template_part(
    'template-parts/components/layout/container'
);

get_template_part(
    'template-parts/components/features/hero-carousel',
    null,
    [
        'slides' => $slides,
    ]
);

?>

</div>
</section>