<?php

$department =
    $args['department']
    ?? null;

if (
    empty($department)
) {
    return;
}

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

    'department' =>
    $department->ID,

];

$staff_members =
    dpsm_get_staff_members(
        $filters
    );

get_template_part(
    'template-parts/components/layout/page-header',
    null,
    [
        'title' =>
        $department->post_title .
            ' Staff',

        'description' =>
        'Browse staff members within this department.',
    ]
);

?>

<div
    class="
        space-y-8
    ">

    <?php

    get_template_part(
        'template-parts/components/staff/staff-filters-horizontal'
    );

    ?>

    <p
        class="
            text-sm
            text-base-content/70
        ">

        Showing
        <?php echo count(
            $staff_members
        ); ?>
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