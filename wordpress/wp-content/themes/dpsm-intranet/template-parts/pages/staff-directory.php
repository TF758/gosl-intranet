<?php
$filters = [

    'search' =>
    sanitize_text_field(
        $_GET['search']
            ?? ''
    ),

    'unit' =>
    sanitize_text_field(
        $_GET['unit']
            ?? ''
    ),

];

$staff_members =
    dpsm_get_staff_members(
        $filters
    );
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