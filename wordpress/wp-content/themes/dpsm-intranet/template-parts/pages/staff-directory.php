<?php

$staff_members = [

    [
        'name' => 'John Smith',
        'job_title' => 'Project Officer',
        'department' => 'DPSM',
        'unit' => 'Modernisation',
        'email' => 'john@govt.lc',
        'phone' => '468-1000',
        'extension' => '221',
        'tags' => [
            'Team Lead',
            'Policy',
        ],
    ],

    [
        'name' => 'Sarah Joseph',
        'job_title' => 'Communications Officer',
        'department' => 'DPSM',
        'unit' => 'Communications',
        'email' => 'sarah@govt.lc',
        'phone' => '468-1001',
        'extension' => '222',
        'tags' => [
            'Communications',
        ],
    ],

    [
        'name' => 'John Smith',
        'job_title' => 'Project Officer',
        'department' => 'DPSM',
        'unit' => 'Modernisation',
        'email' => 'john@govt.lc',
        'phone' => '468-1000',
        'extension' => '221',
        'tags' => [
            'Team Lead',
            'Policy',
        ],
    ],

    [
        'name' => 'Sarah Joseph',
        'job_title' => 'Communications Officer',
        'department' => 'DPSM',
        'unit' => 'Communications',
        'email' => 'sarah@govt.lc',
        'phone' => '468-1001',
        'extension' => '222',
        'tags' => [
            'Communications',
        ],
    ],

    [
        'name' => 'John Smith',
        'job_title' => 'Project Officer',
        'department' => 'DPSM',
        'unit' => 'Modernisation',
        'email' => 'john@govt.lc',
        'phone' => '468-1000',
        'extension' => '221',
        'tags' => [
            'Team Lead',
            'Policy',
        ],
    ],

    [
        'name' => 'Sarah Joseph',
        'job_title' => 'Communications Officer',
        'department' => 'DPSM',
        'unit' => 'Communications',
        'email' => 'sarah@govt.lc',
        'phone' => '468-1001',
        'extension' => '222',
        'tags' => [
            'Communications',
        ],
    ],

];

/**
 * Filter Layout
 *
 * horizontal
 * vertical
 */
$filter_layout = 'horizontal';

?>

<?php

get_template_part(
    'template-parts/components/layout/page-header',
    null,
    [
        'title'       => 'Staff Directory',
        'description' => 'Find staff members across the Ministry.',
    ]
);

?>

<div class="space-y-8">

    <?php if ($filter_layout === 'horizontal') : ?>

        <?php

        get_template_part(
            'template-parts/components/staff/staff-filters-horizontal'
        );

        ?>

        <div class="space-y-6">

            <p
                class="
                    text-sm
                    text-base-content/70
                ">

                Showing
                <?php echo count($staff_members); ?>
                staff members

            </p>

            <?php

            get_template_part(
                'template-parts/components/staff/staff-grid',
                null,
                [
                    'staff_members' =>
                    $staff_members,
                ]
            );

            ?>

        </div>

    <?php else : ?>

        <div
            class="
                grid
                gap-6
                lg:grid-cols-[280px_1fr]
            ">

            <div>

                <?php

                get_template_part(
                    'template-parts/components/staff/staff-filters'
                );

                ?>

            </div>

            <div
                class="
                    space-y-6
                ">

                <p
                    class="
                        text-sm
                        text-base-content/70
                    ">

                    Showing
                    <?php echo count($staff_members); ?>
                    staff members

                </p>

                <?php

                get_template_part(
                    'template-parts/components/staff/staff-grid',
                    null,
                    [
                        'staff_members' =>
                        $staff_members,
                    ]
                );

                ?>

            </div>

        </div>

    <?php endif; ?>

</div>